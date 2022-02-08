// $("#payment-form").on("submit", function (e) {
//     // e.preventDefault();
//     var pay_btn = document.getElementById('pay');
//     $.post("/stripe/{total}", $(this).serialize(), function (response) {
//         stripe
//             .confirmCardPayment(response.secret, {
//                 payment_method: {
//                     card: card,
//                 },
//             })
//             .then(function (result) {
//                 if (result.error) {
//                     console.log(result.error);
//                 }
//                 pay_btn.classList.remove('opacity-30');
//             });
//     });
// });
