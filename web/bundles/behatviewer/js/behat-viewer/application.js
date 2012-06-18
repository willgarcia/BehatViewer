(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

    var defaults = {
        baseurl:'/',
        server:null,
        container:'#container',
        toolbar:'#toolbar'
    };

    behat.application = {
        settings:{},
        server:behat.server,
        notifier:behat.notifier,
        toolbar:behat.toolbar,
        controller:null,
        refreshtimer:null
    };

    behat.application.setController = function (controller) {
        if (behat.application.controller && behat.application.controller != controller) {
            if (behat.application.controller.deinit) behat.application.controller.deinit();
        }

        if (behat.application.controller != controller) {
            if (controller.init) controller.init();

            behat.application.controller = controller;
        }
    };

    behat.application.browse = function (url, resetscroll) {
        if (resetscroll == undefined) resetscroll = true;

        if (behat.application.refreshtimer != null) {
            clearTimeout(behat.application.refreshtimer);
            clearInterval(behat.application.refreshtimer);
            behat.application.refreshtimer = null;
        }

        $('#ajax').load(
            url != null ? url : behat.application.settings.baseurl + ' #' + behat.application.settings.container,
            function () {
                if (url != null && url != behat.application.baseurl) {
                    document.location.hash = '#!' + url;
                } else {
                    document.location.hash = '';
                }

                if (resetscroll) $(document).scrollTop(0);
            }
        );
    };

    behat.application.init = function (options) {
        this.settings = $.extend({}, defaults, options);

        if (behat.application.server && behat.application.settings.server) {
            behat.application.server.init({
                source:behat.application.settings.server
            });
        }

        if (behat.application.notifier) behat.application.notifier.init();

        if (behat.application.toolbar) {
            behat.application.toolbar.init({
                element:behat.application.settings.toolbar
            });
        }

        $(this.settings.container).wrap('<div id="ajax"/>');

        if (document.location.hash && document.location.hash != '#!' + this.settings.baseurl) {
            this.browse(document.location.hash.substr(2));
        }
    }
})(window.jQuery);