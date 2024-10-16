/* global google:readonly */

define('autocrm:views/dashlets/map', ['views/dashlets/abstract/base', 'search-manager'], function (Dep, SearchManager) {
	return Dep.extend({
		template: 'autocrm:dashlets/map',

		entityType: null,

		addressField: null,

		height: 'auto',

		fields: ['street', 'city', 'state', 'postalCode', 'country'],

		markers: [],

		zoomLevel: 8,

		mapCenter: null,

		hasErrorHappened: false,

		errorMsg: null,

		setup: function () {
			Dep.prototype.setup.call(this);
			this.wait(true);

			this.mapCenter = this.getOption('mapCenter');

			this.entityType = this.getOption('entityType') || this.entityType;
			if (!this.entityType) {
				this.displayError('selectEntityType');
				this.wait(false);
				return;
			}
			this.addressField = this.getOption('addressField') || this.addressField;
			if (!this.addressField) {
				this.displayError('selectAddressField');
				this.wait(false);
				return;
			}

			this.getCollectionFactory().create(
				this.entityType,
				function (collection) {
					this.collection = collection;
					collection.whereAdditional = [
						{
							type: 'isNotNull',
							attribute: this.addressField + 'Lat',
						},
						{
							type: 'isNotNull',
							attribute: this.addressField + 'Lng',
						},
					];
					collection.data.select = this.getSelectAttributeList().join(',');
					collection.maxSize = this.getOption('displayRecords');
				},
				this,
			);

			this.setupSearchManager();

			this.createView('search', this.getSearchViewName(), {
				el: this.el + ' .search-container',
				collection: this.collection,
				searchManager: this.searchManager,
				scope: this.entityType,
				isWide: true,
			});

			this.collection.fetch().then(this.wait.bind(this, false));

			this.listenTo(this.collection, 'sync', this.drawMarkers.bind(this));
		},

		displayError: function (key) {
			this.hasErrorHappened = true;
			this.errorMsg = this.translate(key, 'messages', 'DashletOptions');
		},

		getSelectAttributeList: function () {
			return ['id', 'name', this.addressField + 'Lat', this.addressField + 'Lng'].concat(
				this.fields.map(field => this.addressField + Espo.Utils.upperCaseFirst(field)),
			);
		},

		getSearchViewName: function () {
			return this.getMetadata().get(
				['clientDefs', this.entityType, 'recordViews', 'search'],
				'views/record/search',
			);
		},

		setupSearchManager: function () {
			const collection = this.collection;

			const searchManager = new SearchManager(
				collection,
				'list',
				this.getStorage(),
				this.getDateTime(),
				this.getSearchDefaultData(),
			);

			searchManager.scope = this.entityType;

			searchManager.loadStored();

			collection.where = searchManager.getWhere();

			this.searchManager = searchManager;
		},

		getSearchDefaultData: function () {
			return this.getMetadata().get(['clientDefs', this.entityType, 'defaultFilterData']);
		},

		afterRender: function () {
			if (this.hasErrorHappened) {
				this.$el.find('.map').html(this.errorMsg);
				return;
			}
			this.$map = this.$el.find('.map');

			this.processSetHeight(true);

			if (this.height === 'auto') {
				$(window).off('resize.' + this.cid);
				$(window).on('resize.' + this.cid, this.processSetHeight.bind(this));
			}

			this.afterRenderGoogle();
		},

		afterRenderGoogle: function () {
			if (window.google && window.google.maps) {
				this.initMapGoogle();
			} else if (typeof window.mapapiloaded === 'function') {
				const mapapiloaded = window.mapapiloaded;
				window.mapapiloaded = function () {
					this.initMapGoogle();
					mapapiloaded();
				}.bind(this);
			} else {
				window.mapapiloaded = () => this.initMapGoogle();

				let src = 'https://maps.googleapis.com/maps/api/js?callback=mapapiloaded';
				const apiKey = this.getApiKey();
				if (apiKey) {
					src += '&key=' + apiKey;
				}

				const s = document.createElement('script');
				s.setAttribute('async', 'async');
				s.src = src;
				document.head.appendChild(s);
			}
		},

		getApiKey: function () {
			return this.getConfig().get('googleMapsApiKey');
		},

		initMapGoogle: function () {
			this.geocoder = new google.maps.Geocoder();

			try {
				this.map = new google.maps.Map(this.$el.find('.map').get(0), {
					zoom: this.zoomLevel,
					center: { lat: 0, lng: 0 },
					scrollwheel: false,
				});

				this.centerMap();
				this.drawMarkers();
			} catch (e) {
				console.error(e.message);
			}
		},

		centerMap: function () {
			this.geocoder.geocode({ address: this.mapCenter }, (results, status) => {
				if (status === google.maps.GeocoderStatus.OK) this.map.setCenter(results[0].geometry.location);
			});
		},

		drawMarkers: function () {
			this.clearMap();
			this.markers = this.collection.models.map(model => {
				const position = {
					lat: model.get(this.addressField + 'Lat'),
					lng: model.get(this.addressField + 'Lng'),
				};

				let marker = new google.maps.Marker({
					map: this.map,
					position: position,
				});

				const infoWindow = new google.maps.InfoWindow({
					content: this.getInfoWindowHtml(model),
				});

				this.addMarkerListeners(marker, infoWindow, model);

				return marker;
			});

			this.updateCount();
		},

		updateCount: function () {
			this.$el.find('.search-row > div:last-child').html(
				$('<div>', {
					class: 'pull-right total-count text-muted',
					text: this.translate('Total') + ': ' + this.collection.total,
				}),
			);
		},

		clearMap: function () {
			this.markers.forEach(marker => marker.setMap(null));
		},

		addMarkerListeners: function (marker, infoWindow, model) {
			marker.addListener('mouseover', infoWindow.open.bind(infoWindow, this.map, marker));
			marker.addListener('mouseout', infoWindow.close.bind(infoWindow));

			marker.addListener('click', () =>
				this.getRouter().navigate('#' + this.entityType + '/view/' + model.id, { trigger: true }),
			);
		},

		getInfoWindowHtml: function (model) {
			const name = model.get('name') || '';
			const address = this.composeAddress(model);

			const nameLabel = this.translate('name', 'fields', this.entityType);
			const addressLabel = this.translate('address', 'fields', this.entityType);

			return `${nameLabel}: ${name}<br/>${addressLabel}: ${address}`;
		},

		composeAddress: function (model) {
			let address = '';
			const addressData = {};

			this.fields.forEach(field => {
				addressData[field] = model.get(this.addressField + Espo.Utils.upperCaseFirst(field));
			});

			if (addressData.street) {
				address += addressData.street;
			}

			if (addressData.city) {
				if (address !== '') {
					address += ', ';
				}
				address += addressData.city;
			}

			if (addressData.state) {
				if (address !== '') {
					address += ', ';
				}
				address += addressData.state;
			}

			if (addressData.postalCode) {
				if (addressData.state || addressData.city) {
					address += ' ';
				} else {
					if (address) {
						address += ', ';
					}
				}
				address += addressData.postalCode;
			}

			if (addressData.country) {
				if (address !== '') {
					address += ', ';
				}
				address += addressData.country;
			}

			return address;
		},

		processSetHeight: function (init) {
			let height = this.height;
			if (this.height === 'auto') {
				height = this.$el.parent().height();

				if (init && height <= 0) {
					setTimeout(this.processSetHeight.bind(this, true), 50);
					return;
				}
			}

			this.$map.css('height', height + 'px');
		},
	});
});
