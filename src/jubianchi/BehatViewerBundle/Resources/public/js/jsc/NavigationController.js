var NavigationController;

(function ($, JSC) {
	"use strict";

    JSC.require(
		['jsc/Controller'],
		function () {
			NavigationController = function (master) {
				Controller.call(this, master);

                this.cls = 'NavigationController';

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

            NavigationController.prototype.load = function (url, type, method, params) {
                var controller = this,
                    off = url.indexOf(" "),
                    selector;

                if (off >= 0) {
                    selector = url.slice(off + 1, url.length);
                    url = url.slice(0, off);
                }

                JSC.log('Loading ' + url + ' into ' + selector);

                $.ajax({
                    url: url,
                    type: method || 'GET',
                    dataType: type || 'html',
                    cache: !JSC.debug,
                    data: params || {},
                    complete: function (jqXHR, status, responseText) {
                        responseText = jqXHR.responseText;

                        if (jqXHR.isResolved()) {
                            jqXHR.done(function (r) { responseText = r; });

                            var content = selector ? $("<div/>").append(responseText) : responseText;

                            $(controller.master).html(selector ? content.find(selector) : content);

                            JSC.log('triggering loaded');
                            $(window).trigger('loaded');
                        }
                    }
                });
            };

			NavigationController.prototype.navigate = function (href, type, method, params) {
				document.location.hash = '#!' + href;

				this.load(href + ' ' + this.master + ' > *', type, method, params);

				this.trigger({type: 'navigate', 'href': href});
			};

			NavigationController.prototype.current = function (controller) {
                if (controller === "undefined") {
					return this.currentController;
				}

				if (controller !== this.currentController) {
                    if (this.currentController) {
                        JSC.log('Deinitializing ' + this.currentController.toString());
                        this.currentController.deinit();
					}

                    this.currentController = controller.init();
                    JSC.log('Initialized ' + this.currentController.toString());
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
}(window.jQuery, window.JSC));