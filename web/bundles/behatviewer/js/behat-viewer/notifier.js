(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

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

    behat.notifier = {
        settings:{}
    };

    behat.notifier.init = function (options) {
        this.settings = $.extend({}, defaults, options);
    };

    behat.notifier.notify = function (type, text) {
        noty(
            $.extend(
                {},
                this.settings.noty,
                {
                    'type':type,
                    'text':'[ ' + moment().format('HH:mm:ss') + ' ] ' + text
                }
            )
        );
    }
})(window.jQuery);