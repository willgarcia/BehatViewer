var MomentController;

(function ($, _) {
	"use strict";

    _.require(
        ['moment', 'jsc/Controller'],
        function () {
            MomentController = function (master) {
                this.cls = 'MomentController';
            };

            MomentController.prototype = new Controller();
            MomentController.prototype.constructor = new MomentController();

            MomentController.prototype.complete = function (format) {
                _.log(this.toString() + ' successfully loaded');

                $('[data-rel="moment"]').each(function() {
                    var date = $(this).text().trim(),
                        text = '';

                    if(typeof format != 'undefined' && date != '') {
                        text = format.replace('%s', date);
                    }

                    $(this).html(
                        moment(date, "YYYY-MM-DD h:mm:ss").fromNow() + text
                    );
                });

                return this;
            };
        }
    );
}(jQuery, JSC));