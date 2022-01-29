"use strict";

let menu_panel_btn = document.querySelector(".menu");
let menu_items = document.querySelector(".menu-items");

menu_panel_btn.addEventListener("click", function (e) {
    menu_items.classList.toggle("hidden");
});

window.addEventListener("click", function (e) {
    if (!e.target.parentElement.classList.contains("menu")) {
        menu_items.classList.add("hidden");
    }
});
