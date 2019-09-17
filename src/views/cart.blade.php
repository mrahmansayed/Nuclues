@extends('nuclues::frontend.layouts.app')

@section('content')
<!--=======  breadcrumb area =======-->

	<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Shopping Cart</h1>

					<!--=======  breadcrumb list  =======-->
					
						<ul class="breadcrumb-list">
							<li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
							<li class="breadcrumb-list__item breadcrumb-list__item--active">shopping cart</li>
						</ul>
					
					<!--=======  End of breadcrumb list  =======-->
					
				</div>
			</div>
		</div>
	</div>
	
    <!--=======  End of breadcrumb area =======-->
    
    <!--=============================================
	=            cart page content         =
	=============================================-->
	{{ Session()->get('auth') }}
	<div class="shopping-cart-area mb-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<!--=======  cart table  =======-->
					{{-- {{ dd(Session()->get('cart')) }} --}}
					<div class="cart-table-container">
						<table class="cart-table">
							<thead>
								<tr>
									<th class="product-name" colspan="2">Product</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-subtotal">Total</th>
									<th class="product-remove">&nbsp;</th>
								</tr>
							</thead>
				
							<tbody>
								@if(Cart::has())
								@foreach(Cart::get() as $product)
								<tr>
									<td class="product-thumbnail">
										<a href="shop-product-basic.html">
											<img src="{{ asset('product/'.$product['image']) }}" class="img-fluid" alt="">
										</a>
									</td>
									<td class="product-name">
										<a href="shop-product-basic.html">{{ $product['title'] }}</a>
										<span class="product-variation">Color: {{-- {{ $product['color'] }} --}}</span>
									</td>

									<td class="product-price"><span class="price">{{ $product['price'] }}</span></td>

									<td class="from-group">
										<div class="mx-0">
											{{-- <input type="text" value="{{ $product['id'] }}" id="qty"> --}}

											<select class="form-control qty" id="{{ $product['id'] }}">
												<option 
				                                @if ( $product['qty'] == '1') 
				                                selected=selected

				                                @endif
                                 					value="1">1</option>
												<option  @if ( $product['qty'] == '2') 
				                                selected=selected

				                                @endif value="2">2</option>
												<option @if ( $product['qty'] == '3') 
				                                selected=selected

				                                @endif  value="3">3</option>
												<option @if ( $product['qty'] == '4') 
				                                selected=selected

				                                @endif  value="4">4</option>
												<option @if ( $product['qty'] == '5') 
				                                selected=selected

				                                @endif  value="5">5</option>
												<option @if ( $product['qty'] == '6') 
				                                selected=selected

				                                @endif  value="6">6</option>
											</select>
										</div>
									</td>

									<td class="total-price"><span class="price ed">{{ $product['total'] }}</span></td>

									<td class="product-remove">
										<a href="{{ route('cart.remove',$product['id']) }}">
											<i class="ion-android-close"></i>
										</a>
									</td>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
					</div>
					
					<!--=======  End of cart table  =======-->
				</div>
				<div class="col-lg-12 mb-80">
					<!--=======  coupon area  =======-->
					
					<div class="cart-coupon-area pb-30">
						<div class="row align-items-center">
							<div class="col-lg-6 mb-md-30 mb-sm-30">
								<!--=======  coupon form  =======-->
								@if(!Coupon::has())
								<div class="lezada-form coupon-form">
									<form action="{{ route('coupon.store') }}" method="POST">
										@csrf
										<div class="row">
											<div class="col-md-7 mb-sm-10">
												<input type="text" placeholder="Enter your coupon code" name="code">
											</div>
											<div class="col-md-5">
												<button class="lezada-button lezada-button--medium">apply coupon</button>
											</div>
										</div>
									</form>
								</div>
								@endif
								<!--=======  End of coupon form  =======-->
							</div>

							<div class="col-lg-6 text-left text-lg-right">
								<!--=======  update cart button  =======-->
								
								<button class="lezada-button lezada-button--medium">update cart</button>
								
								<!--=======  End of update cart button  =======-->
							</div>
						</div>
					</div>
					
					<!--=======  End of coupon area  =======-->
				</div>

				<div class="col-xl-4 offset-xl-8 col-lg-5 offset-lg-7">
					<div class="cart-calculation-area">
						<h2 class="mb-40">Cart totals</h2>

						<table class="cart-calculation-table mb-30">
							<tr>
								<th>SUBTOTAL</th>
								<td class="subtotal">{{ Cart::subtotal() }}</td>
							</tr>
							@if(Coupon::has())
							<tr>
								<th>Discount({{ Coupon::get()['percent'] }})</th>
								<td class="subtotal">{{  Coupon::get()['discount'] }}</td>
							</tr>
							@endif
							<tr>
								<th>TOTAL</th>
								<td class="total">{{ Cart::total() }}</td>
							</tr>
						</table>

						<div class="cart-calculation-button text-center">
							<button class="lezada-button lezada-button--medium">proceed to checkout</button>
						</div>


                        <div class="currency-change change-dropdown d-none d-lg-block">
                            <select class="form-control currency" id="1" name="currency">
                            @foreach(Currencies::get() as $currency)
                                <option value="{{ $currency->code }}">{{ $currency->code }}</option>
                             @endforeach
                                               
                        </select>

                        {{ Session()->get('currency')['code'] }}
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--=====  End of cart page content  ======-->

@endsection
@push('js')
	<script>
		 $(".qty").change(function () {
		 	 id = $(this).attr('id');
		 	 value = $(this).val();
		 	 url = 'http://127.0.0.1:8000/cart/update';
		 	  $.ajax({
                url:url,

                data: {value:value,
                    id:id},
               type: "GET",
               dataType: "JSON",
               success:function(response){
              
               	 window.location.reload()
                	
               }
           });
		 });
	</script>
	<script>
		 $(".currency").change(function () {
		 	 id = $(this).attr('id');
		 	 value = $(this).val();
		 	 url = 'http://127.0.0.1:8000/currency/price';
		 	  $.ajax({
                url:url,

                data: {value:value,
                    id:id},
               type: "GET",
               dataType: "JSON",
               success:function(response){
              
               	 window.location.reload()
                	
               }
           });
		 });
	</script>
@endpush

