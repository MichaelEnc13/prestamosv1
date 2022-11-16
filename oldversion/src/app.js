function init() {

    var data = {
        "uid": $(".user").attr("id"),
        "getData": true
    }

    $.get("controller/user.actions.php", data,
        function(data) {
            var json = JSON.parse(data);

            sessionStorage.setItem("dtp", json.amount)

        }

    );

}



function readData() {
    return sessionStorage.getItem("dtp");
}
init()


if (typeof(paypal) != "undefined") {
    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.


            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: readData()
                    }
                }]

            });



        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.


                $.get("controller/user.actions.php?access",
                    function(data) {

                        if (data == 1) {
                            swal("Pago realizado!", "Gracias por utilizar DOTSELL", "success")
                                .then(() => {
                                    location.reload()
                                });
                        }

                    }

                );


            });
        },
        onCancel: function(data) {
            swal("Pago Cancelado", "Se pudo procesar el pago.", "info")
        }

    }).render('#paypal-button-container');
    // This function displays Smart Payment Buttons on your web page.
}