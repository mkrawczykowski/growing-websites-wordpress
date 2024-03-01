import './index.scss';

document.addEventListener('DOMContentLoaded', function(){
    const dropdownCheckboxesInstances = [];
    const applyFiltersButton = document.getElementById('js-portfolio-experience-apply-filters');
    const operatorCheckboxes = document.querySelectorAll('js-portfolio-experience-apply-filters');
    const expanders = document.querySelectorAll('.js-dropdown-checkboxes-expand-area');
    const postsList = document.querySelector('.posts-list');
    const paginationPageNumbers = document.querySelectorAll('[data-pagination-page-number]');
    console.log(paginationPageNumbers);

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
            id: listItem.dataset.itemId,
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

    const createItemInOppositeList = (oppositeListUl, clickedItemValue, clickedItemType, clickedItemId) => {
        const newItemClass = `dropdown-checkboxes__${switchItemType(clickedItemType)}-list-item`;
        const newListItem = document.createElement('li');
        const newListItemText = document.createTextNode(clickedItemValue);

        newListItem.classList.add(newItemClass);
        newListItem.setAttribute('data-item-type', switchItemType(clickedItemType));
        newListItem.setAttribute('data-item-id', clickedItemId);
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
                
                if (parentComponentDiv){
                    const oppositeListUl = parentComponentDiv.querySelector(`[data-${switchItemType(event.target.dataset.itemType)}-list]`);
                    createItemInOppositeList(oppositeListUl, dataFromClickedItem.value, dataFromClickedItem.type, dataFromClickedItem.id);
                    event.target.remove();    
                    addClickHandlersToLists();
                }
            });
        });
    }

    initData();
    addClickHandlersToLists();

    const allAtOnceFilters = document.querySelectorAll('[data-all-at-once]');
    allAtOnceFilters.forEach(allAtOnceFilter => {
        allAtOnceFilter.addEventListener('click', () => {
            allAtOnceFilter.classList.toggle('active');
        })
    })

    const buildTermsStringFromElements = (elements) => {
        let termsString = '';
        elements.forEach(element => {
            
            if (element.classList.contains('active')){console.log(element);
                termsString += element.innerHTML + ',';
            }
        })
        return termsString;
    }

    expanders.forEach(expander => {
        expander.addEventListener('click', ()=>{
            expander.closest('.dropdown-checkboxes').classList.toggle('active');
        })
    });

    const createPostBox = (title, categories, date, tags) => {
        if (!title || !categories || !Array.isArray(categories) || !date || !tags || !Array.isArray(tags)){
            console.error('createPostBox - not enough params or incorrect params');
            return;
        }
        const postBox = document.createElement('div');
        postBox.classList.add('post-box');

        const postBox__texts = document.createElement('div');
        postBox__texts.classList.add('post-box__texts');

        const postBox__meta = document.createElement('div');
        postBox__meta.classList.add('post-box__meta');

        const postBox__categories = document.createElement('ul');
        postBox__categories.classList.add('post-box__categories');

        categories.forEach(category => {
            const postBox__category = document.createElement('li');
            postBox__category.classList.add('post-box__category');
            const postBox__categoryLink = document.createElement('a');
            postBox__categoryLink.classList.add('post-box__category-link');
            postBox__categoryLink.innerHTML = category;
            postBox__category.appendChild(postBox__categoryLink);
            postBox__categories.appendChild(postBox__category);
        });
        postBox__meta.appendChild(postBox__categories);

        const postBox__date = document.createElement('div');
        postBox__date.classList.add('post-box__date');
        postBox__date.innerHTML = date;
        postBox__meta.appendChild(postBox__date);
        
        const postBox__title = document.createElement('h3');
        postBox__title.classList.add('post-box__title');
        const postBox__titleLink = document.createElement('a');
        postBox__titleLink.classList.add('post-box__title-link');
        postBox__titleLink.innerHTML = title;
        postBox__title.appendChild(postBox__titleLink);

        const postBox__tags = document.createElement('ul');
        postBox__tags.classList.add('post-box__tags');

        tags.forEach(tag => {
            const postBox__tag = document.createElement('li');
            postBox__tag.classList.add('post-box__tag');
            const postBox__tagLink = document.createElement('a');
            postBox__tagLink.classList.add('post-box__tag-link');
            postBox__tagLink.innerHTML = tag;
            postBox__tag.appendChild(postBox__tagLink);
            postBox__tags.appendChild(postBox__tag);
        });
        postBox__meta.appendChild(postBox__tags);

        const postBox__excerpt = document.createElement('p');
        postBox__excerpt.classList.add('post-box__excerpt');

        postBox__texts.appendChild(postBox__meta);
        postBox__texts.appendChild(postBox__title);
        postBox__texts.appendChild(postBox__tags);
        postBox__texts.appendChild(postBox__excerpt);
        postBox.appendChild(postBox__texts);

        const postBox__image = document.createElement('div');
        postBox__image.classList.add('post-box__image');

        const postBox__imageLink = document.createElement('a');
        postBox__imageLink.classList.add('post-box__image-link');

        const postBox__imageImg = document.createElement('img');
        postBox__imageLink.appendChild(postBox__imageImg);

        postBox__image.appendChild(postBox__imageLink);
        postBox.appendChild(postBox__image);

        console.log(postBox);
        postsList.appendChild(postBox);
    }

    paginationPageNumbers.forEach(paginationPageNumber => {
        paginationPageNumber.addEventListener('click', () => {
            if (paginationPageNumber.tagName === 'A'){
                console.log(paginationPageNumber.dataset.paginationPageNumber);    
            }
        })
    });

    const fetchPortfolioPosts = async (pageNumber) => {
        let routeString = '?';
        const allFilteringComponents = document.querySelectorAll('[data-taxonomy');
        allFilteringComponents.forEach(filteringComponent => {
            routeString += filteringComponent.dataset.taxonomy + '=';
            routeString += filteringComponent.dataset.termsIds + '&';
        });
        routeString += '_embed';
        console.log('routeString:');
        console.log(routeString);

        const response = await fetch(
            'http://localhost/wp-json/wp/v2/project/' + routeString
        );
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const fetchedPortfolioPosts = await response.json();
        console.log(fetchedPortfolioPosts);
        fetchedPortfolioPosts.forEach(fetchedPortfolioPost => {
            const title = fetchedPortfolioPost.title.rendered;
            const categories = fetchedPortfolioPost['project-category'];
            const date = fetchedPortfolioPost['project-year'];
            const tags = fetchedPortfolioPost['project-tag'];
            console.log(title);
            console.log(categories);
            console.log(date);
            console.log(tags);
            // postBox.innerHTML = '';
            // createPostBox(title, categories, date, tags);
            console.log('============================================================');
        });
    }

    applyFiltersButton.addEventListener('click', () => {
        fetchPortfolioPosts();
    })

    const categories = ['test cat 1'];
    const tags = ['test tag 1', 'test tag 2', 'test tag 3'];
    createPostBox('test title', categories, 2015, tags);
})
