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
                ['jsc/Toolbar'],
                function () {
                    Navbar = function (master, controller) {
                        Toolbar.call(this, master, controller);

                        this.cls = 'NavBar';
                    };

                    Navbar.prototype = new Toolbar();
                    Navbar.prototype.constructor = Navbar;
                }
            )
            .require(
                ['jsc/NavigationController'],
                function () {
                    MainController = function (master) {
                        NavigationController.call(this, master);

                        this.cls = 'MainController';
                    };

                    MainController.prototype = new NavigationController();
                    MainController.prototype.constructor = MainController;
                }
            )
            .require(
                ['jsc/Application'],
                function () {
                    BehatViewer = function (master) {
                        Application.call(this, master, Routing.generate('behatviewer.homepage'), new MainController('#container'));

                        this.cls = 'BehatViewer';
                        this.toolbar = new Navbar('#toolbar', this.controller).init();
                        this.user = null;
                    };

                    BehatViewer.prototype = new Application();
                    BehatViewer.prototype.constructor = BehatViewer;

                    BehatViewer.prototype.complete = function () {
                        Controller.prototype.complete.call(this);

                        $('[data-rel="notification"]').each(function() {
                            app.notifier.notify($(this).html(), $(this).attr('data-type'));
                            $(this).remove();
                        });

                        $('#last-build').click(function() {
                            document.location.href = $(this).attr('href');
                        })

                        return this;
                    };

                    app = new BehatViewer('#application').init();
                }
            )
        ;
    });
}(jQuery));