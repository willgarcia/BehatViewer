(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

    var defaults = {
        element:'#toolbar',
        interval:5000
    };

    behat.toolbar = {
        settings:{},
        loader:behat.loader
    };

    behat.toolbar.init = function (options) {
        this.settings = $.extend({}, defaults, options);

        if (behat.toolbar.loader) behat.toolbar.loader.init();

        $(this.settings.element).delegate('[data-action=build]', 'click', behat.toolbar.build);
        $(this.settings.element).delegate('[data-action=analyze]', 'click', behat.toolbar.analyze);
        $(this.settings.element).delegate('[data-action=output]', 'click', behat.toolbar.navig);
        $(this.settings.element).delegate('[data-action=definitions]', 'click', behat.toolbar.definitions);

        $(this.settings.element).delegate('a:not([data-action], .brand)', 'click', behat.toolbar.navig);

        behat.application.server.subscribe('jobEnqueued', behat.toolbar.notifyEnqueue);
        behat.application.server.subscribe('jobStarted', behat.toolbar.notifyStart);
        behat.application.server.subscribe('jobFinished', behat.toolbar.notifyFinish);

        $(behat.toolbar.settings.element).find('#last-build').css('display', 'none');
        $(behat.toolbar.settings.element).find('#last-build').click(behat.toolbar.navig);
    };

    behat.toolbar.deinit = function () {
        $(this.settings.element).undelegate('[data-action=build], [data-action=analyze], [data-action=output], [data-action=definitions], a:not([data-action])', 'click');

        behat.application.server.unsubscribe(behat.toolbar.notifyEnqueue);
        behat.application.server.unsubscribe(behat.toolbar.notifyStart);
        behat.application.server.unsubscribe(behat.toolbar.notifyFinish);
    };

    behat.toolbar.notify = function (type, message) {
        if (behat.application.notifier) {
            behat.application.notifier.notify(type, message);
        }
    };

    behat.toolbar.notifyStart = function () {
        behat.toolbar.notify('success', 'Job started');
    };

    behat.toolbar.notifyFinish = function () {
        behat.toolbar.notify('success', 'Job finished');

        if (behat.application.browser) {
            behat.toolbar.settings.browser(document.location.hash != '' ? document.location.hash.substr(2) : null, false)
        }
    };

    behat.toolbar.notifyEnqueue = function () {
        behat.toolbar.notify('information', 'Job enqueued');
    };

    behat.toolbar.build = function (e) {
        e.preventDefault();
        $.get($('[data-action=build]', $(behat.toolbar.settings.element)).attr('href'));
    };

    behat.toolbar.analyze = function (e) {
        e.preventDefault();
        $.get($('[data-action=analyze]', $(behat.toolbar.settings.element)).attr('href'));
    };

    behat.toolbar.definitions = function (e) {
        e.preventDefault();
        $.get($('[data-action=definitions]', $(behat.toolbar.settings.element)).attr('href'));
    };

    behat.toolbar.navig = function (e) {
        e.preventDefault();

        behat.application.browse($(e.target).attr('href'));
    };

    behat.toolbar.lastBuild = function (e) {
        if(e) {
            var elem = $(behat.toolbar.settings.element).find('#last-build');
            elem.find('.btn').attr('href', Routing.generate('behatviewer.historyentry', {"id": e}));
            elem.css('display', 'block');
        } else {
            $(behat.toolbar.settings.element).find('#last-build').css('display', 'none');
        }
    };

    behat.toolbar.restore = function () {
        $('[data-action=build]', $(behat.toolbar.settings.element)).removeClass('disabled');
        $('[data-action=analyze]', $(behat.toolbar.settings.element)).removeClass('disabled');
        $('[data-action=definitions]', $(behat.toolbar.settings.element)).removeClass('disabled');
        $('[data-action=output]', $(behat.toolbar.settings.element)).addClass('disabled');
    };

    behat.toolbar.disable = function () {
        $('[data-action=build]', $(behat.toolbar.settings.element)).addClass('disabled');
        $('[data-action=analyze]', $(behat.toolbar.settings.element)).addClass('disabled');
        $('[data-action=definitions]', $(behat.toolbar.settings.element)).addClass('disabled');
        $('[data-action=output]', $(behat.toolbar.settings.element)).removeClass('disabled');
    }

})(window.jQuery);