(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as anonymous module.
        define(['jquery'], factory);
    } else {
        // Browser globals.
        factory(jQuery);
    }
}(function ($) {
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top -40
                }, 1000);
                return false;
            }
        }
    });
}));

jQuery(function($) {

    var prev = 0;
    var $window = $(window);
    var nav = $('.header');

    $window.on('scroll', function(){
        var scrollTop = $window.scrollTop();

        if (scrollTop >= 140 && scrollTop < prev) {
            setTimeout(function(){
                nav.addClass('hidden--secondary');
            }, 100);

        }

        prev = scrollTop;
    });

});