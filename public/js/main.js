$(window).on('load', function() {
    /*------------------
        Preloder
    --------------------*/
    $(".loader").fadeOut();
    $("#preloder").delay(400).fadeOut("slow");

});

$(document).ready(function() {

    // Back to top
    var btn = $('#button');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '400');
    });


    AOS.init({
        duration: 800,
        easing: 'slide',
        once: true
    });

    $('.product-slider').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        margin : 30,
        autoplay: true,
        navText:
            ['<i class="flaticon-left-arrow left" style="font-size: 40px;"></i>',
            '<i class="right flaticon-right-arrow" style="font-size: 40px"></i>'],

        responsive : {
            0 : {
                items: 1,
            },
            480 : {
                items: 2,
            },
            768 : {
                items: 3,
            },
            1200 : {
                items: 4,
            }
        }
    });

    /*------------------
		Accordions
	--------------------*/
    $('.panel-link').on('click', function (e) {
        $('.panel-link').removeClass('active');
        var $this = $(this);
        if (!$this.hasClass('active')) {
            $this.addClass('active');
        }
        e.preventDefault();
    });

});
