(function(root, factory) {
    // CommonJS support
    if (typeof exports === 'object') {
        module.exports = factory();
    }
    // AMD
    else if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    }
    // Browser globals
    else {
        factory(root.jQuery);
    }
}(this, function($) {
    'use strict';

    // **********************************
    // Constructor
    // **********************************

    var isSlimPanel = typeof $.fn.slimScroll !== 'undefined';

    var kakPanel = function(element, options) {
        this.$parent = $(element)

        if (isSlimPanel){
            this.$parent.find('.slimScrollPanel').slimScroll({
               // height: $(item).data('height') + 'px'
            });
        }
    };

    kakPanel.prototype = {
        constructor: kakPanel
    };

    $.fn.kakPanel = function(option) {
        var options = typeof option == 'object' && option;
        new kakPanel(this, options);
        return this;
    };
    $.fn.kakPanel.Constructor = kakPanel;

    // auto init
    $('.kak-panel').each(function(k,i){
        $(i).kakPanel();
    });

}));


/*
(function($){
    if(typeof $.fn.slimScroll !== 'undefined') {
        $.each($('.slimScrollPanel'), function(k,item) {
            $(item).find('.panel-body').slimScroll({
                height: $(item).data('height') +'px'
            });

        });
    }
})(jQuery);*/