import './index.scss';

document.addEventListener('DOMContentLoaded', function(){
    const dropdownCheckboxesInstances = [];

    const initData = () => {
        const componentInstances = document.querySelectorAll('[data-dropdown-checkboxes]');
        componentInstances.forEach(componentInstance => {
            dropdownCheckboxesInstances.push(componentInstance);
        })
    }

    const getDataFromClickedItem = (listItem) => {
        if (!listItem || typeof listItem !== 'object'){
            console.error('getDataFromClickedItem - invalid parameter type or no parameter')
            return;
        }
        
        const listItemData = {
            value: listItem.dataset.value,
            type: listItem.dataset.itemType,
        }
        return listItemData;
    }

    const switchItemType = (clickedListItemType) => {
        if (!clickedListItemType || typeof clickedListItemType !== 'string'){
            return;
        }

        switch (clickedListItemType){
            case 'active' :
                return 'choices';
            case 'choices' :
                return 'active';
        };
    }

    const createItemInOppositeList = (oppositeListUl, clickedItemValue, clickedItemType) => {
        const newItemClass = `dropdown-checkboxes__${switchItemType(clickedItemType)}-list-item`;
        const newListItem = document.createElement('li');
        const newListItemText = document.createTextNode(clickedItemValue);

        newListItem.classList.add(newItemClass);
        newListItem.setAttribute('data-item-type', switchItemType(clickedItemType));
        newListItem.setAttribute('data-value', clickedItemValue);
        newListItem.appendChild(newListItemText);
        oppositeListUl.appendChild(newListItem);
    }

    const addClickHandlersToLists = () => {
        const listItems = document.querySelectorAll('[data-item-type]');

        listItems.forEach(listItem => {
            listItem.addEventListener('click', event=>{
                const dataFromClickedItem = getDataFromClickedItem(event.target);
                const parentComponentDiv = event.target.closest('[data-dropdown-checkboxes]');
                
                if (parentComponentDiv){console.log(parentComponentDiv);
                    const oppositeListUl = parentComponentDiv.querySelector(`[data-${switchItemType(event.target.dataset.itemType)}-list]`);
                    createItemInOppositeList(oppositeListUl, dataFromClickedItem.value, dataFromClickedItem.type);
                    event.target.remove();    
                    addClickHandlersToLists();
                }
            });
        });
    }

    initData();
    addClickHandlersToLists();




    
    const yearsFilters = document.querySelectorAll('[data-years-filter]');
    yearsFilters.forEach(yearsFilter => {
        yearsFilter.addEventListener('click', () => {
            yearsFilter.classList.toggle('active');
        })
    })

})
