var Controller;

(function ($) {
	"use strict";

    Controller = function (master) {
        this.cls = 'Controller';
        this.actions = [];
		this.master = master;
	};

	Controller.prototype = {};
	Controller.prototype.constructor = new Controller();

	Controller.prototype.toString = function () { return (typeof this).toString() + ' ' + this.cls.toString() };

	Controller.prototype.init = function () {
        var i,
            self = this;

        for (i in this.actions) {
			if (this.actions.hasOwnProperty(i)) {
                this.bind(this.actions[i]);
            }
		}

        var complete = function (e) { self.complete.call(self); $(window).unbind(e); };
        $(window).bind('loaded', complete);

		return this;
	};

    Controller.prototype.complete = function () {
        JSC.log(this.toString() + ' successfully loaded');

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
        JSC.log('Binding action ' + this.cls + '.' + action + ' (' + this.master + ' [data-action=' + action + '])');

        $('body').delegate(this.master + ' [data-action=' + action + ']', 'click', this.executor(action));
	};

	Controller.prototype.unbind = function (action) {
        JSC.log('Unbinding action ' + this.cls + '.' + action + ' (' + this.master + ' [data-action=' + action + '])');

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
}(jQuery));