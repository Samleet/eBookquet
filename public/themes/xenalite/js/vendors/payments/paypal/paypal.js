var payWithPayPal = function (i,o){
    $('#paypal-button').empty(   );
    const close = () => $('#paypal-button') != undefined ? $('#paypal-button').removeClass('show') : 0 ;
    
    paypal.Buttons ({
        locale: 'en_US',
        commit: true,
        env: 'sandbox',
        client: {
            sandbox: 'AdsgZcDbCfi4kmY1Fw7sznmCoBF6s0RJU87JM9yvAaJ7yPfcz-XU3SOx8oSYZ9LsuVi4Q1Cf2iVOfUxZ',
            production: ''
        },
        style: {
            size: 'responsive',
            color: 'gold',
            shape: 'rect',
            label: 'paypal',
            height: 40,
            tagline: false,
            layout: 'horizontal'
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: i.amount,
                        currency: i.currency
                    }
                }]
            });
        },
        onApprove  : function(data, actions) {
            return actions.order.capture().then(function(details) { ///////////////////////////////////
                close();
                return o(details) ;

                /*

                alert('Transaction completed successfully by ' + details.payer.name.given_name + '!' );

                */
            });
        },
        onCancel   : function(data, options) {

            close();

          }
    }).render('#paypal-button');
}