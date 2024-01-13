document.addEventListener('DOMContentLoaded', function(){
    const mainMenuItemHasChildren = document.querySelectorAll('.main-nav__has-children');
    const coveringLayer = document.querySelector('.covering-layer');
    const hamburger = document.getElementById('main-nav__hamburger');

    if (mainMenuItemHasChildren.length){
        mainMenuItemHasChildren.forEach(itemHasChildren=>{
            itemHasChildren.addEventListener('mouseover', function(event){
                if(!coveringLayer.classList.contains('active')){
                    coveringLayer.classList.add('active');
                }
            })
            itemHasChildren.addEventListener('mouseout', function(event){
                console.log(itemHasChildren.matches(':hover'))
                if(coveringLayer.classList.contains('active')){
                    coveringLayer.classList.remove('active');
                }
            })
        })
    }

    console.log(hamburger)

    hamburger.addEventListener('click', function(){
        hamburger.classList.toggle('active');
    })

    console.log(mainMenuItemHasChildren)    
});
