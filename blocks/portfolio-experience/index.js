import './index.scss';
import '../../scripts/checkbox-dropdowns-filters';
import {active, choices, buildListFromDOM, buildArrayFromDOM, addClickHandlers, initData} from './helpers';

document.addEventListener('DOMContentLoaded', function(){

    initData();

    buildListFromDOM('active');
    buildListFromDOM('choice');

    buildArrayFromDOM('active');
    buildArrayFromDOM('choice');

    addClickHandlers(active.listItems);
    addClickHandlers(choices.listItems);

    const yearsFilters = document.querySelectorAll('[data-years-filter]');
    yearsFilters.forEach(yearsFilter => {
        yearsFilter.addEventListener('click', () => {
            yearsFilter.classList.toggle('active');
        })
    })

})
