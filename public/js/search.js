var search_input = document.querySelector(".search-bar");
var items_data = document.querySelector(".items-data");
var items = document.querySelector(".search-items");
var overlay = document.querySelector(".overlay");

var search_input_mobile = document.querySelector(".search-bar-mob");
var items_mobile = document.querySelector(".search-items-mob");

// Dekstop
search_input.addEventListener("keypress", function (e) {
    items.classList.remove("hidden");
    overlay.classList.remove("hidden");
});

search_input.addEventListener("focusout", function (e) {
    search_input.value = "";
    overlay.classList.add("hidden");
});

// Mobile
search_input_mobile.addEventListener("focusin", function (e) {
    items_mobile.classList.remove("hidden");
    overlay.classList.remove("hidden");
});

search_input_mobile.addEventListener("focusout", function (e) {
    search_input_mobile.value = "";
    overlay.classList.add("hidden");
});

window.addEventListener("click", function (e) {
    if (!e.target.classList.contains("search-bar"))
        items.classList.add("hidden");
    if (!e.target.classList.contains("search-bar-mob"))
        items_mobile.classList.add("hidden");
});

/**
 * dekstop
 */
$(document).ready(function () {
    $("#search").on("keyup", function () {
        let query = $(this).val();
        let filter_type = $('#search-filter').val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/search",
            enctype: "multipart/form-data",
            type: "GET",
            data: { search: query, filter:filter_type }, 
            success: function (data) {
                $("#search-items").html(data);
                console.log(data);
            },
            error: function (err) {
                console.log("Error: " + err.status);
            },
        }).done(() => {
            window.addEventListener("click", function (e) {
                $("#search-items").empty();
            });
        });
    });
});

// Mobile
$(document).ready(function () {
    $("#search-mob").on("keyup", function () {
        let query = $(this).val();
        let filter_type = $('#search-filter').val();
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "/search",
            enctype: "multipart/form-data",
            type: "GET",
            data: { search: query,filter:filter_type },
            success: function (data) {
                $("#search-items-mob").html(data);
            },
            error: function () {
                console.log("There some errore here");
            },
        }).done(() => {
            window.addEventListener("click", function (e) {
                $("#search-items-mob").empty();
            });
        });
    });
});
