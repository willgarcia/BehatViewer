var FeatureSourceController;

(function ($) {
  "use strict";

  JSC.require(
    ['controller/feature'],
    function () {
        FeatureSourceController = function (master) {
            FeatureController.call(this, master);
        };

        FeatureSourceController.prototype = new FeatureController();
        FeatureSourceController.prototype.constructor = FeatureSourceController;

        FeatureSourceController.prototype.init = function () {
          FeatureController.prototype.init.call(this);

            return this;
        };

        FeatureSourceController.prototype.complete = function () {
            window.prettyPrint();
        };

        var c = new FeatureSourceController('#container');
        app.controller.current(c);
        $(window).on('loadComplete', function () { c.complete(); $(window).off('loadComplete', this); });
    }
  );
}(jQuery));