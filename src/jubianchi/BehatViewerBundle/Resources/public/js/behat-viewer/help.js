var HelpController;

(function ($, JSC) {
  "use strict";

  JSC.require(
    ['prettify', 'jsc/NavigationController'],
    function () {
        HelpController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'HelpController';

            this.actions = ['navig'];
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

        HelpController.prototype.navigAction = function (elem, e) {
            this.navigationController.navigationAction(elem, e);
            $(elem).parents('ul').find('.active').removeClass('active');
            $(elem).parents('li').addClass('active');
        };
    }
  );
}(window.jQuery, window.JSC));