import './index.scss';
import '../../scripts/checkbox-dropdowns-filters';

document.addEventListener('DOMContentLoaded', function(){
    const activeList = document.querySelectorAll('.dropdown-checkboxes__active-list');
    const choicesList = document.querySelector('.dropdown-checkboxes__choices-list');
    const activeListItems = document.querySelectorAll('[data-active-item]');
    const choicesListItems = document.querySelectorAll('[data-choice-item]');
    
    activeListItems.forEach(activeListItem => {
        // console.log(activeListItem.dataset.activeItem);
        console.log('====================');
        console.log('====================');
        activeListItem.addEventListener('click', ()=>{
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
    })
})
