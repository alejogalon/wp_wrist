(function(window, document, $) {
    'use strict';
    var D = $(document),
        W = $(window);

    D.ready(function() {
        var nav = $('.navbar-home');
        var body = $('body');

        $(window).scroll(function () {
            if ($(this).scrollTop() > 62) {
                body.addClass("body-fixed-nav");
                nav.addClass("navbar-fixed-top");
            } else {
                body.removeClass("body-fixed-nav");
                nav.removeClass("navbar-fixed-top");
            }
        });

        $(".navbar-menu-toggle").click(function() {
            $(this).toggleClass("active");
            $('body').toggleClass("cbp-spmenu-push-toleft");
            $('.mobile-nav').toggleClass("cbp-spmenu-open");
        });

        $(".close-menu").click(function() {
            $('.navbar-menu-toggle').removeClass("active");
            $('body').removeClass("cbp-spmenu-push-toleft");
            $('.mobile-nav').removeClass("cbp-spmenu-open");
        });

        $('[data-toggle="tooltip"]').tooltip();

        $('#options1').hover(
            function(){ $(this).closest('.checkbox').addClass('hover1'); },
            function(){ $(this).closest('.checkbox').removeClass('hover1'); }
        );
        $('#options2').hover(
            function(){ $(this).closest('.checkbox').addClass('hover1'); },
            function(){ $(this).closest('.checkbox').removeClass('hover1'); }
        );
        $('#options3').hover(
            function(){ $(this).closest('.checkbox').addClass('hover1'); },
            function(){ $(this).closest('.checkbox').removeClass('hover1'); }
        );
        $('#options4').hover(
            function(){ $(this).closest('.checkbox').addClass('hover1'); },
            function(){ $(this).closest('.checkbox').removeClass('hover1'); }
        );
        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 6,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]

        });

    });


    W.load(function() { // makes sure the whole site is loaded
        $('body').addClass('is__in');
    });

    // Dropdown toggle
    //$('#menu-mobile .menu-toggle').on('click', function(){
    //    $(this).closest('li').find('.dropdown-menu').toggle();
    //});
    //
    //$(document).click(function(e) {
    //    var target = e.target;
    //    if (!$(target).is('.menu-toggle') && !$(target).parents().is('.menu-toggle')) {
    //        $('.dropdown-menu').hide();
    //    }
    //});

})(window, document, jQuery);
