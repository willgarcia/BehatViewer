var LoginController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/Controller'],
    function () {
        LoginController = function (master) {
            Controller.call(this, master);

            this.cls = 'LoginController';

            this.actions = ['submit'];
        };

        LoginController.prototype = new Controller();
        LoginController.prototype.constructor = LoginController;

        LoginController.prototype.init = function () {
            Controller.prototype.init.call(this);

            return this;
        };

        LoginController.prototype.submitAction = function (elem, e) {
            e.preventDefault();

            $.ajax({
                url: $(elem).parents('form').attr('action'),
                type: 'POST',
                data: $(elem).parents('form').serialize(),
                success:function () {
                    app.notifier.notify('You were successfully logged in');

                    document.location.href = Routing.generate('behatviewer.homepage');
                },
                error:function () {
                    app.notifier.notify('An error occured while logging you in.', 'error');
                }
            })
        };
    }
  );
}(jQuery));