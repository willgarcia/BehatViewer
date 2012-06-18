(function ($) {
    if (!window.behat) {
        window.behat = {};
    }

    behat.helper = {
        clean:function (s) {
            var r = s.replace(new RegExp(/[àáâãäå]/g), "a");
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
        },
        slugify:function slugify(text) {
            text = text.clean();
            text = text.replace(/[^-a-zA-Z0-9,&\s]+/ig, '');
            text = text.replace(/\s/gi, "-");
            text = text.replace(/-{2,}/gi, '-');
            text = text.replace(/^-+/gi, '');
            text = text.replace(/-+$/gi, '');

            return text.toLowerCase();
        }
    };

    String.prototype.slugify = function () {
        return behat.helper.slugify(this);
    };

    String.prototype.clean = function () {
        return behat.helper.clean(this);
    };
})(window.jQuery);