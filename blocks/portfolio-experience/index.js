import './index.scss';
import '../../scripts/checkbox-dropdowns-filters';

document.addEventListener('DOMContentLoaded', function(){
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
    
    const dataArraySortDescending = (arrayToSort) => {
        if (arrayToSort && Array.isArray(arrayToSort)){
            arrayToSort.sort();
            arrayToSort.reverse();
        }
    }

    const fillArrayFromElementsList = (dataArray, elementsList) => {
        if (dataArray && Array.isArray(dataArray) && (typeof elementsList === 'object')) {
            elementsList.forEach(elementsListItem => {
                if (('value' in elementsListItem.dataset)){
                    dataArray.push(elementsListItem.dataset.value);
                } else {
                    console.error('fillArrayFromElementList: listItem doesn\'t contain proper data attribute (\'value\')');
                    return;
                }
            })
            dataArraySortDescending(dataArray);
            return dataArray;
        } else return;
    }

    activeListArray = fillArrayFromElementsList(activeListArray, activeListItems);
    choicesListArray = fillArrayFromElementsList(choicesListArray, choicesListItems);

    const rebuildHTMLListFromArray = (listElementToRebuild, itemClassName, itemDataName, dataArray) => {
        console.log(dataArray);
        
        listElementToRebuild.innerHTML = '';
        dataArraySortDescending(dataArray);

        dataArray.forEach(dataArrayItem=>{
            const newListItem = document.createElement('li');
            newListItem.classList.add(itemClassName);
            newListItem.setAttribute(itemDataName, '');
            newListItem.setAttribute('data-value', dataArrayItem);
            const newListItemText = document.createTextNode(dataArrayItem);
            newListItem.appendChild(newListItemText);
            listElementToRebuild.appendChild(newListItem);
        })
    }

    const handleListItemClick = (elementsList, theOtherArray, theOtherList, theOtherListClassName, dataAttributeName) => {
        elementsList.forEach(elementsListItem => {
            elementsListItem.addEventListener('click', ()=>{
                theOtherArray.push(elementsListItem.dataset.value);
                rebuildHTMLListFromArray(theOtherList, theOtherListClassName, dataAttributeName,  theOtherArray);
                elementsListItem.remove();
            });
        })
    }

    handleListItemClick(activeListItems, choicesListArray, choicesList, choicesListItemClassName, choicesListItemDataName);
    handleListItemClick(choicesListItems, activeListArray, activeList, activeListItemClassName, activeListItemDataName);    
})
