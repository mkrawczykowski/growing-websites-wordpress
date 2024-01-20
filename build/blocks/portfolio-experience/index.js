/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/portfolio-experience/helpers.js":
/*!************************************************!*\
  !*** ./blocks/portfolio-experience/helpers.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   active: () => (/* binding */ active),
/* harmony export */   addClickHandlers: () => (/* binding */ addClickHandlers),
/* harmony export */   buildArrayFromDOM: () => (/* binding */ buildArrayFromDOM),
/* harmony export */   buildHTMLListFromArray: () => (/* binding */ buildHTMLListFromArray),
/* harmony export */   buildListFromDOM: () => (/* binding */ buildListFromDOM),
/* harmony export */   choices: () => (/* binding */ choices),
/* harmony export */   dataArraySortDescending: () => (/* binding */ dataArraySortDescending),
/* harmony export */   initData: () => (/* binding */ initData),
/* harmony export */   updateListArray: () => (/* binding */ updateListArray)
/* harmony export */ });
let active = {};
let choices = {};
const initData = () => {
  active = {
    list: document.querySelector('.dropdown-checkboxes__active-list'),
    listItemClassName: 'dropdown-checkboxes__active-list-item',
    listitemDataType: 'data-active-item',
    listItems: '',
    listArray: []
  };
  choices = {
    list: document.querySelector('.dropdown-checkboxes__choices-list'),
    listItemClassName: 'dropdown-checkboxes__choices-list-item',
    listitemDataType: 'data-choice-item',
    listItems: '',
    listArray: []
  };
};
const dataArraySortDescending = arrayToSort => {
  if (arrayToSort && Array.isArray(arrayToSort)) {
    arrayToSort.sort();
    arrayToSort.reverse();
  }
};
const buildListFromDOM = itemDataType => {
  if (itemDataType) {
    switch (itemDataType) {
      case 'active':
        active.listItems = document.querySelectorAll(`[data-item-type="${itemDataType}"]`);
        break;
      case 'choice':
        choices.listItems = document.querySelectorAll(`[data-item-type="${itemDataType}"]`);
        break;
    }
  } else {
    console.error('buildDOMList - no function parameter');
  }
};
const buildArrayFromDOM = itemDataType => {
  if (itemDataType) {
    const loopThroughElements = (elementsList, listArray) => {
      elementsList.forEach(elementsListItem => {
        if ('value' in elementsListItem.dataset) {
          listArray.push(elementsListItem.dataset.value);
        } else {
          console.error('fillArrayFromElementList: listItem doesn\'t contain proper data attribute (\'value\')');
          return;
        }
      });
    };
    switch (itemDataType) {
      case 'active':
        active.listArray = [];
        loopThroughElements(document.querySelectorAll(`[data-item-type="${itemDataType}"]`), active.listArray);
        break;
      case 'choice':
        choices.listArray = [];
        loopThroughElements(document.querySelectorAll(`[data-item-type="${itemDataType}"]`), choices.listArray);
        break;
    }
  } else {
    console.error('buildDOMList - no function parameter');
  }
};
const updateListArray = (itemToAdd, arrayToModify, operation = 'add') => {
  // console.log(typeof itemToAdd);
  if (!itemToAdd || typeof itemToAdd !== 'string' || !arrayToModify || !Array.isArray(arrayToModify) || typeof operation !== 'string') {
    console.error('updateListArray error: invalid function parameter');
    return;
  }
  console.log(operation);
  switch (operation) {
    case 'add':
      if (!arrayToModify.includes(itemToAdd)) {
        arrayToModify.push(itemToAdd);
        // console.log(`updateListArray, ${arrayToModify}:`)
        // console.log(arrayToModify)
      }
      break;
    case 'remove':
      arrayToModify;
      const index = arrayToModify.indexOf(itemToAdd);
      arrayToModify = arrayToModify.splice(index, 1);
      // console.log('arrayModified');
      // console.log(arrayModified);
      // arrayToModify = [];
      // arrayToModify = [...arrayModified];

      break;
  }
  console.log(`updateListArray, ${arrayToModify}:`);
  console.log(arrayToModify);
};
const addClickHandlers = listItems => {
  listItems.forEach(listItem => {
    listItem.addEventListener('click', () => {
      switch (listItem.dataset.itemType) {
        case 'active':
          listItem.remove();
          updateListArray(listItem.dataset.value, choices.listArray, 'add');
          buildHTMLListFromArray(choices.list, choices.listItemClassName, 'choice', choices.listArray);
          buildListFromDOM('choice');
          addClickHandlers(choices.listItems);
          updateListArray(listItem.dataset.value, active.listArray, 'remove');
          buildHTMLListFromArray(active.list, active.listItemClassName, 'active', active.listArray);
          buildListFromDOM('active');
          addClickHandlers(active.listItems);
          break;
        case 'choice':
          listItem.remove();
          updateListArray(listItem.dataset.value, active.listArray, 'add');
          buildHTMLListFromArray(active.list, active.listItemClassName, 'active', active.listArray);
          buildListFromDOM('active');
          addClickHandlers(active.listItems);
          updateListArray(listItem.dataset.value, choices.listArray, 'remove');
          buildHTMLListFromArray(choices.list, choices.listItemClassName, 'choice', choices.listArray);
          buildListFromDOM('choice');
          addClickHandlers(choices.listItems);
          break;
      }
    });
  });
};
const buildHTMLListFromArray = (listElementToRebuild, itemClassName, itemDataTypeValue, dataArray) => {
  listElementToRebuild.innerHTML = '';
  dataArraySortDescending(dataArray);
  dataArray.forEach(dataArrayItem => {
    const newListItem = document.createElement('li');
    newListItem.classList.add(itemClassName);
    newListItem.setAttribute('data-item-type', itemDataTypeValue);
    newListItem.setAttribute('data-value', dataArrayItem);
    const newListItemText = document.createTextNode(dataArrayItem);
    newListItem.appendChild(newListItemText);
    listElementToRebuild.appendChild(newListItem);
  });
};

/***/ }),

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
/* harmony import */ var _helpers__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./helpers */ "./blocks/portfolio-experience/helpers.js");



document.addEventListener('DOMContentLoaded', function () {
  (0,_helpers__WEBPACK_IMPORTED_MODULE_2__.initData)();
  console.log(_helpers__WEBPACK_IMPORTED_MODULE_2__.active);
  (0,_helpers__WEBPACK_IMPORTED_MODULE_2__.buildListFromDOM)('active');
  (0,_helpers__WEBPACK_IMPORTED_MODULE_2__.buildListFromDOM)('choice');
  (0,_helpers__WEBPACK_IMPORTED_MODULE_2__.buildArrayFromDOM)('active');
  (0,_helpers__WEBPACK_IMPORTED_MODULE_2__.buildArrayFromDOM)('choice');
  (0,_helpers__WEBPACK_IMPORTED_MODULE_2__.addClickHandlers)(_helpers__WEBPACK_IMPORTED_MODULE_2__.active.listItems);
  (0,_helpers__WEBPACK_IMPORTED_MODULE_2__.addClickHandlers)(_helpers__WEBPACK_IMPORTED_MODULE_2__.choices.listItems);
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map