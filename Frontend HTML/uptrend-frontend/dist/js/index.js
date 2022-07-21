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
  $('.icon.profile a, .profile_dropdown').mouseover(function (e) {
    e.preventDefault();
    $('.profile_dropdown').stop().fadeIn(100);
  });
  $('.icon.profile a, .profile_dropdown').mouseleave(function (e) {
    e.preventDefault();
    $('.profile_dropdown').stop().fadeOut(300);
  });
  $('nav ul li a, .nav_dropdown').mouseover(function (e) {
    e.preventDefault();
    $('.nav_dropdown').stop().fadeIn(100);
  });
  $('nav ul li a, .nav_dropdown').mouseleave(function (e) {
    e.preventDefault();
    $('.nav_dropdown').stop().fadeOut(300);
  });
}