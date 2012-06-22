var BuildController;

(function ($) {
  "use strict";

  JSC.require(
    ['NavigationController'],
    function () {
        BuildController = function (master) {
            NavigationController.call(this, master);

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

            $('tbody [type=checkbox]').each(function() {
                $(this).attr('checked', !$(this).attr('checked'));
            });

            $('.tablesorter').fixedTable();
        }

        var c = new BuildController('#container')
        app.controller.current(c);

        $(window).on('loadComplete', function () { c.complete(); $(window).off('loadComplete', this); });
    }
  );
}(jQuery));