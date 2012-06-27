var ConfigController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/Controller'],
    function () {
        ConfigController = function (master) {
            Controller.call(this, master);

            this.cls = 'ConfigController';

            this.actions = ['submit'];
        };

        ConfigController.prototype = new Controller();
        ConfigController.prototype.constructor = ConfigController;

        ConfigController.prototype.init = function () {
            Controller.prototype.init.call(this);

          return this;
        };

        ConfigController.prototype.submitAction = function (elem, e) {
            e.preventDefault();

            $.ajax({
                url: $(elem).parents('form').attr('action'),
                type: 'POST',
                data: $(elem).parents('form').serialize(),
                success:function () {
                    app.notifier.notify('Settings were successfully saved.');

                    $('.alert.alert-block.alert-info').fadeOut(function () {
                        $('.alert.alert-block.alert-info').remove()
                    });
                    app.toolbar.setTitle('[' + $('#Project_name').val() + ']');
                },
                error:function () {
                    app.notifier.notify('An error occured while saving settings.', 'error');
                }
            })
        };
    }
  );
}(jQuery));