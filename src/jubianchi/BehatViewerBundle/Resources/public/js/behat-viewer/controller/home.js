var HomeController;

(function ($) {
  "use strict";

  JSC.require(
    ['NavigationController'],
    function () {
        HomeController = function (master) {
          NavigationController.call(this, master);

          this.actions = ['switch', 'details'];
        };

        HomeController.prototype = new NavigationController();
        HomeController.prototype.constructor = HomeController;

        HomeController.prototype.init = function () {
          NavigationController.prototype.init.call(this);

          return this;
        };

        HomeController.prototype.switchAction = function (elem, e) {
            app.controller.navigationAction(elem, e)
        };

        HomeController.prototype.detailsAction = function (elem, e) {
            if($(elem).is('tr')) {
                elem = $('[data-action=details]', e.currentTarget).get(0);
            }

            app.controller.navigationAction(elem, e)
        };

        app.controller.current(new HomeController('#container'));
    }
  );
}(jQuery));