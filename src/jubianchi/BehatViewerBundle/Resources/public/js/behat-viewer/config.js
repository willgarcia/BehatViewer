var ConfigController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/Controller'],
    function () {
        ConfigController = function (master) {
            Controller.call(this, master);

            this.cls = 'ConfigController';
        };

        ConfigController.prototype = new Controller();
        ConfigController.prototype.constructor = ConfigController;
    }
  );
}(jQuery));