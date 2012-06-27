var JSC;

(function ($) {
    "use strict";

    JSC = {
        debug: false,
        loaded: [],
        base: '',
        log: function (msg, lvl) {
            if (this.debug && console) {
                console.log.apply(console, arguments);
            }
        },
        fail: function (msg, lvl) {
            if (this.debug && console) {
                console.error.apply(console, arguments);
            }
        },
        require: function (script, done, fail) {
            if (!$.isArray(script)) {
              script = [script];
            }

            this.log('Script(s) to load ', script);

            for (var i = 0, m = script.length; i < m; i++) {
                if($.inArray(script[i], this.loaded) < 0) {
                    var path = this.base + '/' + script[i] + '.js';

                    this.loaded[this.loaded.length] = script[i]

                    this.log('Loading ' + script[i]);

                    $.ajax({url: path, dataType: 'script', async: false, cache: !JSC.debug}).fail(fail || this.fail);
                }
            }

            (done || function() {})();

            return this;
        }
    };
}(jQuery));