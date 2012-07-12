var HelpController;

(function ($, JSC) {
  "use strict";

  JSC.require(
    ['prettify', 'jsc/NavigationController'],
    function () {
        HelpController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'HelpController';

            this.navigationController = new NavigationController('#help');
        };

        HelpController.prototype = new NavigationController();
        HelpController.prototype.constructor = HelpController;

        HelpController.prototype.init = function () {
            NavigationController.prototype.init.call(this);

            return this;
        };

        HelpController.prototype.complete = function () {
            window.prettyPrint();
        };
    }
  );
}(window.jQuery, window.JSC));