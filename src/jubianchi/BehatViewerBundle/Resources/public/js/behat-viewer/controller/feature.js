var FeatureController;

(function ($) {
  "use strict";

  JSC.require(
    ['NavigationController'],
    function () {
        FeatureController = function (master) {
          NavigationController.call(this, master);

          this.actions = ['snippet', 'screenshot', 'switch', 'navig'];
        };

        FeatureController.prototype = new NavigationController();
        FeatureController.prototype.constructor = FeatureController;

        FeatureController.prototype.init = function () {
          NavigationController.prototype.init.call(this);

          return this;
        };

        FeatureController.prototype.switchAction = function (elem, e) {
            app.controller.navigationAction(elem, e)
        };

        FeatureController.prototype.navigAction = function (elem, e) {
            app.controller.navigationAction(elem, e)
        };

        FeatureController.prototype.snippetAction = function (elem, e) {
            $('#' + $(e.target).attr('data-toggle')).toggle()
        };

        FeatureController.prototype.screenshotAction = function (elem, e) {
            e.preventDefault();

            var p = $(e.target).attr('data-toggle').split('-'),
                id = p[1],
                t = function() { $('#' + $(e.target).attr('data-toggle')).toggle(); };

            if(!$('#' + $(e.target).attr('data-toggle')).find('img').length) {
                $.get(
                    Routing.generate('behatviewer.screenshot', {"id": id}),
                    function(data) {
                        $('#' + $(e.target).attr('data-toggle')).append('<img src="' + data + '" style="width: 70%" />');
                        t();
                    }
                );
            } else {
                t();
            }
        }
    }
  );
}(jQuery));