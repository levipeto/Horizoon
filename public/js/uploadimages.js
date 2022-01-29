"use strict";

const temp_images_gallery = document.querySelector(".upload-images-gallery");
const temp_images = document.querySelector(".temp-images");

const initApp = () => {
    const drop_area = document.querySelector(".drop-area");
    const active = () => {
        drop_area.classList.add("border-purple-400");
    };
    const inactive = () => {
        drop_area.classList.remove("border-purple-400");
    };
    const prevents = (e) => e.preventDefault();

    ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
        drop_area.addEventListener(eventName, prevents);
    });

    ["dragenter", "dragover"].forEach((eventName) => {
        drop_area.addEventListener(eventName, active);
    });

    ["dragleave", "drop"].forEach((eventName) => {
        drop_area.addEventListener(eventName, inactive);
    });

    drop_area.addEventListener("drop", handleDrop);
};

document.addEventListener("DOMContentLoaded", initApp);

const handleDrop = (e) => {
    const dt = e.dataTransfer;
    const files = dt.files;
    const fileArr = [...files];

    temp_images_gallery.classList.remove("hidden");
    temp_images.textContent = fileArr.length + " images ";

    console.log(fileArr);
};

$.ajax({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: "/add-product/store",
    method: "POST",
    data: "hello from ajax call",
    success: function (response) {
        console.log(response);
    },
});
