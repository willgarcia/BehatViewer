var Application;

(function ($) {
	JSC.require(
		['Controller'],
		function () {
			Application = function (master, url, controller) {
				Controller.call(this, master);

				this.controller = controller;
				this.home = url;
			};

			Application.prototype = new Controller();
			Application.prototype.constructor = Application;

			Application.prototype.init = function () {
				Controller.prototype.init.call(this);

				if (document.location.hash.indexOf('!') !== -1) {
					this.controller.navigate(document.location.hash.substring(2));
				} else {
					this.controller.navigate(this.home);
				}

        return this;
			};
		}
	);
}(jQuery));