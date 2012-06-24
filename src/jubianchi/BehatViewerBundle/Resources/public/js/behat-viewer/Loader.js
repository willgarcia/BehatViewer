var Loader;

(function ($) {
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

    Loader = function(options) {
        this.settings = $.extend({}, defaults, options);

        this.loader = $(this.settings.loader);
        this.container = $(this.settings.loader).parent();
        this.spinner = new Spinner(this.settings.spin).spin(this.loader.get(0));
        this.visible = false;
        this.hide();

        var self = this;
        $(document).ajaxStart(function () {
            self.show();
        });

        $(document).ajaxStop(function () {
            self.hide();
        });
    };

    Loader.prototype = new Object();
    Loader.prototype.constructor = Loader;

    Loader.prototype.hide = function () {
        this.loader.remove();
        this.visible = false;
    };

    Loader.prototype.show = function () {
        this.container.append(this.loader);
        this.visible = true;
    };
}(jQuery));