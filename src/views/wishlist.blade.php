@extends('nuclues::frontend.layouts.app')


@section('content')
<!--=======  breadcrumb area =======-->

	<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Wishlist</h1>

					<!--=======  breadcrumb list  =======-->
					
						<ul class="breadcrumb-list">
							<li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
							<li class="breadcrumb-list__item breadcrumb-list__item--active">wishlist</li>
						</ul>
					
					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>
	
    <!--=======  End of breadcrumb area =======-->
    
    <!--=============================================
	=            wishlist page content         =
	=============================================-->
	
	<div class="shopping-cart-area mb-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  cart table  =======-->
					
					<div class="cart-table-container">
						<table class="cart-table">
							<thead>
								<tr>
									<th class="product-name" colspan="2">Product</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-subtotal">&nbsp;</th>
									<th class="product-remove">&nbsp;</th>
								</tr>
							</thead>

							<tbody>
								 @if(Wishlist::has())
								@foreach(Wishlist::get() as $wishlist)
									<tr>
										<td class="product-thumbnail">
											<a href="shop-product-basic.html">
												<img src="{{ asset('product/'.$wishlist['image']) }}" class="img-fluid" alt="">
											</a>
										</td>
										<td class="product-name">
											<a href="shop-product-basic.html">{{ $wishlist['title'] }}</a>
											<span class="product-variation">Color: Black</span>
										</td>

										<td class="product-price"><span class="price">{{ $wishlist['price'] }}</span></td>
										<form action="{{ route('wishlist-to-cart',$wishlist['product_id']) }}">
										<td class="product-quantity">
											<div class="pro-qty d-inline-block mx-0">
												<input type="text" name="quantity" value="{{ $wishlist['qty'] }}">
											</div>
										</td>
										<input type="hidden" name="title" value="{{ $wishlist['title'] }}">
										<input type="hidden" name="price" value="{{ $wishlist['price'] }}">
										<td class="add-to-cart"><button class="lezada-button lezada-button--small lezada-button--icon--left"> <i class="ion-ios-cart-outline"></i> add to cart</button></td>
										</form>
										<td class="product-remove">
											<a href="{{ route('remove',$wishlist['id']) }}">
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
			</div>
		</div>
	</div>
		
		<!--=====  End of wishlist page content  ======-->

@endsection
@push('js')
	
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
