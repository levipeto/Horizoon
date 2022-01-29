var stripe = Stripe(paymentConfig.publicKey);
var elements = stripe.elements({ locale: "it" });
var style = {
    base: {
        color: "#32325d",
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: "antialiased",
        fontSize: "16px",
        "::placeholder": {
            color: "#aab7c4",
        },
    },
    invalid: {
        color: "#fa755a",
        iconColor: "#fa755a",
    },
};

var card = elements.create("card", { style: style });
card.mount("#card-element");

card.addEventListener("change", function (error) {
    var displayError = document.getElementById("card-errors");
    if (error) {
        displayError.textContent = error.message;
    } else {
        displayError.textContent = "";
    }
});
