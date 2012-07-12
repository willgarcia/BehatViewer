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

                        var self = this;
                    };

                    Navbar.prototype = new Toolbar();
                    Navbar.prototype.constructor = Navbar;

                    Navbar.prototype.init = function () {
                        Toolbar.prototype.init.call(this);

                        return this;
                    }

                    Navbar.prototype.getItemByHref = function (href) {
                        return $('[href=\'' + href + '\']', this.master);
                    };

                    Navbar.prototype.setActiveItem = function (item) {
                        $(item).parent().addClass('active');
                    };

                    Navbar.prototype.setTitle = function(title) {
                        $('.title', this.master).text(title);
                    };

                    Navbar.prototype.refresh = function() {
                        if(app.user) {
                            $('[data-rel=login]').hide();
                            $('[data-rel=usermenu]').show();
                        } else {
                            $('[data-rel=login]').show();
                            $('[data-rel=usermenu]').hide();
                        }
                    };
                }
            )
            .require(
                ['jsc/NavigationController'],
                function () {
                    MainController = function (master) {
                        NavigationController.call(this, master);
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

                        this.toolbar = new Navbar('#toolbar', this.controller).init();
                        this.user = null;
                    };

                    BehatViewer.prototype = new Application();
                    BehatViewer.prototype.constructor = BehatViewer;

                    BehatViewer.prototype.setUser = function(user) {
                        this.user = $.extend(
                            {
                                username: null,
                                email: null
                            },
                            user
                        );

                        user = this.user;
                        $('[data-rel*=username]').text(this.user.username);
                        $('[data-rel*=avatar]').each(function() {
                            $(this).attr(
                                'src',
                                Routing.generate(
                                    'behatviewer.profileavatar',
                                    {
                                        email: user.email,
                                        size: $(this).attr('data-size')
                                    }
                                )
                            );
                        });

                        this.toolbar.refresh();
                    };

                    BehatViewer.prototype.complete = function () {
                        Controller.prototype.complete.call(this);

                        $('[data-rel="notification"]').each(function() {
                            app.notifier.notify($(this).html(), $(this).attr('data-type'));
                            $(this).remove();
                        });

                        return this;
                    };

                    app = new BehatViewer('#application').init();
                }
            )
            .require(['behat-viewer/home'])
        ;
    });
}(jQuery));