import './index.scss';

document.addEventListener('DOMContentLoaded', function(){
    const dropdownCheckboxesInstances = [];
    const applyFiltersButton = document.getElementById('js-portfolio-experience-apply-filters');
    const operatorCheckboxes = document.querySelectorAll('js-portfolio-experience-apply-filters');
    const expanders = document.querySelectorAll('.js-dropdown-checkboxes-expand-area');
    const postsList = document.querySelector('.posts-list');
    const paginationLinks = document.querySelector('.pagination');
    const portfolioExperienceComponent = document.querySelector('.js-portfolio-experience');
    const baseRESTUrl = portfolioExperienceComponent.dataset.restUrl;
    const postsPerPage = portfolioExperienceComponent.dataset.postsPerPage;
    let routeString = '';
    let fetchedPortfolioPosts = [];

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
            value: listItem.dataset.itemValue,
            type: listItem.dataset.itemType,
            id: listItem.dataset.itemId,
            slug: listItem.dataset.itemSlug,
            url: listItem.dataset.itemUrl,
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

    const createItemInOppositeList = (oppositeListUl, clickedItemValue, clickedItemType, clickedItemId, clickedItemSlug, clickedItemURL) => {
        const newItemClass = `dropdown-checkboxes__${switchItemType(clickedItemType)}-list-item`;
        const newListItem = document.createElement('li');
        const newListItemText = document.createTextNode(clickedItemValue);

        newListItem.classList.add(newItemClass);
        newListItem.setAttribute('data-item-type', switchItemType(clickedItemType));
        newListItem.setAttribute('data-item-id', clickedItemId);
        newListItem.setAttribute('data-item-value', clickedItemValue);
        newListItem.setAttribute('data-item-slug', clickedItemSlug);
        newListItem.setAttribute('data-item-url', clickedItemURL);
        newListItem.appendChild(newListItemText);
        oppositeListUl.appendChild(newListItem);
    }

    const activeItemsToComponentData = (parentComponentDiv) => {
        const activeItems = parentComponentDiv.querySelectorAll('[data-item-type="active"]');
        let activeIds = [];
        activeItems.forEach(activeItem => {
            console.log('activeItem')
            console.log(activeItem)
            if (activeItem.dataset.itemType == 'active'){
                activeIds.push(activeItem.dataset.itemId);
                console.log(activeIds);
            }
        })
        parentComponentDiv.dataset.termsIds = activeIds.toString();
    }


    const addClickHandlersToLists = () => {
        const listItems = document.querySelectorAll('[data-item-type]');

        listItems.forEach(listItem => {
            listItem.addEventListener('click', event=>{
                const dataFromClickedItem = getDataFromClickedItem(event.target);
                const parentComponentDiv = event.target.closest('[data-dropdown-checkboxes]');
                
                if (parentComponentDiv){
                    const oppositeListUl = parentComponentDiv.querySelector(`[data-${switchItemType(event.target.dataset.itemType)}-list]`);
                    createItemInOppositeList(oppositeListUl, dataFromClickedItem.value, dataFromClickedItem.type, dataFromClickedItem.id, dataFromClickedItem.slug, dataFromClickedItem.url);
                    event.target.remove();
                    
                    activeItemsToComponentData(parentComponentDiv);
                    addClickHandlersToLists();
                }
            });
        });
    }

    const addClickHandlersToPaginationLinks = () => {
        const paginationPageNumbers = document.querySelectorAll('[data-pagination-page-number]');
        
        paginationPageNumbers.forEach(paginationPageNumber => {
            paginationPageNumber.addEventListener('click', () => {
                if (!paginationPageNumber.classList.contains('pagination__button--active')){
                    displayPortfolioPosts(paginationPageNumber.dataset.paginationPageNumber-1);
                }
            })
        });        
    }

    const getFilterTaxonomyOperator = (taxonomy) => {
        const filterComponent = document.querySelector(`[data-taxonomy="${taxonomy}"]`);
        return filterComponent.dataset.filterOperator;
    }
    
    const turnIDIntoName = (id, taxonomy) => {
        const filterWithTaxonomy = document.querySelector(`[data-taxonomy="${taxonomy}"]`);
        const itemWithId = filterWithTaxonomy.querySelector(`[data-item-id="${id}"]`);

        return itemWithId.dataset.itemValue;
    }

    const getURLFromItem = (id, taxonomy) => {
        const filterWithTaxonomy = document.querySelector(`[data-taxonomy="${taxonomy}"]`);
        const itemWithURL = filterWithTaxonomy.querySelector(`[data-item-id="${id}"]`);

        return itemWithURL.dataset.itemUrl;
    }

    const turnIdIntoSlug = (id, taxonomy) => {
        const filterWithTaxonomy = document.querySelector(`[data-taxonomy="${taxonomy}"]`);
        const itemWithId = filterWithTaxonomy.querySelector(`[data-item-id="${id}"]`);

        return itemWithId.dataset.itemSlug;
    }

    const buildRouteString = () => {
        const portfolioExperienceComponent = document.querySelector('.js-portfolio-experience');
        const baseRESTUrl = portfolioExperienceComponent.dataset.restUrl;
        routeString = baseRESTUrl;
        const allFilteringComponents = document.querySelectorAll('[data-taxonomy]');

        allFilteringComponents.forEach(filteringComponent => {
            routeString += `filter[${filteringComponent.dataset.taxonomy}]=`;
            let termsIds = filteringComponent.dataset.termsIds;
            const termsIdsArray = termsIds.split(',');
            let termsSlugs = '';
            termsIdsArray.forEach((termId, termIdIndex) =>{
                let operator = '';
                const termSlug = turnIdIntoSlug(termId, filteringComponent.dataset.taxonomy);
                if (termIdIndex < termsIdsArray.length - 1){
                    operator = getFilterTaxonomyOperator(filteringComponent.dataset.taxonomy) === 'AND' ? '%2B' : ',';
                }
                termsSlugs += termSlug + operator; 
            })
            routeString += termsSlugs + '&';
        });
        routeString += `&_embed`;
        console.log('routeString');
        console.log(routeString);
    }

    initData();
    addClickHandlersToLists();
    addClickHandlersToPaginationLinks();

    const createPostBox = (link, title, categories, date, tags, featuredImage) => {
        if (!link, !title || !categories || !Array.isArray(categories) || !date || !Array.isArray(date) || !tags || !Array.isArray(tags) || !featuredImage){
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
            postBox__categoryLink.setAttribute('href', getURLFromItem(category, 'project-category'));
            postBox__categoryLink.classList.add('post-box__category-link');
            postBox__categoryLink.innerHTML = turnIDIntoName(category, 'project-category');
            postBox__category.appendChild(postBox__categoryLink);
            postBox__categories.appendChild(postBox__category);
        });
        postBox__meta.appendChild(postBox__categories);

        const postBox__date = document.createElement('div');
        postBox__date.classList.add('post-box__date');
        postBox__date.innerHTML = turnIDIntoName(date, 'project-year');
        postBox__meta.appendChild(postBox__date);
        
        const postBox__title = document.createElement('h3');
        postBox__title.classList.add('post-box__title');
        const postBox__titleLink = document.createElement('a');
        postBox__titleLink.setAttribute('href', link);
        postBox__titleLink.classList.add('post-box__title-link');
        postBox__titleLink.innerHTML = title;
        postBox__title.appendChild(postBox__titleLink);

        const postBox__tags = document.createElement('ul');
        postBox__tags.classList.add('post-box__tags');

        tags.forEach(tag => {
            const postBox__tag = document.createElement('li');
            postBox__tag.classList.add('post-box__tag');
            const postBox__tagLink = document.createElement('a');
            postBox__tagLink.setAttribute('href', getURLFromItem(tag, 'project-tag'));
            postBox__tagLink.classList.add('post-box__tag-link');
            postBox__tagLink.innerHTML = turnIDIntoName(tag, 'project-tag');
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
        postBox__imageImg.setAttribute('src', featuredImage);
        postBox__imageLink.appendChild(postBox__imageImg);
        postBox__image.appendChild(postBox__imageLink);
        postBox.appendChild(postBox__image);
        postsList.appendChild(postBox);
    }

    const fetchPortfolioPosts = async () => {
        let currentPage = 1;
        let fetchedThisPage;
        buildRouteString();
            
        while (true) {
            const response = await fetch(`${routeString}&per_page=${postsPerPage}&page=${currentPage}`);

            if (!response.ok) {
                console.error(`HTTP error! status: ${response.status}`);
                break;
            }

            fetchedThisPage = await response.json();
            fetchedPortfolioPosts.push(fetchedThisPage);
            currentPage++;
        }     
    };

    const displayPaginationLinks = async (pageNumber) => {
        console.log('buildPaginationLinks');
        console.log('fetchedPortfolioPosts.length');
        console.log(fetchedPortfolioPosts.length);
        paginationLinks.innerHTML = '';
        for (let i = 0; i < fetchedPortfolioPosts.length-1; i++) {
            const paginationButton = document.createElement('button');
            paginationButton.classList.add('pagination__button');
            paginationButton.classList.add('test');
            if (pageNumber == i+1){
                console.log('pageNumber == i');
                paginationButton.classList.add('pagination__button--active');
            }
            paginationButton.setAttribute('data-pagination-page-number', i+1);
            const paginationButtonText = document.createTextNode(i+1);
            paginationButton.appendChild(paginationButtonText);
            paginationLinks.appendChild(paginationButton);
        }
        addClickHandlersToPaginationLinks();        
    }

    const updatePaginationLinks = (clickedLinkNumber) => {
        console.log('clickedLinkNumber');
        console.log(clickedLinkNumber);
        const paginationLinks = document.querySelector('.pagination');
        console.log('paginationLinks');
        console.log(paginationLinks);
        const paginationLinkActive = paginationLinks.querySelector('.pagination__button--active');
        paginationLinkActive.classList.remove('pagination__button--active');
        // paginationLinks.forEach(paginationLink => {
        //     if (paginationLink.classList.contains('pagination__button--active')){
        //         paginationLink.classList.remove('pagination__button--active');
        //     }
        // }
        const padinationLinkToActivate = paginationLinks.querySelector(`.pagination__button:nth-child(${clickedLinkNumber})`);
        padinationLinkToActivate.classList.add('pagination__button--active');
    }

    const buildPortfolioPostsList = async (pageNumber = 0) => {
        postsList.innerHTML = '';
        fetchedPortfolioPosts[pageNumber].forEach(fetchedPortfolioPost => {
            const featuredImage = fetchedPortfolioPost._embedded['wp:featuredmedia'][0].source_url;
            const id = fetchedPortfolioPost.id;
            const link = fetchedPortfolioPost.link;
            const title = fetchedPortfolioPost.title.rendered;
            const categories = fetchedPortfolioPost['project-category'];
            const date = fetchedPortfolioPost['project-year'];
            const tags = fetchedPortfolioPost['project-tag'];
            createPostBox(link, title, categories, date, tags, featuredImage);
        });
    }

    const displayPortfolioPosts = async (pageNumber) => {
        if (fetchedPortfolioPosts.length === 0) {
            fetchPortfolioPosts()
                .then(() => {
                    console.log('Fetched');
                    buildPortfolioPostsList(pageNumber);
                    displayPaginationLinks(pageNumber);
                    console.log('fetchedPortfolioPosts');
            console.log(fetchedPortfolioPosts);
                });
        }

        if (fetchedPortfolioPosts.length != 0) {
            buildPortfolioPostsList(pageNumber);
            updatePaginationLinks(pageNumber);
        }
    }


    applyFiltersButton.addEventListener('click', () => {
        displayPortfolioPosts(0);
    })

    const toggleActive = (value) => {
        return value  == 'active' ? '' : 'active';
    }

    const allAtOnceFilters = document.querySelectorAll('[data-all-at-once-item]');
    allAtOnceFilters.forEach(allAtOnceFilter => {
        allAtOnceFilter.addEventListener('click', () => {
            allAtOnceFilter.classList.toggle('active');
            allAtOnceFilter.dataset.itemType = toggleActive(allAtOnceFilter.dataset.itemType);
            const parentComponentDiv = allAtOnceFilter.closest('[data-all-at-once]');
            activeItemsToComponentData(parentComponentDiv)
        })
    })

    expanders.forEach(expander => {
        expander.addEventListener('click', ()=>{
            expander.closest('.dropdown-checkboxes').classList.toggle('active');
        })
    });
})
