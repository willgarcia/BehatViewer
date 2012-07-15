var HelpController;

(function ($, JSC) {
  "use strict";

  JSC.require(
    ['prettify', 'jsc/NavigationController'],
    function () {
        HelpController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'HelpController';
        };

        HelpController.prototype = new NavigationController();
        HelpController.prototype.constructor = HelpController;

        HelpController.prototype.complete = function () {
            window.prettyPrint();
        };
    }
  );
}(window.jQuery, window.JSC));