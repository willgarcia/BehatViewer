var Navbar, Toolbar, MainController, BehatViewer, app;

(function ($) {
  "use strict";

  String.prototype.clean = function () {
      var r = this.replace(new RegExp(/[àáâãäå]/g), "a");
      r = r.replace(new RegExp(/æ/g), "ae");
      r = r.replace(new RegExp(/ç/g), "c");
      r = r.replace(new RegExp(/[èéêë]/g), "e");
      r = r.replace(new RegExp(/[ìíîï]/g), "i");
      r = r.replace(new RegExp(/ñ/g), "n");
      r = r.replace(new RegExp(/[òóôõö]/g), "o");
      r = r.replace(new RegExp(/œ/g), "oe");
      r = r.replace(new RegExp(/[ùúûü]/g), "u");
      r = r.replace(new RegExp(/[ýÿ]/g), "y");

      return r;
  };

  String.prototype.slugify = function () {
      var r = this.clean();
      r = r.replace(/[^-a-zA-Z0-9,&\s]+/ig, '');
      r = r.replace(/\s/gi, "-");
      r = r.replace(/-{2,}/gi, '-');
      r = r.replace(/^-+/gi, '');
      r = r.replace(/-+$/gi, '');

      return r.toLowerCase();
  };

  $(function () {
    JSC
      .require(
        ['Toolbar'],
        function () {
          Navbar = function (master, controller) {
            Toolbar.call(this, master, controller);

            var self = this;
            this.controller.on('navigate', function (e) {
              self.setActiveItem(self.getItemByHref(e.href));
            });
          };

          Navbar.prototype = new Toolbar();
          Navbar.prototype.constructor = Navbar;

          Navbar.prototype.getItemByHref = function (href) {
            return $('[href=\'' + href + '\']', this.master);
          };

          Navbar.prototype.setActiveItem = function (item) {
            $(item).parent().addClass('active');
          };

          Navbar.prototype.menuAction = function (elem, e) {
            $('.active', this.master).removeClass('active');

            Toolbar.prototype.menuAction.call(this, elem, e);
          };
        }
      )
      .require(
        ['NavigationController'],
        function () {
          MainController = function (master) {
            NavigationController.call(this, master);
          };

          MainController.prototype = new NavigationController();
          MainController.prototype.constructor = MainController;
        }
      )
      .require(
        ['Application'],
        function () {
          BehatViewer = function (master) {
            Application.call(this, master, Routing.generate('behatviewer.homepage'), new MainController('#container'));

            this.toolbar = new Navbar('#toolbar', this.controller).init();
          };

          BehatViewer.prototype = new Application();
          BehatViewer.prototype.constructor = BehatViewer;

          app = new BehatViewer('#application').init();
        }
      )
      .require(['controller/home']);
  });
}(jQuery));