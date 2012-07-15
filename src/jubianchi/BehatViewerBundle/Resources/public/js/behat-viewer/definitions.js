var DefinitionsController;

(function ($, JSC) {
  "use strict";

  JSC.require(
    ['jquery.chosen', 'jsc/NavigationController'],
    function () {
        DefinitionsController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'DefinitionsController';
        };

        DefinitionsController.prototype = new NavigationController();
        DefinitionsController.prototype.constructor = DefinitionsController;

        DefinitionsController.prototype.complete = function () {
            if ($.fn.tablesorter) {
                $('.tablesorter').tablesorter();
            }

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
                    $('.table tr').css('display', '');
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
                var list = $('.table');

                if ($(this).val()) {
                    $('td.snippet:not([data-search*="' + $(this).val().toString().toLowerCase().clean() + '"])', list).parent().css('display', 'none');
                    $('td.snippet[data-search*="' + $(this).val().toString().toLowerCase().clean() + '"]', list).parent().css('display', '')
                } else {
                    $('td.snippet[data-search]', list).parent().css('display', '')
                }
            });

            $('.tablesorter').fixedTable();
        };
    }
  );
}(window.jQuery, window.JSC));