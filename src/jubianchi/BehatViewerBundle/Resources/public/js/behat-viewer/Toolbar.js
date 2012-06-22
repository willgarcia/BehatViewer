var Toolbar;

(function ($) {
  "use strict";

  JSC.require(
		['Controller'],
		function () {
			Toolbar = function (master, controller) {
				Controller.call(this, master);

				this.controller = controller;
				$.extend(this.actions, ['menu']);
			};

			Toolbar.prototype = new Controller;
			Toolbar.prototype.constructor = Toolbar;

			Toolbar.prototype.menuAction = function (elem, e) {
				this.controller.navigationAction(elem, e);
			};
		}
	);
}(jQuery));