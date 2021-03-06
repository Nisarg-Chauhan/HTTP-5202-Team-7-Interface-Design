paypal
  .Buttons({
    createOrder: function (data, actions) {
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: "0.1",
            },
          },
        ],
      });
    },
    onApprove: function (data, actions) {
      return actions.order.capture().then(function (details) {
        console.log(details);
        window.location.replace(
          "http://localhost/HTTP-5202-Team-7-Your-Wellbeing-Project-/Products/orders-update.php"
        );
      });
    },
    onCancel: function (data) {
      window.location.replace(
        "http://localhost/HTTP-5202-Team-7-Your-Wellbeing-Project-/Products/orders-update.php"
      );
    },
  })
  .render("#paypal-payment-button");
