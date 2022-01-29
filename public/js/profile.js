"use strict";

const btn_name = document.querySelector(".edit-item-btn-name");
const btn_email = document.querySelector(".edit-item-btn-email");
const btn_password = document.querySelector(".edit-item-btn-password");
const btn_address = document.querySelector(".edit-item-btn-address");
const btn_city = document.querySelector(".edit-item-btn-city");
const btn_phone = document.querySelector(".edit-item-btn-phone");

const container_name = document.querySelector(".edit-container-name");
const container_email = document.querySelector(".edit-container-email");
const container_password = document.querySelector(".edit-container-password");
const container_address = document.querySelector(".edit-container-address");
const container_city = document.querySelector(".edit-container-city");
const container_phone = document.querySelector(".edit-container-phone");

btn_name.addEventListener("click", function () {
    container_name.classList.toggle("hidden");
});
btn_email.addEventListener("click", function () {
    container_email.classList.toggle("hidden");
});
btn_password.addEventListener("click", function () {
    container_password.classList.toggle("hidden");
});
btn_address.addEventListener("click", function () {
    container_address.classList.toggle("hidden");
});
btn_phone.addEventListener("click", function () {
    container_phone.classList.toggle("hidden");
});
btn_city.addEventListener("click", function () {
    container_city.classList.toggle("hidden");
});
