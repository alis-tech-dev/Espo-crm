define(() => {
	/**
	 * @memberOf module:autocrm:helpers/partitioned-view
	 */
	class Class {
		/**
		 * @param scope {string} A scope name
		 * @param storage {module:storage.Class} Storage util
		 * @param fieldManager {module:field-manager.Class} Metadata util
		 */
		constructor(scope, storage, fieldManager) {
			this.scope = scope;
			this.storage = storage;
			this.fieldManager = fieldManager;
		}

		/**
		 * Get all possible field to partition by
		 *
		 * @public
		 * @returns {string[]}
		 */
		getOptions() {
			return this.fieldManager.getEntityTypeFieldList(this.scope, {
				acl: 'read',
				type: 'enum',
			});
		}

		/**
		 * Get active partition option
		 *
		 * @public
		 * @returns {string}
		 */
		getActiveOption() {
			const key = 'partitionedView' + this.scope;

			return this.storage.get('active', key) || this.getOptions()[0];
		}

		/**
		 * Save selected partition option
		 *
		 * @public
		 */
		saveActiveOption(option) {
			const key = 'partitionedView' + this.scope;

			this.storage.set('active', key, option);
		}
	}

	return Class;
});
