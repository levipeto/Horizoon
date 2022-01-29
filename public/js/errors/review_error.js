let modal = document.querySelector(".review-error");
let nav = document.querySelector("nav");
let btn_close = document.querySelector(".close-btn");

modal.classList.remove("hidden");
// nav.classList.add("hidden");
document.body.style.overflow = "hidden";

btn_close.addEventListener("click", function (e) {
    modal.classList.add("hidden");
    // nav.classList.remove("hidden");
    document.body.style.overflow = "visible";
});

window.addEventListener("click", function (e) {
    if (e.target.classList.contains("review-error")) {
        modal.classList.add("hidden");
        // nav.classList.remove("hidden");
        document.body.style.overflow = "visible";
    }
});
