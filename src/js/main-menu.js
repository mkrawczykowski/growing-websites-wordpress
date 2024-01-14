document.addEventListener('DOMContentLoaded', function(){
    const mainNav = document.querySelector('.main-nav');
    const mainMenuItemHasChildren = document.querySelectorAll('.main-nav__has-children');
    const megaMenuPanelsBack = document.querySelectorAll('.mega-menu-panel-back');
    const coveringLayer = document.querySelector('.covering-layer');
    const hamburger = document.getElementById('main-nav__hamburger');

    if (mainMenuItemHasChildren.length){
        mainMenuItemHasChildren.forEach(itemHasChildren=>{
            itemHasChildren.addEventListener('mouseover', function(event){
                if(!coveringLayer.classList.contains('active')){
                    if (window.innerWidth > 1024){
                        coveringLayer.classList.add('active');
                    }
                    
                    itemHasChildren.classList.add('active');
                }
            })
            itemHasChildren.addEventListener('mouseout', function(event){
                if(coveringLayer.classList.contains('active')){
                    if (window.innerWidth > 1024){
                        coveringLayer.classList.remove('active');
                    }
                    itemHasChildren.classList.remove('active');
                }
            })
        })
    }

    hamburger.addEventListener('click', function(){
        hamburger.classList.toggle('active');
        mainNav.classList.toggle('active');

        mainMenuItemHasChildren.forEach(itemHasChildren=>{
            itemHasChildren.classList.remove('active');
        })
    })

    megaMenuPanelsBack.forEach(megaMenuPanelBack => {
        megaMenuPanelBack.addEventListener('click', ()=>{
            const closestParentListItem = megaMenuPanelBack.closest('.main-nav__list-item');
            console.log(closestParentListItem)
            closestParentListItem.classList.remove('active');
            closestParentListItem.blur();
        })
    })

    console.log(mainMenuItemHasChildren)    
});
