(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

    var defaults = {
    };

    behat.feature = {
        settings:{}
    };

    behat.feature.init = function (options) {
        this.settings = $.extend({}, defaults, options);

        window.prettyPrint && prettyPrint();

        $(document).delegate('[href^="#"]', 'click', function (e) {
            e.preventDefault();

            var target = $(this).attr('href');
            $(document).scrollTop($(target).position().top - parseInt($('body').css('padding-top')))
        });

        $(document).delegate('[data-rel=snippet]', 'click', behat.feature.snippet);
        $(document).delegate('[data-rel=screenshot]', 'click', behat.feature.screenshot);
        $(document).delegate('[data-action=summary]', 'click', behat.feature.browse);
        $(document).delegate('[data-action=source]', 'click', behat.feature.browse);
        $(document).delegate('a.label', 'click', behat.feature.browse)
    };

    behat.feature.deinit = function () {
        $(document).undelegate('[data-rel=snippet]', 'click');
        $(document).undelegate('[data-rel=screenshot]', 'click');
        $(document).undelegate('a.label', 'click')
    };

    behat.feature.snippet = function (e) {
        e.preventDefault();

        $('#' + $(e.target).attr('data-toggle')).toggle()
    };

    behat.feature.screenshot = function (e) {
        e.preventDefault();

        var p = $(e.target).attr('data-toggle').split('-'),
            id = p[1],
            t = function() { $('#' + $(e.target).attr('data-toggle')).toggle(); };

        if(!$('#' + $(e.target).attr('data-toggle')).find('img').length) {
            $.get(
                Routing.generate('behatviewer.screenshot', {"id": id}),
                function(data) {
                    $('#' + $(e.target).attr('data-toggle')).append('<img src="' + data + '" style="width: 70%" />');
                    t();
                }
            );
        } else {
            t();
        }
    }

    behat.feature.browse = function (e) {
        e.preventDefault();

        behat.application.browse($(e.currentTarget).attr('href'))
    }
})(window.jQuery);

