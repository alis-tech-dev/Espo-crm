Espo.define('push-notifications:views/fields/push-notifications-bool', 'views/fields/bool', function (Dep) {

    return Dep.extend({
        setup: function () {
            Dep.prototype.setup.call(this);

            this.listenTo(this, 'change', function () {
                if (this.$element.get(0).checked)
                    Notification.requestPermission().then(function (permission) {
                        if (permission !== "granted")
                            this.$element.get(0).checked = false;
                    }.bind(this));
            }, this);
        }
    });
});