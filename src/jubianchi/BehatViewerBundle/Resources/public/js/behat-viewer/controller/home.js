(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

    var defaults = {
    };

    behat.home = {
        settings:{}
    };

    behat.home.init = function (options) {
        this.settings = $.extend({}, defaults, options);

        $(document).delegate('table tbody tr', 'click', behat.home.details);
        $(document).delegate('[data-action=details]', 'click', behat.home.details);
        $(document).delegate('[data-action=listview]', 'click', behat.home.switchview);
    };

    behat.home.deinit = function () {
        $(document).undelegate('table tbody tr', 'click');
        $(document).undelegate('[data-action=listview]', 'click');
    };

    behat.home.details = function (e) {
        e.preventDefault();

        var href;
        if($(this).is('tr')) {
          href = $('[data-action=details]', e.currentTarget).attr('href');
        } else {
          href = $(this).attr('href');
        }

        behat.application.browse(href);
    }

    behat.home.switchview = function (e) {
        e.preventDefault();

        behat.application.browse($(e.currentTarget).attr('href'))
    }
})(window.jQuery);

