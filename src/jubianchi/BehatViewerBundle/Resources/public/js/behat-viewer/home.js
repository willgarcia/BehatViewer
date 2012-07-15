var HomeController;

(function ($, JSC) {
  "use strict";

  JSC.require(
    ['jsc/NavigationController', 'jsc/MomentController'],
    function () {
        HomeController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'HomeController';
        };

        HomeController.prototype = new NavigationController();
        HomeController.prototype.constructor = HomeController;

        HomeController.prototype.complete = function() {
            NavigationController.prototype.complete.call(this);
            MomentController.prototype.complete.call(this, ' <small style="font-size: 0.7em">on %s</small>');
        }
    }
  );
}(window.jQuery, window.JSC));