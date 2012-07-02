var ProfileController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/NavigationController'],
    function () {
        ProfileController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'ProfileController';

            this.actions = ['submit'];
        };

        ProfileController.prototype = new NavigationController();
        ProfileController.prototype.constructor = ProfileController;

        ProfileController.prototype.init = function () {
            NavigationController.prototype.init.call(this);

            return this;
        };

        ProfileController.prototype.submitAction = function (elem, e) {
            e.preventDefault();

            this.navigate(
                $(elem).parents('form').attr('action'),
                'html',
                'POST',
                $(elem).parents('form').serialize()
            );
        };
    }
  );
}(jQuery));