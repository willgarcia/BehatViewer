var Controller;

(function ($) {
	"use strict";

  Controller = function (master) {
		this.actions = [];
		this.master = master;
	};

	Controller.prototype = {};
	Controller.prototype.constructor = new Controller();

	Controller.prototype.toString = function () { return (typeof this).toString(); };

	Controller.prototype.init = function () {
    var i,
      self = this;
    for (i in this.actions) {
			if (this.actions.hasOwnProperty(i)) {
        this.bind(this.actions[i]);
      }
		}

		return this;
	};

  Controller.prototype.complete = function () {
    return this;
  };

	Controller.prototype.deinit = function () {
    var i;
    for (i in this.actions) {
      if (this.actions.hasOwnProperty(i)) {
        this.unbind(this.actions[i]);
      }
		}

    $(window).unbind('navigationSuccess');

		return this;
	};

	Controller.prototype.bind = function (action) {
		JSC.log('Binding action ' + action + ' (' + this.master + ' [data-action=' + action + '])');

    $('body').delegate(this.master + ' [data-action=' + action + ']', 'click', this.executor(action));
	};

	Controller.prototype.unbind = function (action) {
		$('body').undelegate(this.master + ' [data-action=' + action + ']', 'click');
	};

	Controller.prototype.executor = function (action) {
		var controller = this;

		return function (e) {
			controller[action + 'Action'](this, e);
		};
	};

	Controller.prototype.trigger = function (event, args) {
		$(this.master).trigger(event, args);
	};

	Controller.prototype.on = function (event, callback) {
		$(this.master).on(event, callback);
	};

	Controller.prototype.off = function (event, callback) {
		$(this.master).off(event);
	};

	Controller.prototype.load = function (url, type, method, params) {
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
      cache: false,
			data: params || {},
			complete: function (jqXHR, status, responseText) {
				responseText = jqXHR.responseText;

				if (jqXHR.isResolved()) {
					jqXHR.done(function (r) { responseText = r; });

					var content = selector ? $("<div/>").append(responseText) : responseText;

					$(controller.master).html(selector ? content.find(selector) : content);
					$(document).find('title').text(selector && content.find('title').text());

          console.log('triggering loadComplete');
          $(window).trigger('loadComplete');
				}
			}
		});
	};
}(jQuery));