;(function($) {
    $.fn.extend({
        fixedTable: function() {
            return this.each(function() {
                var $window = $(window),
                    header,
                    offset,

                    fix = function ($e, callback) {
                        $e.addClass('fixed').data('fixed', true);
                        size($e);

                        if (!!callback) callback($e);
                    },

                    unfix = function ($e, callback) {
                        $e.removeClass('fixed').data('fixed', false);

                        if (!!callback) callback($e);
                    },

                    position = function ($e) {
                        if($e.length) {
                            $e.css({
                                'padding-left':$e.parent('table').position().left
                            });
                        }
                    },

                    size = function ($e) {
                        if($e.length) {
                            $('tr:first-child th', $e).each(function (index) {
                                $(this).css('width', $('tbody tr:visible:eq(1) td:eq(' + index + ')', $e.parent('table')).width());
                            });
                        }
                    },

                    scroll = function ($e, $w, offset) {
                        var scrollTop = $w.scrollTop(),
                            fixed = !!$e.data('fixed');

                        if (scrollTop >= offset) {
                            fix(
                                $e,
                                function () {
                                    position($e)
                                }
                            );
                        } else {
                            unfix(
                                $e,
                                function () {
                                    $('tr:first-child th', $e).each(function (index) {
                                        $(this).css('width', '')
                                    })
                                }
                            );
                        }
                    },

                    processScroll = function () {
                        if(header) scroll(header, $window, offset);
                    };

              $window.on('scroll', processScroll);
              $window.on('resize', processScroll);

              header = $('thead', $(this));

              if(header) {
                offset = header.length && header.offset().top;
                processScroll();
              }
          });
        }
    });
}(jQuery));