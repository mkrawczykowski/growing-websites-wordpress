import './index.scss';
import '../../scripts/checkbox-dropdowns-filters';
import {active, choices, buildListFromDOM, buildArrayFromDOM, addClickHandlers, initData} from './helpers';

document.addEventListener('DOMContentLoaded', function(){

    initData();

    console.log(active)
    buildListFromDOM('active');
    buildListFromDOM('choice');

    buildArrayFromDOM('active');
    buildArrayFromDOM('choice');

    addClickHandlers(active.listItems);
    addClickHandlers(choices.listItems);

})
