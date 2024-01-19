/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./scripts/checkbox-dropdowns-filters.js":
/*!***********************************************!*\
  !*** ./scripts/checkbox-dropdowns-filters.js ***!
  \***********************************************/
/***/ (() => {

console.log('checkbox dropdowns filters');

/***/ }),

/***/ "./blocks/portfolio-experience/index.scss":
/*!************************************************!*\
  !*** ./blocks/portfolio-experience/index.scss ***!
  \************************************************/
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
/*!**********************************************!*\
  !*** ./blocks/portfolio-experience/index.js ***!
  \**********************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.scss */ "./blocks/portfolio-experience/index.scss");
/* harmony import */ var _scripts_checkbox_dropdowns_filters__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../scripts/checkbox-dropdowns-filters */ "./scripts/checkbox-dropdowns-filters.js");
/* harmony import */ var _scripts_checkbox_dropdowns_filters__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_scripts_checkbox_dropdowns_filters__WEBPACK_IMPORTED_MODULE_1__);


document.addEventListener('DOMContentLoaded', function () {
  const activeList = document.querySelectorAll('.dropdown-checkboxes__active-list');
  const choicesList = document.querySelector('.dropdown-checkboxes__choices-list');
  const activeListItems = document.querySelectorAll('[data-active-item]');
  const choicesListItems = document.querySelectorAll('[data-choice-item]');
  activeListItems.forEach(activeListItem => {
    // console.log(activeListItem.dataset.activeItem);
    console.log('====================');
    console.log('====================');
    activeListItem.addEventListener('click', () => {
      const newChoicesItem = document.createElement('li');
      newChoicesItem.classList.add('dropdown-checkboxes__choices-list');
      newChoicesItem.setAttribute('data-choice-item', activeListItem.dataset.activeItem);
      const newChoicesItemText = document.createTextNode(activeListItem.dataset.activeItem);
      newChoicesItem.appendChild(newChoicesItemText);
      console.log('newChoicesItem');
      console.log(newChoicesItem);
      console.log('choicesList');
      console.log(choicesList);
      choicesList.appendChild(newChoicesItem);
      activeListItem.remove();
    });
    console.log('====================');
    console.log('====================');
  });
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map