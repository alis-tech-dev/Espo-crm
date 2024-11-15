extend(Dep => {
	return class extends Dep {
		/* jshint ignore:start */
		MODE_EDITABLE_LIST = 'list-editable';

		_inlineEditNamespace = 'closeInlineListEdit';

		_isEditableListMode = false;

		/* jshint ignore:end */

		init() {
			this.listEditDisabled =
				this.options.inlineEditDisabled ||
				this.options.listEditDisabled;

			if (typeof this.listEditDisabled === 'undefined') {
				this.listEditDisabled = true;
			}

			super.init();


			if (this.isListMode() && !this.listEditDisabled) {
				this.mode = this.MODE_EDITABLE_LIST;
			}
			// this.setupEventListen();
		}

setupEventListen() {
		if (!document.getElementById('chatgpt-bot')) {
			this.addChatBot().then(r => {console.log('')});
		}
	
		document.addEventListener('DOMContentLoaded', () => {
			this.checkHashAndToggleModal();
		});
	
		window.addEventListener('hashchange', () => {
			this.checkHashAndToggleModal();
		});
	}

async addChatBot() {
	const chatBotHtml = `
		<div id="chatgpt-bot" class="chatgpt-bot">
			<div id="chatgpt-bot-header">
				<div id="chatgpt-bot-resize-handle-nw" class="resize-handle">
					<i class="fas fa-expand-arrows-alt"></i>
				</div>
				Alis-Tech Helper
				<button id="chatgpt-bot-toggle-theme" class="toggle-button">Theme</button>
				<button id="chatgpt-bot-collapse" class="toggle-button">X</button>
			</div>
			<div id="chatgpt-bot-messages"></div>
			<div style="display: flex;">
				<input type="text" id="chatgpt-bot-input" placeholder="Type your message..."/>
				<button id="chatgpt-bot-send">Send</button>
			</div>
		
		</div>
		<button class="chat-button">Chat</button>
	`;

	document.body.insertAdjacentHTML('beforeend', chatBotHtml);

	const link = document.createElement('link');
	link.rel = 'stylesheet';
	link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css';
	link.id = 'chatbot-fontawesome';
	document.head.appendChild(link);

	const styleLink = document.createElement('link');
	styleLink.rel = 'stylesheet';
	styleLink.href = 'client/custom/css/bot_style.css';
	styleLink.id = 'chatbot-stylesheet';
	document.head.appendChild(styleLink);

	await this.loadScript('client/custom/modules/bot_js/init_bot.js');
}

async showHelloWorld() {
	const helloWorldHtml = `
		<div id="hello-world-modal" class="hello-world-modal">

			<div class="form-container">
				<div class="form-group">
					<label for="spot-illuminance">Spot Illuminance (lx):</label>
					<input type="number" id="spot-illuminance" required min="0"  value="300">
					<div class="error-message" id="error-spot-illuminance">Please enter valid spot illuminance</div>
				</div>
				<div class="form-group">
					<label for="working-height">Working Height (mm):</label>
					<input type="number" id="working-height" required min="0"  value="5000">
					<div class="error-message" id="error-working-height">Please enter valid working height</div>
				</div>
				<div class="form-group">
					<label>Color:</label>
					<div class="radio-group">
						<label for="color-red">
							<input type="radio" id="color-red" name="color-picker" value="red">
							<span class="color-picker red" data-tooltip="Red Color"></span>
						</label>
		
						<label for="color-blue">
							<input type="radio" id="color-blue" name="color-picker" value="blue">
							<span class="color-picker blue" data-tooltip="Blue Color"></span>
						</label>
		
						<label for="color-white">
							<input type="radio" id="color-white" name="color-picker" value="white">
							<span class="color-picker white" data-tooltip="White Color"></span>
						</label>
		
						<label for="color-yellow">
							<input type="radio" id="color-yellow" name="color-picker" value="yellow">
							<span class="color-picker yellow" data-tooltip="Yellow Color"></span>
						</label>
					</div>
		
					<div class="error-message" id="error-color">Please select a color</div>
				</div>
				<div class="form-group">
					<label>Symbol Type:</label>
					<div class="radio-group">
						<label for="zebra" title="zebra">
							<input type="radio" id="zebra" name="input-type" value="zebra">
							<img src="/client/custom/modules/calculator/static/images/zebra.png" alt="Zebra">
						</label>
		
						<label for="round" title="round">
							<input type="radio" id="round" name="input-type" value="round">
							<img src="/client/custom/modules/calculator/static/images/round.png" alt="Round">
						</label>
		
						<label for="triangle" title="triangle">
							<input type="radio" id="triangle" name="input-type" value="triangle">
							<img src="/client/custom/modules/calculator/static/images/triangle_n.png" alt="Triangle">
						</label>
		
						<label for="lift" title="lift">
							<input type="radio" id="lift" name="input-type" value="lift">
							<img src="/client/custom/modules/calculator/static/images/crane.png" alt="Lift">
						</label>
					</div>
					<div class="error-message" id="error-input-type">Please select an input type</div>
				</div>
				<div id="zebra-parameters" class="form-group">
					<label for="zebra-length">Length (mm):</label>
					<input type="number" id="zebra-length" class="error" min="0">
					<div class="error-message" id="error-zebra-length">Please enter valid zebra length</div>
					<label for="zebra-width">Width (mm):</label>
					<input type="number" id="zebra-width" class="error" min="0">
					<div class="error-message" id="error-zebra-width">Please enter valid zebra width</div>
					<div class="checkbox-group">
						<label><input type="checkbox" id="add-gap">Gap</label>
						<input type="number" id="gap-size" placeholder="Gap (mm)" disabled min="0">
						<div class="error-message" id="error-gap-size">Please enter valid gap parameter</div>
					</div>
				</div>
				<div id="round-parameters" class="form-group" style="display: none;">
					<label for="round-symbol">Real Symbol Diameter (mm):</label>
					<input type="number" id="round-symbol" class="error" min="0">
					<div class="error-message" id="error-round-symbol">Please enter valid real symbol diameter</div>
					<div class="checkbox-group">
						<label><input type="checkbox" id="custom-glass-round"> Custom Glass Size</label>
						<input type="number" id="glass-size-round" placeholder="Glass Size (mm)" disabled min="0">
						<div class="error-message" id="error-glass-size-round">Please enter valid glass size</div>
					</div>
				</div>
				<div id="triangle-parameters" class="form-group" style="display: none;">
					<label for="triangle-side">Triangle Side (mm):</label>
					<input type="number" id="triangle-side" class="error" min="0">
					<div class="error-message" id="error-triangle-side">Please enter valid triangle side</div>
					<div class="checkbox-group">
						<label><input type="checkbox" id="custom-glass-triangle"> Custom Glass Size</label>
						<input type="number" id="glass-size-triangle" placeholder="Glass Size (mm)" disabled min="0">
						<div class="error-message" id="error-glass-size-triangle">Please enter valid glass size</div>
					</div>
				</div>
				<div id="lift-parameters" class="form-group" style="display: none;">
					<label for="lift-length">Length (mm):</label>
					<input type="number" id="lift-length" class="error" min="0">
					<div class="error-message" id="error-lift-length">Please enter valid lift length</div>
					<label for="lift-width">Width (mm):</label>
					<input type="number" id="lift-width" class="error" min="0">
					<div class="error-message" id="error-lift-width">Please enter valid lift width</div>
					<label for="lift-height">Height (mm):</label>
					<input type="number" id="lift-height" class="error" min="0">
					<div class="error-message" id="error-lift-height">Please enter valid lift height</div>
					<label for="lift-capacity">Lifting height (mm):</label>
					<input type="number" id="lift-capacity" class="error" min="0">
					<div class="error-message" id="error-lift-capacity">Please enter valid lift capacity</div>
				</div>
				<div class="button-group">
					<button class="green-button" onclick="calculate()">Submit</button>
					<button class="blue-button" onclick="showInfo()">Info</button>
					<button class="red-button" onclick="resetEntries()">Reset</button>
		
				</div>
			</div>
			<div class="results-container">
				<h2>Results</h2>
				<table>
					<thead>
					<tr>
						<th>Projector  ▼</th>
						<th>Lens  ▼</th>
						<th>Illuminance (LUX)</th>
						<th>Symbol (LUX)  ▼</th>
						<th>Price, €  ▼</th>
						<th>Symbol Size  ▼</th>
					</tr>
					</thead>
					<tbody id="result-body">
		
					</tbody>
				</table>
			</div>

		<div class="floating-error" id="floating-error"></div>
		</div>
	`;

	const contentContainer = document.getElementById('content');
    contentContainer.insertAdjacentHTML('beforeend', helloWorldHtml);

	const styleLink = document.createElement('link');
	styleLink.rel = 'stylesheet';
	styleLink.href = 'client/custom/modules/calculator/static/css/styles.css';
	styleLink.id = 'chatbot-stylesheet';
	document.head.appendChild(styleLink);

	await this.loadScript('client/custom/modules/calculator/static/scripts/main.js', "module");
	await this.loadScript('client/custom/modules/calculator/static/scripts/scripts.js');

	document.querySelector('.green-button').addEventListener('click', calculate);
    document.querySelector('.blue-button').addEventListener('click', showInfo);
    document.querySelector('.red-button').addEventListener('click', resetEntries);

}

	loadScript(src, type = 'text/javascript') {
        return new Promise((resolve, reject) => {
            const uniqueSrc = `${src}?_=${new Date().getTime()}`;
            const script = document.createElement('script');
            script.src = uniqueSrc;
			script.type = type;
            script.onload = () => {
                resolve();
            };
            script.onerror = () => {
                console.error(`Error loading script ${uniqueSrc}`);
                reject(new Error(`Script load error for ${uniqueSrc}`));
            };
            document.head.appendChild(script);
        });
    }

    removeHelloWorld() {
        const modal = document.getElementById('hello-world-modal');
        if (modal) {
            modal.remove();
        }
    }

    checkHashAndToggleModal() {
		const main_div = document.getElementById('main');
		if (window.location.hash === '#Seeker') {
			main_div.style.display = "none";
			if (!document.getElementById('hello-world-modal')) {
				this.showHelloWorld();
			}
		} else {
			main_div.style.display = '';
			this.removeHelloWorld();
		}
	}

		setupFinal() {
			if (this.mode === this.MODE_EDITABLE_LIST) {
				this.mode = this.MODE_LIST;
			}

			super.setupFinal();
		}

		onListModeSet() {
			if (!this.listEditDisabled) {
				this._isEditableListMode = true;

				this.listenToOnce(
					this,
					'after:render',
					this.initListInlineEdit,
					this,
				);
			}

			return super.onListModeSet();
		}

		inlineEdit() {
			const callback = e => {
				const $cell = this.get$cell();

				if (!$cell.length || $cell.find(e.target).length) {
					return;
				}

				this.inlineEditSave();
			};

			return super.inlineEdit().then(() => {
				if (this._isEditableListMode) {
					this.$el.closest('.list').toggleClass('edit-mode', true);
					$('#content').on('click.inline-edit-list', callback);

					return;
				}

				$('#content').on('dblclick.inline-edit', callback);
			});
		}

		initListInlineEdit() {
			if (
				this.disabled ||
				this.readOnly ||
				this.$el.find('.inline-edit-list').length
			) {
				return;
			}
			const $editLink = $('<a>')
				.attr('role', 'button')
				.addClass('inline-edit-list inline-edit-link hidden')
				.append($('<span>').addClass('fas fa-pencil-alt fa-sm'));

			this.$el.append($editLink);

			$editLink.on('click', () => this.inlineEdit());

			this.$el
				.on('mouseenter', () => {
					if (!this.isEditMode()) {
						$editLink.removeClass('hidden');
					}
				})
				.on('mouseleave', () => {
					if (!this.isEditMode()) {
						$editLink.addClass('hidden');
					}
				})
				.on('click', e => {
					e.stopPropagation();
				});
		}

		addInlineEditLinks() {
			if (!this._isEditableListMode) {
				super.addInlineEditLinks();
			}
		}

		setIsInlineEditMode(value) {
			super.setIsInlineEditMode(value);

			if (!value) {
				this.removeDocumentClickListener();
			}
		}

		removeDocumentClickListener() {
			$('#content')
				.off('click.inline-edit-list')
				.off('dblclick.inline-edit');
		}

		inlineEditClose(dontReset) {
			this.removeDocumentClickListener();

			if (!this._isEditableListMode) {
				return super.inlineEditClose(dontReset);
			}

			this.trigger('inline-edit-list-off');
			this.$el.off('keydown.inline-edit');

			this.$el.closest('.list').toggleClass('edit-mode', false);

			this._value = false;
			this.setMode(this.MODE_LIST);

			this.once('after:render', () => {
				this.initListInlineEdit();
			});

			if (!dontReset) {
				this.model.set(this.initialAttributes);
			}

			this.reRender(true);
			this.trigger('after:inline-edit-list-off');

			return Promise.resolve();
		}
	};
});