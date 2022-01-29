"use strict";

// Menu open dekstop/mobile

var menu_btn = document.querySelector(".menu");
var menu_item = document.querySelector(".menu-item");
var open_menu = (e) => {
    menu_item.classList.toggle("hidden");
};
menu_btn.addEventListener("click", open_menu);

// Close menu when click outside the target
window.addEventListener("click", function (e) {
    if (!e.target.parentElement.classList.contains("menu")) {
        menu_item.classList.add("hidden");
    }
});

//Navbar scroll
var bar = document.querySelector(".mobile-searchbar");
window.addEventListener("scroll", function (e) {
    const y = this.document.body.getBoundingClientRect().y;
    if (y < -30) {
        bar.classList.add("hidden");
    } else {
        bar.classList.remove("hidden");
    }
});

document.querySelectorAll(".menu").forEach(function (item) {
    item.addEventListener("click", open_menu);
    window.addEventListener("click", function (e) {
        if (!e.target === item.classList) {
            menu_item.classList.add("hidden");
        }
    });
});

// Vertical Navbar desktop
const vertical_nav_btn = document.querySelector(".vertical-nav-btn");
const vertical_nav_items = document.querySelector(".vertical-nav-items");
const vertical_nav_overlay = document.querySelector(".vertical-nav-overlay");
const close_vertical_nav = document.querySelector(".close-vertical-nav");

vertical_nav_btn.addEventListener("click", function (e) {
    vertical_nav_items.classList.remove("-translate-x-full");
    vertical_nav_overlay.classList.remove("hidden");
    document.body.style.overflow = "hidden";
});

close_vertical_nav.addEventListener("click", function (e) {
    vertical_nav_items.classList.add("-translate-x-full");
    vertical_nav_overlay.classList.add("hidden");
    document.body.style.overflow = "auto";
});

// Vertical Navbar mobile
const vertical_nav_btn_mob = document.querySelector(".vertical-nav-btn-mobile");
const vertical_nav_items_mob = document.querySelector(".vertical-nav-items-mobile");
const vertical_nav_overlay_mob = document.querySelector(".vertical-nav-overlay-mobile");
const close_vertical_nav_mob = document.querySelector(".close-vertical-nav-mobile");

vertical_nav_btn_mob.addEventListener("click", function (e) {
    vertical_nav_items_mob.classList.remove("-translate-x-full");
    vertical_nav_overlay_mob.classList.remove("hidden");
    document.body.style.overflow = "hidden";s
});

close_vertical_nav_mob.addEventListener("click", function (e) {
    vertical_nav_items_mob.classList.add("-translate-x-full");
    vertical_nav_overlay_mob.classList.add("hidden");
    document.body.style.overflow = "auto";
});

window.addEventListener('click',function(e){
    if(e.target.classList.contains('vertical-nav-overlay')){
      vertical_nav_overlay.classList.add("hidden");
      vertical_nav_items.classList.add("-translate-x-full");
      document.body.style.overflow = "auto";
    }
    if(e.target.classList.contains('vertical-nav-overlay-mobile')){
      vertical_nav_overlay_mob.classList.add("hidden");
      vertical_nav_items_mob.classList.add("-translate-x-full");
      document.body.style.overflow = "auto";
    }
});