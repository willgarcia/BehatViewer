var LoginController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/NavigationController'],
    function () {
        LoginController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'LoginController';
        };

        LoginController.prototype = new NavigationController();
        LoginController.prototype.constructor = LoginController;
    }
  );
}(jQuery));