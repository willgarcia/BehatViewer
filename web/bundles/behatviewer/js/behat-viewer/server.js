(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

    var defaults = {
        source:'/'
    };

    behat.server = {
        settings:{},
        events:{},
        source:null
    };

    behat.server.init = function (options) {
        this.settings = $.extend({}, defaults, options);

        if (!!window.EventSource) {
            behat.server.source = new EventSource(behat.server.settings.source);
        } else {
            //Fallback to xhr polling :(
        }
    };

    behat.server.trigger = function (e) {
        //console.log('trigger: ' + e.type, e, behat.server.events[e.type]);

        if (behat.server.events[e.type]) {
            for (var i = 0, max = behat.server.events[e.type].length; i < max; i++) {
                behat.server.events[e.type][i](e)
            }
        }
    }

    behat.server.stop = function () {
        behat.server.source.close();
    }

    behat.server.bind = function (event, callback) {
        //console.log('bind: ', event, callback);

        if (!behat.server.events[event]) {
            $(behat.server.source).on(event, behat.server.trigger);
            behat.server.events[event] = [];

            //console.log('added slot: ', event, behat.server.events[event]);
        }

        behat.server.events[event].push(callback);
        //console.log('pushed callback: ', behat.server.events[event]);
    }

    behat.server.unbind = function (event) {
        //console.log('unbind: ', event);

        if (behat.server.events[event]) {
            behat.server.events[event] = [];
        }
    }

    behat.server.subscribe = function (event, callback) {
        behat.server.bind(event, callback);
    }

    behat.server.unsubscribe = function (event) {
        behat.server.unbind(event);
    }
})(window.jQuery);