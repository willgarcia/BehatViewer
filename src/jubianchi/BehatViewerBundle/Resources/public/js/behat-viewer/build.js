var BuildController;

(function ($) {
  "use strict";

  JSC.require(
    ['jsc/NavigationController', 'moment'],
    function () {
        BuildController = function (master) {
            NavigationController.call(this, master);

            this.cls = 'BuildController';

            this.actions = ['navig', 'delete', 'delselected'];
        };

        BuildController.prototype = new NavigationController();
        BuildController.prototype.constructor = BuildController;

        BuildController.prototype.init = function () {
            NavigationController.prototype.init.call(this);

            return this;
        };

        BuildController.prototype.deinit = function () {
            NavigationController.prototype.deinit.call(this);

            $(document).undelegate('thead [type=checkbox]', 'click');

            return this;
        };

        BuildController.prototype.navigAction = function (elem, e) {
            app.controller.navigationAction(elem, e)
        };

        BuildController.prototype.deleteAction = function (e) {
            e.preventDefault();

            var target = $(e.target);

            $.get(
                target.attr('href'),
                function () {
                    target.parents('tr').fadeOut(500, function () {
                        $(this).remove()
                    });
                }
            )
        };

        BuildController.prototype.delselectedAction = function (e) {
            e.preventDefault();

            var target = $(e.target);

            $.ajax({
                type: 'POST',
                url: target.attr('href'),
                data: $(':checked').serialize(),
                success: function () {
                    $(':checked').parents('tr').fadeOut(500, function () {
                        $(this).remove()
                    })
                }
            });
        };

        BuildController.prototype.complete = function () {
            NavigationController.prototype.complete.call(this);

            if ($.fn.tablesorter) {
                $('.tablesorter').tablesorter({
                    textExtraction:{
                        4:function (node, table, cellIndex) {
                            return $(node).attr('data-value');
                        },
                        5:function (node, table, cellIndex) {
                            return $(node).attr('data-value');
                        }
                    }
                });
            }

            $(document).delegate('thead [type=checkbox]', 'click', function() {
                $('tbody [type=checkbox]').each(function() {
                    $(this).attr('checked', !$(this).attr('checked'));
                });
            });

            $('.tablesorter').fixedTable();

            $('[rel="moment"]').each(function() {
                var text = $(this).text().trim();
                $(this).html(
                    moment(text, "YYYY-MM-DD h:mm:ss").fromNow() + ' <small>(' + text + ')</small>'
                );
            });
        }
    }
  );
}(jQuery));