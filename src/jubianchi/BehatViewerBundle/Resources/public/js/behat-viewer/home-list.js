var HomeListController;

(function ($) {
  "use strict";

  JSC.require(
    ['behat-viewer/home'],
    function () {
        HomeListController = function (master) {
            HomeController.call(this, master);

            this.cls = 'HomeListController';
        };

        HomeListController.prototype = new HomeController();
        HomeListController.prototype.constructor = HomeListController;

        HomeListController.prototype.init = function () {
            Controller.prototype.init.call(this);

          return this;
        };

        HomeListController.prototype.complete = function () {
            HomeController.prototype.complete.call(this);

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
    }
  );
}(jQuery));