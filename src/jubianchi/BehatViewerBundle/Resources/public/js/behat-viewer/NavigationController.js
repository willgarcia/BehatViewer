var NavigationController;

(function ($) {
	"use strict";

  JSC.require(
		['Controller'],
		function () {
			NavigationController = function (master) {
				Controller.call(this, master);

				$.extend(this.actions, ['navigation']);
				this.currentController = null;
			};

			NavigationController.prototype = new Controller();
			NavigationController.prototype.constructor = NavigationController;

			NavigationController.prototype.init = function () {
				Controller.prototype.init.call(this);

				return this;
			};

      NavigationController.prototype.deinit = function () {
        Controller.prototype.deinit.call(this);

        return this;
      };

      NavigationController.prototype.complete = function () {
        Controller.prototype.complete.call(this);

        return this;
      };

			NavigationController.prototype.navigate = function (href) {
				document.location.hash = '#!' + href;

				this.load(href + ' ' + this.master + ' > *');

				this.trigger({type: 'navigate', 'href': href});
			};

			NavigationController.prototype.current = function (controller) {
        if (controller === "undefined") {
					return this.currentController;
				}

				if (controller !== this.currentController) {
          if (this.currentController) {
            this.currentController.deinit();
					}

          this.currentController = controller.init();
				}

				return this;
			};

			NavigationController.prototype.navigationAction = function (elem, e) {
				var href = $(elem).attr('href'),
          handle = href.indexOf('#');

				if (handle === -1 || handle > 0) {
					e.preventDefault();

					this.navigate(href);
				}
			};
		}
	);
}(jQuery));