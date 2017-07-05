/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

/**
 * Created by administrator on 06/07/2015.
 */

$(document).ready(function () {
    // show sidebar and overlay
    function showSidebar() {
        sidebar.css('margin-left', '0');
        overlay.show(0, function () {
            overlay.fadeTo('500', 0.5);
        });
    }

    // hide sidebar and overlay
    function hideSidebar() {
        sidebar.css('margin-left', sidebar.width() * -1 + 'px');

        overlay.fadeTo('500', 0, function () {
            overlay.hide();
        });;
    }

    // selectors
    var sidebar = $('[data-sidebar]');
    var button = $('[data-sidebar-button]');
    var overlay = $('[data-sidebar-overlay]');

    // add height to content area
    overlay.parent().css('min-height', 'inherit');

    // hide sidebar on load
    sidebar.css('margin-left', sidebar.width() * 2 * -1 + 'px');

    sidebar.show(0, function () {
        sidebar.css('transition', 'all 0.5s ease');
    });

    // toggle sidebar on click
    button.click(function () {
        if (overlay.is(':visible')) {
            hideSidebar();
            $("#nav-toggle").toggleClass("active");
        } else {
            showSidebar();
            this.classList.toggle("active");
        }

        return false;
    });

    // hide sidebar on overlay click
    overlay.click(function () {
        hideSidebar();
    });
});

/***/ }),
/* 1 */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(0);


/***/ })
/******/ ]);