var ProfileController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/Controller'],
    function () {
        ProfileController = function (master) {
            Controller.call(this, master);

            this.cls = 'ProfileController';

            this.actions = ['submit'];
        };

        ProfileController.prototype = new Controller();
        ProfileController.prototype.constructor = ProfileController;

        ProfileController.prototype.init = function () {
            Controller.prototype.init.call(this);

            return this;
        };

        ProfileController.prototype.submitAction = function (elem, e) {
            e.preventDefault();

            $.ajax({
                url: $(elem).parents('form').attr('action'),
                type: 'POST',
                data: $(elem).parents('form').serialize(),
                success:function () {
                    app.notifier.notify('Your profile was successfully saved');
                    app.setUsername($('#username').val());
                    app.refreshAvatar($('#email').val());
                },
                error:function () {
                    app.notifier.notify('An error occured while saving your profile', 'error');
                }
            })
        };
    }
  );
}(jQuery));