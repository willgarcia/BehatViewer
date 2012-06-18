(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

    var defaults = {
        loader:'#loader',
        spin:{
            lines:7,
            length:5,
            width:5,
            radius:5,
            color:'#fff',
            speed:1.2,
            trail:30,
            shadow:true,
            hwaccel:true,
            zIndex:0,
            top:'0px',
            left:'0px',
            className:'spinner'
        }
    };

    behat.loader = {
        settings:{},
        loader:null,
        spinner:null,
        container:null,
        visible:false
    };

    behat.loader.init = function (options) {
        this.settings = $.extend({}, defaults, options);

        this.loader = $(this.settings.loader);
        this.container = $(this.settings.loader).parent();
        this.spinner = new Spinner(this.settings.spin).spin(this.loader.get(0));
        this.hide();

        $(document).ajaxStart(function () {
            behat.loader.show();
        });

        $(document).ajaxStop(function () {
            behat.loader.hide();
        });
    };

    behat.loader.hide = function () {
        this.loader.remove();
        this.visible = false;
    };

    behat.loader.show = function () {
        this.container.append(this.loader);
        this.visible = true;
    }
})(window.jQuery);