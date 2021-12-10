
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

    

const addBtn1 = document.getElementById('addBtn1');
   let m = 1;
   let n = 1;
   let original1 = document.getElementById('duplicater1');
   addBtn1.addEventListener('click', function() {
       let clone1 = original1.cloneNode(true); // "deep" clone
       clone1.id = "duplicater1" + ++m;
       clone1.querySelector('#team-member1').id = "team-member" + ++n;
       // or clone.id = ""; if the divs don't need an ID
       original1.parentNode.appendChild(clone1);
       clone1.querySelector('#addBtn1').style.display = 'none';
       clone1.querySelector('#delBtn1').style.display = 'block';
       clone1.querySelector('#delBtn1').addEventListener('click', function() {
            m--;
            n--;
           original1.parentNode.removeChild(clone1);
       });
       document.querySelector('#member-count').value = n;
   });

   const addBtn2 = document.getElementById('addBtn2');
   let k = 1;
   let l = 1;
   let original2 = document.getElementById('duplicater2');
   addBtn2.addEventListener('click', function() {
       let clone2 = original2.cloneNode(true); // "deep" clone
       clone2.id = "duplicater2" + ++k;
       clone2.querySelector('#invite-member1').id = "invite-member" + ++l;
       // or clone.id = ""; if the divs don't need an ID
       original2.parentNode.appendChild(clone2);
       clone2.querySelector('#addBtn2').style.display = 'none';
       clone2.querySelector('#delBtn2').style.display = 'block';
       clone2.querySelector('#delBtn2').addEventListener('click', function() {
            k--;
            l--;
           original2.parentNode.removeChild(clone2);
       });
       document.querySelector('#invite-count').value = l;
   });


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



   

   

  




