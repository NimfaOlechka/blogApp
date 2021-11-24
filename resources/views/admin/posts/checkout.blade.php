
<x-layout> 
    <section class="px-6 py-8">
        <main>               
            <div>Payment</div>
            <div>
                <a href="#">
                    try me!                       
                </a>
            </div>
            <form method="POST" action="{{ route('charge') }}" class="card-form mt-3 mb-3">
                @csrf
                <input type="hidden" name="payment_method" class="payment-method">
                <input class="StripeElement mb-3" name="card_holder_name" placeholder="Card holder name" required>
                <div class="col-lg-4 col-md-6">
                    <div id="card-element"></div>
                </div>
                <div id="card-errors" role="alert"></div>
                <div class="form-group mt-3">
                    <button type="submit" data-secret="{{ $intent->client_secret }}" class="btn btn-primary pay">
                        Purchase
                    </button>
                </div>
            </form>
        </main> 
        @section('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            let stripe = Stripe("{{ env('STRIPE_KEY') }}")
            let elements = stripe.elements()
            let style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            }
            let card = elements.create('card', {style: style})
            const clientSecret = cardButton.dataset.secret;
            card.mount('#card-element')
            let paymentMethod = null
            $('.card-form').on('submit', function (e) {
                $('button.pay').attr('disabled', true)
                if (paymentMethod) {
                    return true
                }
                stripe.confirmCardSetup(
                    "{{ $intent->client_secret }}",
                    {
                        payment_method: {
                            card: card,
                            billing_details: {name: $('.card_holder_name').val()}
                        }
                    }
                ).then(function (result) {
                    if (result.error) {
                        $('#card-errors').text(result.error.message)
                        $('button.pay').removeAttr('disabled')
                    } else {
                        paymentMethod = result.setupIntent.payment_method
                        $('.payment-method').val(paymentMethod)
                        $('.card-form').submit()
                    }
                })
                return false
            })
        </script>
    </section>
</x-layout>