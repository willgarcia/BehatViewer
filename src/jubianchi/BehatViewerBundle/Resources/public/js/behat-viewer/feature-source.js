var FeatureSourceController;

(function ($) {
  "use strict";

  JSC.require(
    ['prettify', 'prettify.feature', 'behat-viewer/feature'],
    function () {
        FeatureSourceController = function (master) {
            FeatureController.call(this, master);

            this.cls = 'FeatureSourceController';
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
    }
  );
}(jQuery));