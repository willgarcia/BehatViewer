(function ($) {
    if (!window.behat) {
        window.behat = {}
    }

    var defaults = {};

    behat.config = {
        settings:{}
    };

    behat.config.init = function (options) {
        this.settings = $.extend({}, defaults, options);

        window.prettyPrint && prettyPrint();

        $(document).delegate('#Project_name', 'keyup', behat.config.slugify);
        $(document).delegate('#Project_name', 'change', behat.config.slugify);
        $(document).delegate('#Project_slug', 'change', behat.config.slugify);

        $(document).delegate('#configuration', 'submit', function (e) {
            e.preventDefault();

            $.ajax({
                url:$(e.target).attr('action'),
                type:'POST',
                data:$(e.target).serialize(),
                success:function () {
                    behat.application.notifier.notify('success', 'Settings were successfully saved.');

                    $('.alert.alert-block.alert-info').fadeOut(function () {
                        $('.alert.alert-block.alert-info').remove()
                    });
                    $('#project').text('[' + $('#Project_name').val() + ']');
                },
                error:function () {
                    behat.application.notifier.notify('error', 'An error occured while saving settings.');
                }
            })
        })
    };

    behat.config.slugify = function () {
        $('#Project_slug').val(behat.config.fixSlug($(this).val()))
    };

    behat.config.deinit = function () {
        $(document).undelegate('#Project_name', 'keyup');
        $(document).undelegate('#Project_name', 'change');
        $(document).undelegate('#Project_slug', 'change')
    };

    behat.config.fixSlug = function (text) {
        return text.slugify();
    }
})(window.jQuery);

