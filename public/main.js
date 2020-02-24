(function () {
    let stripeBilling = {
        init : function () {
            this.form = $('#stripe-charge');
            this.submitButton = this.form.find('input[type=submit]');

            const stripeKey =  $('meta[name="publishable-key"]').attr('content');
            this.stripe = Stripe(stripeKey);
            let elements = this.stripe.elements();
            this.cardElement = elements.create('card');
            this.cardElement.mount('#card-element');
            this.bindEvents();
        },
        bindEvents : function () {
            this.form.on('submit',$.proxy(this.sendTokens,this));
        },
        sendTokens : function (event) {
            this.submitButton.val('One minute').prop('disabled',true);

            event.preventDefault();

            this.stripe.createToken(this.cardElement).then($.proxy(this.stripeResponseHandler,this));
        },
        stripeResponseHandler : function (result) {
            if(result.error){
               $('#card-error').text(result.error.message);
                return console.log(result.error);
            }
            this.form.unbind('submit');
            $('<input>',{
                type : 'hidden',
                name : 'stripeToken',
                value : result.token.id
            }).appendTo(this.form);
            this.form[0].submit();
        }

    };

    stripeBilling.init();

})();
