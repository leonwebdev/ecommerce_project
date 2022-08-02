import $ from 'jquery';
import "./bootstrap";
import 'slick-carousel';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

'use strict';

$(document).ready(function () {
    // menu
    menuDropdown();
    // footer
    getCurrentYear();
    // home
    homeBannerSlider();
    homeFeaturedSlider();

    // product detail
    productImageSlider();

    // checkout
    checkoutAddrEffect();
});

/**
 * Display currect year for footer
 */
function getCurrentYear() {
    $('#footer_year').text(new Date().getFullYear());
}

/**
 * Menu animation control
 */
function menuDropdown() {
    $('.icon.profile a, .profile_dropdown').mouseover(function (e) {
        e.preventDefault();
        $('.profile_dropdown').stop().fadeIn(200);
    });

    $('.icon.profile a, .profile_dropdown').mouseleave(function (e) {
        e.preventDefault();
        $('.profile_dropdown').stop().fadeOut(200);
    });

    $('nav ul li a, .nav_dropdown').mouseover(function (e) {
        e.preventDefault();
        $('.nav_dropdown').stop().fadeIn(200);
    });

    $('nav ul li a, .nav_dropdown').mouseleave(function (e) {
        e.preventDefault();
        $('.nav_dropdown').stop().fadeOut(200);
    });
}

/**
 * Home page banner slider animation control
 */
function homeBannerSlider() {
    $('.home .banner').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear',
        draggable: true
    });
}

/**
 * Home page featured products slider animation control
 */
function homeFeaturedSlider() {
    $('.featured_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        centerMode: true,
        focusOnSelect: true,
        lazyLoad: 'ondemand',
    });

    // add class name to the first tabs item when page loaded
    $('.featured .tabs ul li:first').addClass('active');
    $('.featured .content .row:first').addClass('show');

    $('.featured .tabs ul li').each(function (tabIdx) {

        $(this).click(function (e) {
            e.preventDefault();
            // add class to selected tab
            $('.featured .tabs ul li').removeClass('active');
            $(this).addClass('active');
            $('.featured .content .row').removeClass('show');
            // add class to selected slider
            $('.featured .content .row').each(function (itemIdx) {
                var item = $(this);
                if (tabIdx == itemIdx) {
                    item.addClass('show');
                }
            });
        });
    });
}


/**
 * Product Detail page product images
 */
function productImageSlider() {
    $('.product-media-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.product-media-slider-nav'
    });
    $('.product-media-slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.product-media-slider',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: false,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: false,

                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: false,

                }
            }
        ]
    });
}

/**
 * Checkout page shipping address information effects 
 */
function checkoutAddrEffect() {
    $('.cart #select_addr_btn').click(function (e) {
        e.preventDefault();
        $('.cart .address_list').slideDown();
    });

    $('.cart #create_addr_btn').click(function (e) {
        e.preventDefault();
        $('.cart .address_list').slideUp();
        $('.cart .address_form').slideDown();
    });
}