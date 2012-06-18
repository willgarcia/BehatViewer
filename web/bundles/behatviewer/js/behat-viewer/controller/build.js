(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

    var defaults = {};

    behat.build = {
        settings:{},
        window:$(window)
    };

    behat.build.init = function (options) {
        this.settings = $.extend({}, defaults, options);

        if ($.fn.tablesorter) {
            $('.tablesorter').tablesorter({
                textExtraction:{
                    4:function (node, table, cellIndex) {
                        return $(node).attr('data-value');
                    },
                    5:function (node, table, cellIndex) {
                        return $(node).attr('data-value');
                    }
                }
            });
        }

        $(document).delegate('[data-action*=delete]', 'click', behat.build.del);
        $(document).delegate('[data-action=details]', 'click', behat.build.details);
        $(document).delegate('[data-action=output]', 'click', behat.build.details);
        $(document).delegate('.pagination a', 'click', behat.build.details);
        $(document).delegate('thead [type=checkbox]', 'click', behat.build.select);

        $('.tablesorter').fixedTable();
    };

    behat.build.deinit = function () {
        $(document).undelegate('[data-action*=delete]', 'click');
        $(document).undelegate('[data-action=details]', 'click');
        $(document).undelegate('[data-action=output]', 'click');
        $(document).undelegate('.pagination a', 'click');
        $(document).undelegate('thead [type=checkbox]', 'click');
    };

    behat.build.select = function (e) {
        $('tbody [type=checkbox]').each(function() {
            $(this).attr('checked', !$(this).attr('checked'));
        });
    };

    behat.build.del = function (e) {
        e.preventDefault();

        var target = $(e.target);

        if(target.attr('data-action') == 'delete') {
            $.get(
                target.attr('href'),
                function () {
                    behat.application.notifier.notify('success', 'Build has been deleted');

                    target.parents('tr').fadeOut(500, function () {
                        $(this).remove()
                    })
                }
            )
        } else {
            alert($('input[name*=delete]').serialize());

            $.ajax({
                type: 'POST',
                url: target.attr('href'),
                data: $(':checked').serialize(),
                success: function () {
                    behat.application.notifier.notify('success', 'Builds have been deleted');

                    $(':checked').parents('tr').fadeOut(500, function () {
                        $(this).remove()
                    })
                }
            });
        }
    };

    behat.build.details = function (e) {
        e.preventDefault();

        behat.application.browse($(e.target).attr('href'))
    }
})(window.jQuery);

