define(['views/settings/record/edit'], Dep => {
	return class extends Dep {
		detailLayout = [
			{
				rows: [
					[
						{
							name: 'reclamationDefaultWarehouse',
						},
						false,
					],
				],
			},
		];
	};
});
