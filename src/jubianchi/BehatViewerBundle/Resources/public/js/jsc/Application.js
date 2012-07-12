var Application;

(function ($) {
	JSC.require(
		['jsc/Controller', 'jsc/Loader', 'jsc/Notifier'],
		function () {
			Application = function (master, url, controller) {
				Controller.call(this, master);

                this.cls = 'Application';

				this.controller = controller;
				this.home = url;
                this.loader = new Loader();
                this.notifier = new Notifier();
			};

			Application.prototype = new Controller();
			Application.prototype.constructor = Application;

			Application.prototype.init = function () {
				Controller.prototype.init.call(this);

                return this;
			};
		}
	);
}(jQuery));