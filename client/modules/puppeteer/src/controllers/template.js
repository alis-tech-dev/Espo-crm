"use strict";define(["controllers/record"],r=>class extends r{create(e){e=e||{},e.attributes=e.attributes||{},"type"in e&&(e.attributes.type=e.type),super.create(e)}});
