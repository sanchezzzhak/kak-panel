(function($){
    if(typeof $.fn.slimScroll !== 'undefined') {
        $.each($('.slimScrollPanel'), function(k,item) {
            $(item).find('.panel-body').slimScroll({
                height: $(item).data('height') +'px'
            });

        });
    }
})(jQuery);