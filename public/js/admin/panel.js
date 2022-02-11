"use strict";

// Menu mobile open
let menu_panel_btn = document.querySelector(".menu");
let menu_items = document.querySelector(".menu-items");
let overlay = document.querySelector(".overlay");

menu_panel_btn.addEventListener("click", function (e) {
    menu_items.classList.remove("-translate-x-full");
    overlay.classList.remove("hidden");
    document.body.style.overflow = "hidden";
});

window.addEventListener('click',function(e){
    if(e.target.classList.contains('overlay')){
      overlay.classList.add("hidden");
      menu_items.classList.add("-translate-x-full");
      document.body.style.overflow = "auto";
    }
});
