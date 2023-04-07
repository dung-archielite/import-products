/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/customizer.js ***!
  \************************************/
(function () {
  "use strict";

  /**
   * ------------------------------------------------------------------------
   *   Only for demo purpose
   * ------------------------------------------------------------------------
   */

  // Demo Theme skin (Customizer)
  // load dark mode from local Storage
  if (localStorage.theme === 'dark' || !('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    document.querySelector("html").classList.add('dark');
    document.querySelector("#lightdark").checked = true;
  }
  var myLightdark = function myLightdark() {
    var lightdark = document.querySelector("#lightdark");
    if (lightdark != null) {
      lightdark.addEventListener("click", function () {
        var result = document.querySelector("html").classList.toggle("dark");
        if (result) {
          localStorage.setItem("theme", "dark");
        } else {
          localStorage.setItem("theme", "");
        }
      });
    }
  };

  // Sidebar Light and Dark (Customizer)
  var mySidelight = function mySidelight() {
    var sidecolor = document.querySelector("#sidecolor");
    if (sidecolor != null) {
      sidecolor.addEventListener("click", function () {
        document.querySelector("#sidebar-menu").classList.toggle("sidebar-dark");
      });
    }
  };

  // Custom primary color (Customizer)
  var myColor = function myColor() {
    var mycolor = document.querySelector("#customcolor");
    if (mycolor != null) {
      var myindigo = document.querySelector("#custindigo");
      var myred = document.querySelector("#custred");
      var mygreen = document.querySelector("#custgreen");
      var mypurple = document.querySelector("#custpurple");
      var myyellow = document.querySelector("#custyellow");
      var myblue = document.querySelector("#custblue");
      var mypink = document.querySelector("#custpink");
      var bod = document.querySelector('body');
      myindigo.addEventListener("click", function () {
        bod.classList.remove('theme-red', 'theme-yellow', 'theme-purple', 'theme-green', 'theme-blue', 'theme-pink');
      });
      myred.addEventListener("click", function () {
        bod.classList.add('theme-red');
        bod.classList.remove('theme-blue', 'theme-yellow', 'theme-purple', 'theme-green', 'theme-indigo', 'theme-pink');
      });
      mygreen.addEventListener("click", function () {
        bod.classList.add('theme-green');
        bod.classList.remove('theme-red', 'theme-yellow', 'theme-purple', 'theme-blue', 'theme-indigo', 'theme-pink');
      });
      mypurple.addEventListener("click", function () {
        bod.classList.add('theme-purple');
        bod.classList.remove('theme-red', 'theme-yellow', 'theme-blue', 'theme-green', 'theme-indigo', 'theme-pink');
      });
      myyellow.addEventListener("click", function () {
        bod.classList.add('theme-yellow');
        bod.classList.remove('theme-red', 'theme-blue', 'theme-purple', 'theme-green', 'theme-indigo', 'theme-pink');
      });
      myblue.addEventListener("click", function () {
        bod.classList.add('theme-blue');
        bod.classList.remove('theme-red', 'theme-yellow', 'theme-purple', 'theme-green', 'theme-indigo', 'theme-pink');
      });
      mypink.addEventListener("click", function () {
        bod.classList.add('theme-pink');
        bod.classList.remove('theme-red', 'theme-yellow', 'theme-purple', 'theme-green', 'theme-indigo', 'theme-blue');
      });
    }
  };

  // Switch RTL mode (Customizer)
  var myRtl = function myRtl() {
    var rtlmode = document.querySelector("#rtlmode");
    if (rtlmode != null) {
      rtlmode.addEventListener("click", function () {
        if (document.querySelector("#rtlmode").checked == true) {
          document.documentElement.setAttribute('dir', 'rtl');
        } else {
          document.documentElement.setAttribute('dir', 'ltr');
        }
      });
    }
  };

  /**
   * ------------------------------------------------------------------------
   * Launch Functions
   * ------------------------------------------------------------------------
   */
  myLightdark();
  mySidelight();
  myRtl();
  myColor();
})();
/******/ })()
;