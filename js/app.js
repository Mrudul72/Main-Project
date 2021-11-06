//sidebar selctions
const nav= document.querySelectorAll('.nav');
const nav_icons= document.querySelector('.svgClass');
const navItems= document.querySelectorAll('.nav-items');
for(let i=0; i<navItems.length; i++){
    navItems[i].addEventListener('click', function(){
        for(let j=0; j<navItems.length; j++){
            //remove active class from all nav items
            navItems[j].classList.remove('active-nav');
            navItems[j].querySelector('.svgClass').contentDocument.getElementById( 'svgInternalID' ).style.fill = '#A4AFB4';
        }
        //add active class to clicked nav item and change the color of the icon
        this.classList.add('active-nav');
        navItems[i].querySelector('.svgClass').contentDocument.getElementById( 'svgInternalID' ).style.fill = '#fff';
        
    });
}

