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
  const activeList = document.querySelector('.dropdown-checkboxes__active-list');
  const activeListItemClassName = 'dropdown-checkboxes__active-list-item';
  const activeListItemDataName = 'data-active-item';
  const activeListItems = document.querySelectorAll(`[${activeListItemDataName}]`);
  let activeListArray = [];
  const choicesList = document.querySelector('.dropdown-checkboxes__choices-list');
  const choicesListItemClassName = 'dropdown-checkboxes__choices-list-item';
  const choicesListItemDataName = 'data-choice-item';
  const choicesListItems = document.querySelectorAll(`[${choicesListItemDataName}]`);
  let choicesListArray = [];
  const dataArraySortDescending = arrayToSort => {
    if (arrayToSort && Array.isArray(arrayToSort)) {
      arrayToSort.sort();
      arrayToSort.reverse();
    }
  };
  const fillArrayFromElementsList = (dataArray, elementsList) => {
    if (dataArray && Array.isArray(dataArray) && typeof elementsList === 'object') {
      elementsList.forEach(elementsListItem => {
        if ('value' in elementsListItem.dataset) {
          dataArray.push(elementsListItem.dataset.value);
        } else {
          console.error('fillArrayFromElementList: listItem doesn\'t contain proper data attribute (\'value\')');
          return;
        }
      });
      dataArraySortDescending(dataArray);
      return dataArray;
    } else return;
  };
  activeListArray = fillArrayFromElementsList(activeListArray, activeListItems);
  choicesListArray = fillArrayFromElementsList(choicesListArray, choicesListItems);
  const rebuildHTMLListFromArray = (listElementToRebuild, itemClassName, itemDataName, dataArray) => {
    console.log(dataArray);
    listElementToRebuild.innerHTML = '';
    dataArraySortDescending(dataArray);
    dataArray.forEach(dataArrayItem => {
      const newListItem = document.createElement('li');
      newListItem.classList.add(itemClassName);
      newListItem.setAttribute(itemDataName, '');
      newListItem.setAttribute('data-value', dataArrayItem);
      const newListItemText = document.createTextNode(dataArrayItem);
      newListItem.appendChild(newListItemText);
      listElementToRebuild.appendChild(newListItem);
    });
  };
  const handleListItemClick = (elementsList, theOtherArray, theOtherList, theOtherListClassName, dataAttributeName) => {
    elementsList.forEach(elementsListItem => {
      elementsListItem.addEventListener('click', () => {
        theOtherArray.push(elementsListItem.dataset.value);
        rebuildHTMLListFromArray(theOtherList, theOtherListClassName, dataAttributeName, theOtherArray);
        elementsListItem.remove();
      });
    });
  };
  handleListItemClick(activeListItems, choicesListArray, choicesList, choicesListItemClassName, choicesListItemDataName);
  handleListItemClick(choicesListItems, activeListArray, activeList, activeListItemClassName, activeListItemDataName);
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map