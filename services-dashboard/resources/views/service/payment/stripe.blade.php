@extends('layouts.app')

@section('title', 'Payment')

@section('content')
    <div class="div-info">
        <h1>Payment</h1>
        <h2>Hello, {{ Auth::user()->name }}</h2>
    </div>
    <div>
        Price: <h3><strong>€{{ $contract->cost }}</strong></h3>
        <div class="container">
            <h3 class="panel-title display-td" >Payment Details</h3>
            @if ($message = Session::get('success'))
                <div class="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <form role="form" action="{{ route('stripe.post') }}" method="post" data-cc-on-file="false"
            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
            @csrf
            <input type="number" name="amount" readonly hidden value="{{ $contract->cost }}">
            <input type="number" name="user" readonly hidden value="{{ Auth::user()->id }}">
            <input type="number" name="contract" readonly hidden value="{{ $contract->id }}">
                <div>
                    <label >Name on Card</label>
                    <br>
                    <input size='4' type='text'>
                </div>
                <div>
                    <label class='control-label'>Card Number</label>
                    <br>
                    <input autocomplete='off' size='20' type='text'>
                </div>
                <div>
                    <label >CVC</label>
                    <br>
                    <input autocomplete='off'placeholder='ex. 311' size='4' type='text'>
                </div>
                <div>
                    <label >Expiration Month</label>
                    <br>
                    <input placeholder='MM' size='2' type='text'>
                </div>
                <div>
                    <label >Expiration Year</label>
                    <br>
                    <input placeholder='YYYY' size='4' type='text'>
                </div>
                <button type="submit">Pay Now (€{{ $contract->cost }})</button>
            </form>


            <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
            <script type="text/javascript">
                $(function() {
                var $form = $(".require-validation");
                $('form.require-validation').bind('submit', function(e) {
                    var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                    $errorMessage.addClass('hide');
                    $('.has-error').removeClass('has-error');
                    $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                    }
                });
                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                    } else {
                        /* token contains id, last4, and card type */
                        var token = response['id'];
                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }
            });
            </script>
    </div>
@endsection

<style scoped>


</style>
