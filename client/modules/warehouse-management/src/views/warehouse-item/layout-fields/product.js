define(["views/fields/link"], (Dep) => {
    return class extends Dep {
        select(model) {
            if (model.get("defaultWarehousePositionId")) {
                this.getModelFactory().create(
                    "WarehousePosition",
                    (position) => {
                        position.id = model.get("defaultWarehousePositionId");

                        position.fetch().then(() => {
                            if (
                                position.get("warehouseId") ===
                                this.getParentModel().get("warehouseId")
                            ) {
                                this.model.set({
                                    positionToId: position.get("id"),
                                    positionToName: position.get("name"),
                                });
                            }
                        });
                    }
                );
            }

            super.select(model);
        }

        getParentModel() {
            return this.getParentView().getParentView().getParentView().model;
        }
    };
});

