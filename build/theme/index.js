/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/index.js":
/*!*************************!*\
  !*** ./src/js/index.js ***!
  \*************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _main_menu__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./main-menu */ "./src/js/main-menu.js");
/* harmony import */ var _main_menu__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_main_menu__WEBPACK_IMPORTED_MODULE_0__);

console.log('main menu');

/***/ }),

/***/ "./src/js/main-menu.js":
/*!*****************************!*\
  !*** ./src/js/main-menu.js ***!
  \*****************************/
/***/ (() => {

document.addEventListener('DOMContentLoaded', function () {
  const mainNav = document.querySelector('.main-nav');
  const mainMenuItemHasChildren = document.querySelectorAll('.main-nav__has-children');
  const megaMenuPanelsBack = document.querySelectorAll('.mega-menu-panel-back');
  const coveringLayer = document.querySelector('.covering-layer');
  const hamburger = document.getElementById('main-nav__hamburger');
  if (mainMenuItemHasChildren.length) {
    mainMenuItemHasChildren.forEach(itemHasChildren => {
      itemHasChildren.addEventListener('mouseover', function (event) {
        if (!coveringLayer.classList.contains('active')) {
          if (window.innerWidth > 1024) {
            coveringLayer.classList.add('active');
          }
          itemHasChildren.classList.add('active');
        }
      });
      itemHasChildren.addEventListener('mouseout', function (event) {
        if (coveringLayer.classList.contains('active')) {
          if (window.innerWidth > 1024) {
            coveringLayer.classList.remove('active');
          }
          itemHasChildren.classList.remove('active');
        }
      });
    });
  }
  hamburger.addEventListener('click', function () {
    hamburger.classList.toggle('active');
    mainNav.classList.toggle('active');
    mainMenuItemHasChildren.forEach(itemHasChildren => {
      itemHasChildren.classList.remove('active');
    });
  });
  megaMenuPanelsBack.forEach(megaMenuPanelBack => {
    megaMenuPanelBack.addEventListener('click', () => {
      const closestParentListItem = megaMenuPanelBack.closest('.main-nav__list-item');
      closestParentListItem.classList.remove('active');
      closestParentListItem.blur();
    });
  });
});

/***/ }),

/***/ "./src/sass/index.scss":
/*!*****************************!*\
  !*** ./src/sass/index.scss ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sass_index_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./sass/index.scss */ "./src/sass/index.scss");
/* harmony import */ var _js_index_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/index.js */ "./src/js/index.js");


})();

/******/ })()
;
//# sourceMappingURL=index.js.map