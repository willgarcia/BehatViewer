var Notifier;

(function ($) {
    "use strict";

    JSC.require(
        ['jquery.noty', 'jquery.promise', 'moment'],
        function () {
            var defaults = {
                noty:{
                    theme:'noty_theme_twitter',
                    type:'success',
                    timeout:5000,
                    layout:'top',
                    custom:{
                        container:$('#notification')
                    },
                    closeButton:false
                }
            };

            Notifier = function(options) {
                this.settings = $.extend({}, defaults, options);
            };

            Notifier.prototype = new Object();
            Notifier.prototype.constructor = Notifier;

            Notifier.prototype.notify = function (text, type) {
                noty(
                    $.extend(
                        {},
                        this.settings.noty,
                        {
                            'type': type || this.settings.noty.type,
                            'text': '[ ' + moment().format('HH:mm:ss') + ' ] ' + text
                        }
                    )
                );
            };
        }
    );
}(jQuery));