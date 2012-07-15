var ProfileController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/NavigationController'],
    function () {
        ProfileController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'ProfileController';
        };

        ProfileController.prototype = new NavigationController();
        ProfileController.prototype.constructor = ProfileController;
    }
  );
}(jQuery));