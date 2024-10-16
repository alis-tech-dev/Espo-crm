define(['views/fields/varchar', 'date-time'], (Dep, DateTime) => {
	return class extends Dep {
		detailTemplate = 'accounting:fields/vat-id/detail';
		listTemplate = 'accounting:fields/vat-id/list';

		noSpellCheck = true;

		data() {
			const status = this.model.get(this.name + 'Status');
			const description = this.model.get(this.name + 'Description');

			const style = this.getMetadata().get([
				'fields',
				'vatId',
				'fields',
				'status',
				'style',
			])[status];

			// We reuse the translation of the status field from UnreliablePayer
			const statusTranslated = this.getLanguage().translateOption(
				status,
				'status',
				'UnreliablePayer',
			);

			let descriptionTranslated = '';

			let dateTime = new DateTime();

			dateTime.dateFormat = 'DD. MM. YYYY'

			if(description){

				descriptionTranslated = this.getLanguage().translateOption(
					description,
					'description',
					'UnreliablePayer'
				);

				descriptionTranslated = descriptionTranslated.replace(
					'{vatId}',
					this.model.get(this.name)
				);
	
				descriptionTranslated = descriptionTranslated.replace(
					'{date}',
					dateTime.toDisplayDate(this.model.get(this.name + 'Date'))
				);

			}

			return {
				...super.data(),
				statusTranslated: statusTranslated,
				descriptionTranslated: descriptionTranslated,
				style: style,
				class: 'label label-md label',
			};
		}

		setup() {
			super.setup();

			this.params['maxLength'] = this.getMetadata().get([
				'fields',
				'vatId',
				'fieldDefs',
				'len',
			]);
		}
	};
});