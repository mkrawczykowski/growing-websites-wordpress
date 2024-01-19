import './index.scss';
import '../../scripts/checkbox-dropdowns-filters';

document.addEventListener('DOMContentLoaded', function(){
    const activeList = document.querySelectorAll('.dropdown-checkboxes__active-list');
    let activeListArray = [];
    const choicesList = document.querySelector('.dropdown-checkboxes__choices-list');
    let choicesListArray = [];
    const activeListItems = document.querySelectorAll('[data-active-item]');
    const choicesListItems = document.querySelectorAll('[data-choice-item]');

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
    console.log('---- activeListArray ----');
    console.log(activeListArray);
    console.log('---- choicesListArray ----');
    console.log(choicesListArray);

    const rebuildHTMLListFromArray = (listElementToRebuild, itemClassName, itemDataName, dataArray) => {
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

    activeListItems.forEach(activeListItem => {
        activeListItem.addEventListener('click', ()=>{
            choicesListArray.push(activeListItem.dataset.value);
            rebuildHTMLListFromArray(choicesList, 'dropdown-checkboxes__choices-list', 'data-choice-item',  choicesListArray);
            activeListItem.remove();
        });
    })
})
