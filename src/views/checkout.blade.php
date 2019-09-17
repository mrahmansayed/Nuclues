@extends('nuclues::frontend.layouts.app')

@section('content')
<script src="https://js.stripe.com/v3/"></script>
	<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Checkout</h1>

					<!--=======  breadcrumb list  =======-->
					
						<ul class="breadcrumb-list">
							<li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
							<li class="breadcrumb-list__item breadcrumb-list__item--active">checkout</li>
						</ul>
					
					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>
	
    <!--=======  End of breadcrumb area =======-->
    
    <!--=============================================
	=            checkout page content         =
	=============================================-->
	
	<div class="checkout-page-area mb-130">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="lezada-form">
						<!-- Checkout Form s-->
						<form action="{{ route('order') }}" method="POST" id="payment-form">
											@csrf
							<div class="row row-40">
								
								<div class="col-lg-7 mb-20">
									
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Billing Address</h4>
										
										<div class="row">
		
											<div class="col-md-6 col-12 mb-20">
												<label>First Name*</label>
												<input type="text" placeholder="First Name" name="first_name">
											</div>
		
											<div class="col-md-6 col-12 mb-20">
												<label>Last Name*</label>
												<input type="text" placeholder="Last Name" name="last_name">
											</div>
		
											<div class="col-md-6 col-12 mb-20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address" name="email">
											</div>
		
											<div class="col-md-6 col-12 mb-20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number" name="phone">
											</div>
		
											
		
											<div class="col-12 mb-20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1" name="address">
												
											</div>
		
											<div class="col-md-6 col-12 mb-20">
												<label>Country*</label>
												<select class="nice-select" name="country">
													<option>Bangladesh</option>
													<option>China</option>
													<option>country</option>
													<option>India</option>
													<option>Japan</option>
												</select>
											</div>
		
											<div class="col-md-6 col-12 mb-20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City" name="city">
											</div>
		
											<div class="col-md-6 col-12 mb-20">
												<label>State*</label>
												<input type="text" placeholder="State" name="state">
											</div>
		
											<div class="col-md-6 col-12 mb-20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code" name="postal_code">
											</div>
		
											<div class="col-12 mb-20">
												<div class="check-box">
													<input type="checkbox" id="create_account">
													<label for="create_account">Create an Acount?</label>
												</div>
												
											</div>
											
											
										</div>
										
									</div>
									
									
									
								</div>
								
								<div class="col-lg-5">
									<div class="row">
										
										<!-- Cart Total -->
										<div class="col-12 mb-60">
										
											<h4 class="checkout-title">Cart Total</h4>
									
											<div class="checkout-cart-total">
		
												<h4>Product <span>Total</span></h4>
												
												
												<ul>
													@foreach(Cart::get() as $product)
													<li>{{ $product['title'] }} X {{ $product['qty'] }} <span>{{ Currencies::symbol() }}{{ $product['price'] }}</span></li>
													@endforeach
													
												</ul>
												
												<p>Sub Total <span>{{ Cart::subtotal() }}</span></p>
												<p>Shipping Fee <span>$00.00</span></p>
												
												<h4>Grand Total <span>{{ Cart::total() }}</span></h4>
												
											</div>
											
										</div>
										
										<!-- Payment Method -->
										<div class="col-12">
										
											<h4 class="checkout-title">Payment Method</h4>
									
											<div class="checkout-payment-method">
												
												<div class="single-method">
													
													<p data-method="check">
														
														      <div class="form-group">
														        <label>Name</label>
														        <input type="text" name="name_on_card" placeholder="name" value="" id="name_on_card" class="form-control">
														        </div>
														        <label for="card-element">
														          Credit or debit card
														        </label>
														        <div id="card-element">
														          <!-- A Stripe Element will be inserted here. -->
														        </div>
														        <br>
														        <!-- Used to display form errors. -->
														        <div id="card-errors" role="alert"></div>
														    
														      
														 

														   

													</p>
												</div>
												
												
												
												
												
											</div>
											
											<button  class="lezada-button lezada-button--medium mt-30">Place order</button>
											
										</div>
										
									</div>
								</div>
								
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of checkout page content  ======-->

@endsection

@push('js')
	 <script>
	  // Create a Stripe client.
	  var stripe = Stripe('pk_test_l6xvZSKHcRSSHuX8XgWArg6100BplGa7q6');

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
	  var card = elements.create('card', {
	    style: style,
	    hidePostCode: true
	  });

	  // Add an instance of the card Element into the `card-element` <div>.
	  card.mount('#card-element');

	  // Handle real-time validation errors from the card Element.
	  card.addEventListener('change', function(event) {
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

	      var options = {
	            name: document.getElementById('name_on_card').value
	          }

	    stripe.createToken(card,options).then(function(result) {
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

@endpush