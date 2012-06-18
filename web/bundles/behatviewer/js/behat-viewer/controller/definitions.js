(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

    var defaults = {
    };

    behat.definitions = {
        settings:{},
        window:$(window)
    };

    behat.definitions.init = function (options) {
        this.settings = $.extend({}, defaults, options);

        if ($.fn.tablesorter) $('.tablesorter').tablesorter();

        $('#contexts').chosen();
        $('#contexts').chosen().change(function () {
            var vals = $('#contexts').val(),
                v = function (e) {
                    for (var c in vals) {
                        if (e.text().indexOf(vals[c]) > -1) return true;
                    }

                    return false;
                };

            if (!vals) {
                $('#definitions tr').css('display', '');
            } else {
                $('td.context').each(function () {
                    if (v($(this))) {
                        $(this).parent().css('display', '');
                    } else {
                        $(this).parent().css('display', 'none');
                    }
                })
            }
        });

        $(document).delegate('#search', 'keyup', function () {
            var list = $('#definitions');

            if ($(this).val()) {
                $('td.snippet:not([data-search*="' + $(this).val().toString().toLowerCase().clean() + '"])', list).parent().css('display', 'none');
                $('td.snippet[data-search*="' + $(this).val().toString().toLowerCase().clean() + '"]', list).parent().css('display', '')
            } else {
                $('td.snippet[data-search]', list).parent().css('display', '')
            }
        });

        $('thead th input').on('click', function (e) {
            e.stopPropagation();
            $(this).focus();
        });

        $('.tablesorter').fixedTable();
    };

    behat.definitions.deinit = function () {
        $(document).delegate('#search', 'keyup');
    };

    behat.definitions.filter = function () {

    }
})(window.jQuery);
