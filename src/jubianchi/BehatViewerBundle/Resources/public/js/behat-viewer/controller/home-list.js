var HomeListController;

(function ($) {
  "use strict";

  JSC.require(
    ['controller/home'],
    function () {
        HomeListController = function (master) {
            HomeController.call(this, master);
        };

        HomeListController.prototype = new HomeController();
        HomeListController.prototype.constructor = HomeListController;

        HomeListController.prototype.init = function () {
          NavigationController.prototype.init.call(this);

          return this;
        };

        HomeController.prototype.complete = function () {
            if ($.fn.tablesorter) {
                $('.tablesorter').tablesorter({
                    textExtraction:{
                        2:function (node, table, cellIndex) {
                            return $(node).attr('data-value');
                        },
                        3:function (node, table, cellIndex) {
                            return $(node).attr('data-value');
                        }
                    }
                });
            }

            $('.tablesorter').fixedTable();
        };

        var c = new HomeListController('#container');
        app.controller.current(c);
        $(window).on('loadComplete', function () { c.complete(); $(window).off('loadComplete', this); });
    }
  );
}(jQuery));