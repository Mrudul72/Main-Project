let btn = document.querySelectorAll(".next");
let line1 = document.querySelector(".line");
let line2 = document.querySelector(".line2");
let back = document.querySelectorAll(".back-btn");

btn.forEach((item) => {
  item.addEventListener("click", function () {
    
    if (item==btn[0]) {
      line1.classList.add("active-line");
      line2.classList.remove("active-line");
    }
    if (item==btn[1]) {
      line2.classList.add("active-line");
    }
    let current = document.querySelector(".active-frm");
    let next = current.nextElementSibling;

    let currentBubble = document.querySelector(".selected");
    let nextBubble = currentBubble.nextElementSibling;

    current.classList.remove("active-frm");
    next.classList.add("active-frm");

    currentBubble.classList.remove("selected");
    nextBubble.classList.add("active-bubble");
    nextBubble.classList.add("selected");
  });
});

back.forEach((itemB) => {
  itemB.addEventListener("click", function () {

    if (itemB==back[0]) {
      line1.classList.remove("active-line");
      line2.classList.remove("active-line");
    }
    if (itemB==back[1]) {
      line2.classList.remove("active-line");
    }
    let current = document.querySelector(".active-frm");
    let prev = current.previousElementSibling;

    let currentBubble = document.querySelector(".selected");
    let prevBubble = currentBubble.previousElementSibling;

    current.classList.remove("active-frm");
    prev.classList.add("active-frm");

    currentBubble.classList.remove("selected");
    currentBubble.classList.remove("active-bubble");
    prevBubble.classList.add("selected");


  });
});