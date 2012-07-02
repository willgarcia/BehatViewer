var LoginController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/NavigationController'],
    function () {
        LoginController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'LoginController';

            this.actions = ['submit'];
        };

        LoginController.prototype = new NavigationController();
        LoginController.prototype.constructor = LoginController;

        LoginController.prototype.init = function () {
            NavigationController.prototype.init.call(this);

            return this;
        };

        LoginController.prototype.submitAction = function (elem, e) {
            e.preventDefault();

            this.navigate(
                $(elem).parents('form').attr('action'),
                'html',
                'POST',
                $(elem).parents('form').serialize()
            );
        };
    }
  );
}(jQuery));