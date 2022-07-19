import "./bootstrap";
'use strict';

$(document).ready(function () {
    // menu
    menuDropdown(); // footer

    getCurrentYear();
});
/**
 * Display currect year for footer
 */

function getCurrentYear() {
    $('#footer_year').text(new Date().getFullYear());
}

function menuDropdown() {
    $('.icon.profile a').mouseover(function (e) {
        e.preventDefault();
        $('.profile_dropdown').stop().fadeIn(300);
    });
    $('.icon.profile a').mouseleave(function (e) {
        e.preventDefault();
        $('.profile_dropdown').stop().fadeOut(300);
    });
}