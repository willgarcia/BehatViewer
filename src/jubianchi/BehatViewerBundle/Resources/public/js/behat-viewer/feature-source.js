var FeatureSourceController;

(function ($) {
  "use strict";

  JSC.require(
    ['behat-viewer/feature'],
    function () {
        FeatureSourceController = function (master) {
            FeatureController.call(this, master);

            this.cls = 'FeatureSourceController';
        };

        FeatureSourceController.prototype = new FeatureController();
        FeatureSourceController.prototype.constructor = FeatureSourceController;
    }
  );
}(jQuery));