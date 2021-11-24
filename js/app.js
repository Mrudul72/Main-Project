
//sidebar selctions
const nav= document.querySelectorAll('.nav');
const nav_icons= document.querySelector('.svgClass');
const navItems= document.querySelectorAll('.nav-items');
const active_nav = document.querySelector('.active-nav');

window.addEventListener('load',() => {
    active_nav.querySelector('.svgClass').contentDocument.getElementById( 'svgInternalID' ).style.fill = '#fff';
});
// for(let i=0; i<navItems.length; i++){
//     navItems[i].addEventListener('click', function(){
//         for(let j=0; j<navItems.length; j++){
//             //remove active class from all nav items
//             navItems[j].classList.remove('active-nav');
//             navItems[j].querySelector('.svgClass').contentDocument.getElementById( 'svgInternalID' ).style.fill = '#A4AFB4';
//         }
//         //add active class to clicked nav item and change the color of the icon
//         this.classList.add('active-nav');
//         navItems[i].querySelector('.svgClass').contentDocument.getElementById( 'svgInternalID' ).style.fill = '#fff';
//     });
// }


//tabs selections
// const tablinks= document.querySelectorAll('.tablinks');
// const divider= document.querySelectorAll('.divider');
// const active_tab = document.querySelector('.active-tab');

// for(let i=0; i<tablinks.length; i++){
//     tablinks[i].addEventListener('click', function(){
//         for(let j=0; j<tablinks.length; j++){
//             //remove active class from all tablinks
//             tablinks[j].classList.remove('active-tab');
//         }
//         //add active class to clicked tablinks
//         this.classList.add('active-tab');
//         if(this.id=='tab1'){
//             divider[0].classList.add('active-divider');
//             divider[1].classList.remove('active-divider');
//         }
//         else if(this.id=='tab2'){
//             divider[0].classList.add('active-divider');
//             divider[1].classList.add('active-divider');
//         }
//         else if(this.id=='tab3'){
//             divider[0].classList.remove('active-divider');
//             divider[1].classList.add('active-divider');
//         }
        
//     });
// }

    




   //duplicate div in modal box
    
   const addBtn = document.getElementById('addBtn');
   let i = 1;
   let j = 1;
   let original = document.getElementById('duplicater');
   addBtn.addEventListener('click', function() {
       let clone = original.cloneNode(true); // "deep" clone
       clone.id = "duplicater" + ++i;
       clone.querySelector('#pro-team1').id = "pro-team" + ++j;
       // or clone.id = ""; if the divs don't need an ID
       original.parentNode.appendChild(clone);
       clone.querySelector('#addBtn').style.display = 'none';
       clone.querySelector('#delBtn').style.display = 'block';
       clone.querySelector('#delBtn').addEventListener('click', function() {
            i--;
            j--;
           original.parentNode.removeChild(clone);
       });
       document.querySelector('#assign-count').value = j;
   });


  




