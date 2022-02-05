$("#payment-form").on("submit", function (e) {
    // e.preventDefault();
    $.post("/stripe/{total}", $(this).serialize(), function (response) {
        stripe
            .confirmCardPayment(response.secret, {
                payment_method: {
                    card: card,
                },
            })
            .then(function (result) {
                if (result.error) {
                    console.log(result.error);
                } else {
                    if (result.paymentIntent.status === "succeeded") {
                        console.log('payment effectuated');
                    } else {
                        console.log("payment failed");
                    }
                }
            });
    });
});
