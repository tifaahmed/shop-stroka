@extends('layout')

@section('title')
	<title> بيانات البطاقة</title>
@endsection


@section('css')
<style type="text/css">
		/**
		 * The CSS shown here will not be introduced in the Quickstart guide, but shows
		 * how you can use CSS to style your Element's container.
		 */
		.StripeElement {
		  box-sizing: border-box;

		  height: 40px;

		  padding: 10px 12px;

		  border: 1px solid transparent;
		  border-radius: 4px;
		  background-color: white;

		  box-shadow: 0 1px 3px 0 #e6ebf1;
		  -webkit-transition: box-shadow 150ms ease;
		  transition: box-shadow 150ms ease;
		}

		.StripeElement--focus {
		  box-shadow: 0 1px 3px 0 #cfd7df;
		}

		.StripeElement--invalid {
		  border-color: #fa755a;
		}

		.StripeElement--webkit-autofill {
		  background-color: #fefde5 !important;
		}
	</style>
@endsection

@section('content')
    @include('pages.partials.header')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 	
	<script src="https://js.stripe.com/v3/"></script>

	<form action="{{asset('charge')}}" method="post" id="payment-form">
		           {{ csrf_field() }}
	  <div class="form-row" style="text-align:center;">
	    <label for="card-element" >
		بطاقة الائتمان	    
		</label>
	    <div id="card-element">
	      <!-- A Stripe Element will be inserted here. -->
	    </div>

	    <!-- Used to display form errors. -->
	    <div id="card-errors" role="alert"></div>
	  </div>
<br><br>
	  <button style="    margin: auto;">ارسال بيانات الدفع</button>
	</form>



	<script type="text/javascript">
		// Create a Stripe client.
		var stripe = Stripe('pk_test_51HTkL9GqvNpJ2kHqBfc1dS6lutnqXtcuq1qr7WAAjokK7vArCWwd4ZB0Do82ptmkv9nDIKwAjQ9AXaMy0qvvwI98002t44QEX0');

		// Create an instance of Elements.
		var elements = stripe.elements();

		// Custom styling can be passed to options when creating an Element.
		// (Note that this demo uses a wider set of styles than the guide below.)
		var style = {
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
		};

		// Create an instance of the card Element.
		var card = elements.create('card', {style: style});

		// Add an instance of the card Element into the `card-element` <div>.
		card.mount('#card-element');

		// Handle real-time validation errors from the card Element.
		card.on('change', function(event) {
		  var displayError = document.getElementById('card-errors');
		  if (event.error) {
		    displayError.textContent = event.error.message;
		  } else {
		    displayError.textContent = '';
		  }
		});

		// Handle form submission.
		var form = document.getElementById('payment-form');
		form.addEventListener('submit', function(event) {
		  event.preventDefault();

		  stripe.createToken(card).then(function(result) {
		    if (result.error) {
		      // Inform the user if there was an error.
		      var errorElement = document.getElementById('card-errors');
		      errorElement.textContent = result.error.message;
		    } else {
		      // Send the token to your server.
		      stripeTokenHandler(result.token);
		    }
		  });
		});

		// Submit the form with the token ID.
		function stripeTokenHandler(token) {
		  // Insert the token ID into the form so it gets submitted to the server
		  var form = document.getElementById('payment-form');
		  var hiddenInput = document.createElement('input');
		  hiddenInput.setAttribute('type', 'hidden');
		  hiddenInput.setAttribute('name', 'stripeToken');
		  hiddenInput.setAttribute('value', token.id);
		  form.appendChild(hiddenInput);

		  // Submit the form
		  form.submit();
		}
	</script>
<br>
<br>
<br>
<br>

	    @include('pages.partials.footer')
    @include('pages.partials.side1')
    @include('pages.partials.side2')
    @include('vendor.flashy.message')
@endsection         
