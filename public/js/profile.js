"use strict";

// Live image uploading
const current_img = document.getElementById("preview-img").src;
const input_file = document.getElementById("upload-photo");
const input_file_btn = document.getElementById("upload-photo-btn");
const confirm_btn = document.getElementById("confirm-photo-btn");
const cancel_btn = document.getElementById("cancel-photo-btn");
const show_img_btn = document.querySelector(".profile-image-btn");
const show_img = document.querySelector(".profile-image-container");

input_file_btn.addEventListener("change", function (e) {
    if (e.target.files.length > 0) {
        var src = URL.createObjectURL(e.target.files[0]);
        var preview = document.getElementById("preview-img");
        preview.src = src;
        input_file_btn.style.display = "none";
        confirm_btn.style.display = "block";
        cancel_btn.style.display = "block";
        console.log(e.target.files);
    }
});

cancel_btn.addEventListener("click", function (e) {
    e.preventDefault();
    var preview = document.getElementById("preview-img");
    confirm_btn.style.display = "none";
    cancel_btn.style.display = "none";
    input_file_btn.style.display = "block";
    preview.src = current_img;
});

// Show image

show_img_btn.addEventListener("click", function (e) {
    e.preventDefault();
    show_img.classList.remove("hidden");
    document.body.style.overflow = "hidden";
});

window.addEventListener("click", function (e) {
    if (e.target.classList.contains("overlay")) {
        show_img.classList.add("hidden");
        document.body.style.overflow = "auto";
    }
});
