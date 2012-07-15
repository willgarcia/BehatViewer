var BuildController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/NavigationController', 'jsc/MomentController'],
    function () {
        BuildController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'BuildController';
        };

        BuildController.prototype = new NavigationController();
        BuildController.prototype.constructor = BuildController;

        BuildController.prototype.complete = function () {
            NavigationController.prototype.complete.call(this);
            MomentController.prototype.complete.call(this, ' <small>(%s)</small>');

            if ($.fn.tablesorter) {
                $('.tablesorter').tablesorter({
                    textExtraction:{
                        4: function (node) {
                            return $(node).attr('data-value');
                        },
                        5: function (node) {
                            return $(node).attr('data-value');
                        }
                    }
                });
            }

            $(document).delegate('thead [type=checkbox]', 'click', function(e) {
                $('tbody [type=checkbox]').each(function() {
                    $(this).attr('checked', !$(this).attr('checked'));
                });
            });

            $('.tablesorter').fixedTable();
        }
    }
  );
}(jQuery));