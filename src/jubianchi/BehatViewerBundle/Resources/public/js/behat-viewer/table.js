var TableController;

(function ($, JSC) {
  "use strict";

  JSC.require(
    ['jquery.tablesorter', 'jquery.metadata', 'jsc/Controller'],
    function () {
        TableController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'DefinitionsController';
        };

        TableController.prototype = new Controller();
        TableController.prototype.constructor = TableController;

        TableController.prototype.complete = function () {
            if ($.fn.tablesorter) {
                $('.tablesorter').tablesorter();
            }

            $('.tablesorter').fixedTable();
        };
    }
  );
}(window.jQuery, window.JSC));