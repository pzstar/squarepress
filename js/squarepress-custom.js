/**
 * SquareOne Custom JS
 *
 * @package SquarePress
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */

jQuery(function ($) {

    $('#sq-bx-slider').bxSlider({
        'pager': false,
        'auto': true,
        'mode': 'fade',
        'pause': 5000,
        'prevText': '<i class="fa fa-angle-left"></i>',
        'nextText': '<i class="fa fa-angle-right"></i>',
        'adaptiveHeight': true
    });

    $('.sq-testimonial-slider').bxSlider({
        'pager': true,
        'auto': true,
        'pause': 8000,
        'adaptiveHeight': true,
        'controls': false
    });

    $(".sq_client_logo_slider").owlCarousel({
        autoPlay: 4000,
        items: 5,
        itemsTablet: [768, 3],
        itemsMobile: [479, 2],
        pagination: false
    });

    $(".sq-tab-pane:first").show();
    $(".sq-tab li:first").addClass('sq-active');

    $(".sq-tab li a").click(function () {
        var tab = $(this).attr('href');
        $(".sq-tab li").removeClass('sq-active');
        $(this).parent('li').addClass('sq-active');
        $(".sq-tab-pane").hide();
        $(tab).show();
        return false;
    });

    $('.sq-menu > ul').superfish({
        delay: 500,
        animation: {opacity: 'show', height: 'show'},
        speed: 'fast'
    });

    $('.sq-toggle-nav').click(function () {
        $('#sq-site-navigation').slideToggle();
    });

});

