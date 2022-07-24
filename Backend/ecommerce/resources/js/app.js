import $ from 'jquery';
import "./bootstrap";
import 'slick-carousel';
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

'use strict';

$(document).ready(function() {
    // menu
    menuDropdown();
    // footer
    getCurrentYear();
    // home
    homeBannerSlider();
    homeFeaturedSlider();
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
    $('.icon.profile a, .profile_dropdown').mouseover(function(e) {
        e.preventDefault();
        $('.profile_dropdown').stop().fadeIn(200);
    });

    $('.icon.profile a, .profile_dropdown').mouseleave(function(e) {
        e.preventDefault();
        $('.profile_dropdown').stop().fadeOut(200);
    });

    $('nav ul li a, .nav_dropdown').mouseover(function(e) {
        e.preventDefault();
        $('.nav_dropdown').stop().fadeIn(200);
    });

    $('nav ul li a, .nav_dropdown').mouseleave(function(e) {
        e.preventDefault();
        $('.nav_dropdown').stop().fadeOut(200);
    });
}

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

function homeFeaturedSlider() {
    $('.featured_slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        centerMode: true,
        focusOnSelect: true,
        lazyLoad: 'ondemand',
      });
}