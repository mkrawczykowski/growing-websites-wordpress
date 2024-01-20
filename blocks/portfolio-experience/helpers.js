export let active = {};
export let choices = {};


export const initData = () => {

    active = {
        list: document.querySelector('.dropdown-checkboxes__active-list'),
        listItemClassName: 'dropdown-checkboxes__active-list-item',
        listitemDataType: 'data-active-item',
        listItems:'',
        listArray: []
    }

    choices = {
        list: document.querySelector('.dropdown-checkboxes__choices-list'),
        listItemClassName: 'dropdown-checkboxes__choices-list-item',
        listitemDataType: 'data-choice-item',
        listItems:'',
        listArray: []
    }
}


export const dataArraySortDescending = (arrayToSort) => {
    if (arrayToSort && Array.isArray(arrayToSort)){
        arrayToSort.sort();
        arrayToSort.reverse();
    }
}


export const buildListFromDOM = (itemDataType) => {
    if (itemDataType) {
        switch(itemDataType){
            case 'active' :
            active.listItems = document.querySelectorAll(`[data-item-type="${itemDataType}"]`);
            break;
            case 'choice' :
            choices.listItems = document.querySelectorAll(`[data-item-type="${itemDataType}"]`);
            break;
        }
    } else {
        console.error('buildDOMList - no function parameter')
    }
}


export const buildArrayFromDOM = (itemDataType) => {
    if (itemDataType) {
        const loopThroughElements = (elementsList, listArray) => {
            elementsList.forEach(elementsListItem => {
                if (('value' in elementsListItem.dataset)){
                    listArray.push(elementsListItem.dataset.value);
                } else {
                    console.error('fillArrayFromElementList: listItem doesn\'t contain proper data attribute (\'value\')');
                    return;
                }
            })
        }
        switch (itemDataType){
            case 'active' : 
                active.listArray = [];
                loopThroughElements(document.querySelectorAll(`[data-item-type="${itemDataType}"]`), active.listArray)
            break;
            case 'choice' : 
                choices.listArray = [];
                loopThroughElements(document.querySelectorAll(`[data-item-type="${itemDataType}"]`), choices.listArray)
            break;
        }
        
    } else {
        console.error('buildDOMList - no function parameter')
    }
}


export const updateListArray = (itemToAdd, arrayToModify, operation = 'add') => {
    if (!itemToAdd || typeof itemToAdd !== 'string' || !arrayToModify || !Array.isArray(arrayToModify) || typeof operation !== 'string' ){
        console.error('updateListArray error: invalid function parameter')
        return;
    }
    
    switch(operation){
        case 'add' :
            if (!arrayToModify.includes(itemToAdd)) {
                arrayToModify.push(itemToAdd);
            }    
        break;
        case 'remove' :
            arrayToModify
            const index = arrayToModify.indexOf(itemToAdd);
            arrayToModify = arrayToModify.splice(index, 1);
        break;
    }  
}


export const addClickHandlers = (listItems) => {
    listItems.forEach(listItem => {
        listItem.addEventListener('click', () => {
            switch(listItem.dataset.itemType){
                case 'active' :
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
                case 'choice' :
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
        })
    })
}


export const buildHTMLListFromArray = (listElementToRebuild, itemClassName, itemDataTypeValue, dataArray) => {
    listElementToRebuild.innerHTML = '';
    dataArraySortDescending(dataArray);

    dataArray.forEach(dataArrayItem=>{
        const newListItem = document.createElement('li');
        newListItem.classList.add(itemClassName);
        newListItem.setAttribute('data-item-type', itemDataTypeValue);
        newListItem.setAttribute('data-value', dataArrayItem);
        const newListItemText = document.createTextNode(dataArrayItem);
        newListItem.appendChild(newListItemText);
        listElementToRebuild.appendChild(newListItem);
    })
}