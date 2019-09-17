@extends('nuclues::frontend.layouts.app')

@push('css')

@endpush

@section('content')
<!--=======  breadcrumb area =======-->

	<div class="breadcrumb-area breadcrumb-bg-2 pt-50 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Shop</h1>

					<!--=======  breadcrumb list  =======-->
					
						<ul class="breadcrumb-list">
							<li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
							<li class="breadcrumb-list__item"><a href="shop-left-sidebar.html">SHOP</a></li>
							<li class="breadcrumb-list__item breadcrumb-list__item--active">SHOP PRODUCT</li>
						</ul>
					
					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>
	
    <!--=======  End of breadcrumb area =======-->
    
    <!--=============================================
    =            shop page content         =
    =============================================-->
    
    <div class="shop-page-wrapper mt-100 mb-100">
        <div class="container">
            <div class="row">
				<div class="col-lg-12">
					<!--=======  shop product content  =======-->
					
					<div class="shop-product">
						<div class="row pb-100">
							<div class="col-lg-6 mb-md-70 mb-sm-70">
								<!--=======  shop product big image gallery  =======-->
								
								<div class="shop-product__big-image-gallery-wrapper mb-30">

									<!--=======  shop product gallery icons  =======-->
									
									<div class="single-product__floating-badges single-product__floating-badges--shop-product">
										<span class="hot">hot</span>
									</div>


									<div class="shop-product-rightside-icons">
										<span class="wishlist-icon">
											<a href="#" data-tippy="Add to wishlist" data-tippy-placement="left" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" ><i class="ion-android-favorite-outline"></i></a>
										</span>
										<span class="enlarge-icon">
											<a class="btn-zoom-popup" href="#" data-tippy="Click to enlarge" data-tippy-placement="left" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" ><i class="ion-android-expand"></i></a>
										</span>
									</div>
									
									<!--=======  End of shop product gallery icons  =======-->

									<div class="shop-product__big-image-gallery-slider">

										<!--=======  single image  =======-->
										@foreach($product->productimages as $image)
										<div class="single-image">
											<img src="{{ asset('product/gallary/'.$image->image) }}" class="img-fluid" alt="">
										</div>
										@endforeach
										<!--=======  End of single image  =======-->

										
									</div>

								</div>
								
								<!--=======  End of shop product big image gallery  =======-->

								<!--=======  shop product small image gallery  =======-->
								
								<div class="shop-product__small-image-gallery-wrapper">

									<div class="shop-product__small-image-gallery-slider">

										<!--=======  single image  =======-->
										
										

										@foreach($product->productimages as $image)
										<div class="single-image">
											<img src="{{ asset('product/gallary/'.$image->image) }}" class="img-fluid" alt="">
										</div>
										@endforeach
										<!--=======  End of single image  =======-->

										<!--=======  single image  =======-->
										
										
										
										<!--=======  End of single image  =======-->
									</div>

								</div>
								
								<!--=======  End of shop product small image gallery  =======-->
							</div>

							<div class="col-lg-6">
								<!--=======  shop product description  =======-->
								
								<div class="shop-product__description">
									<!--=======  shop product navigation  =======-->
									
									<div class="shop-product__navigation">
										<a href="{{ route('next_preview_product',$product->subtitle) }}"><i class="ion-ios-arrow-thin-left"></i></a>
										<a href="{{ route('next_preview_product',$product->subtitle) }}"><i class="ion-ios-arrow-thin-right"></i></a>
									</div>
									
									<!--=======  End of shop product navigation  =======-->
			
									<!--=======  shop product rating  =======-->
									
									<div class="shop-product__rating mb-15">
										<span class="product-rating">
											<i class="active ion-android-star"></i>
											<i class="active ion-android-star"></i>
											<i class="active ion-android-star"></i>
											<i class="active ion-android-star"></i>
											<i class="ion-android-star-outline"></i>
										</span>
										
										<span class="review-link ml-20">
											<a href="#">({{ Review::count($product->id) }} customer reviews)</a>
										</span>
									</div>
									
									<!--=======  End of shop product rating  =======-->

									<!--=======  shop product title  =======-->
									
									<div class="shop-product__title mb-15">
										<h2>{{ $product->title }}</h2>
									</div>
									
									<!--=======  End of shop product title  =======-->
									
									<!--=======  shop product price  =======-->
									
									<div class="shop-product__price mb-30">
										<span class="main-price discounted">{{ Currencies::price($product->del_price) }}</span>
										<span class="discounted-price">{{ Currencies::price($product->price) }}</span>
									</div>
									
									<!--=======  End of shop product price  =======-->
			
									<!--=======  shop product short description  =======-->
									
									<div class="shop-product__short-desc mb-50">
										{!! $product->description !!}
									</div>
									
									<!--=======  End of shop product short description  =======-->
			
									<!--=======  shop product size block  =======-->
									<form action="{{ route('add-to-cart',$product->id) }}">
													@csrf
									<div class="shop-product__block shop-product__block--size mb-20">
										<div class="shop-product__block__title">Size: </div>
										<div class="shop-product__block__value">
											<div class="shop-product-size-list">
												<input type="checkbox" name="color" value="green" class="single-size">L</input>
												<input type="checkbox" name="color" value="red" class="single-size">L</input>
												<input type="checkbox" name="color" value="yellow" class="single-size">L</input>
												<input type="checkbox" name="color" value="vf" class="single-size">L</input>
												<input type="checkbox" name="color" value="pink" class="single-size">L</input>
												
											</div>
										</div>
									</div>
									
									<!--=======  End of shop product size block  =======-->
			
									<!--=======  shop product color block  =======-->
									
									<div class="shop-product__block shop-product__block--color mb-20">
										<div class="shop-product__block__title">Color: </div>
										<div class="shop-product__block__value">
											<div class="shop-product-color-list">
												
												<ul class="single-filter-widget--list single-filter-widget--list--color">
													<li class="mb-0 pt-0 pb-0 mr-10"><a class="active" href="#"><span class="color-picker black"></span></a></li>
													<li class="mb-0 pt-0 pb-0 mr-10"><a href="#"><span class="color-picker blue"></span></a></li>
													<li class="mb-0 pt-0 pb-0 mr-10"><a href="#"><span class="color-picker brown"></span></a></li>
													
												</ul>
											</div>
										</div>
									</div>
									
									<!--=======  End of shop product color block  =======-->
			
									<!--=======  shop product quantity block  =======-->
									
									<div class="shop-product__block shop-product__block--quantity mb-40">
										<div class="shop-product__block__title">Quantity: </div>
										<div class="shop-product__block__value">
											<div class="pro-qty d-inline-block mx-0 pt-0">
												<input type="text" value="1" name="qty">
											</div>
										</div>
									</div>
									
									<!--=======  End of shop product quantity block  =======-->
			
									<!--=======  shop product buttons  =======-->
									
									<div class="shop-product__buttons mb-40">
										<button type="submit" class="lezada-button lezada-button--medium" >add to cart</button></form>
										<a class="lezada-compare-button ml-20" href="#" data-tippy="Compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-placement="left" data-tippy-arrow="true" data-tippy-theme = "sharpborder" ><i class="ion-ios-shuffle"></i></a>
									</div>
									
									<!--=======  End of shop product buttons  =======-->
			
									<!--=======  shop product brands  =======-->
									
									<div class="shop-product__brands mb-20">
			
										<a href="#">
											<img src="{{ asset('frontend/assets/images/brands/brand-1.png') }}" class="img-fluid" alt="">
										</a>
			
										<a href="#">
											<img src="{{ asset('frontend/assets/images/brands/brand-2.png') }}" class="img-fluid" alt="">
										</a>
			
									</div>
									
									<!--=======  End of shop product brands  =======-->
			
									<!--=======  other info table  =======-->
									
									<div class="quick-view-other-info pb-0">
										<table>
											<tr class="single-info">
												<td class="quickview-title">SKU: </td>
												<td class="quickview-value">{{ $product->quantity }}</td>
											</tr>
											<tr class="single-info">
												<td class="quickview-title">Categories: </td>
												<td class="quickview-value">

													<a href="#">{{ $product->category->name }}</a> 
												</td>
											</tr>
											
											<tr class="single-info">
												<td class="quickview-title">Share on: </td>
												<td class="quickview-value">
													<ul class="quickview-social-icons">
														<li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url('product',$product->subtitle) }}" target="_blank"
                                title="Share on Facebook" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return
                                false;"><i class="fa fa-facebook"></i></a></li>
														<li><a href="https://twitter.com/intent/tweet?url={{ url('product',$product->subtitle) }}&amp;text={{ $product->title }}"

															data-url="{{ url('product',$product->subtitle) }}"
                                    target="_blank" title="Share on Twitter" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return
                                    false;"
															><i class="fa fa-twitter"></i></a></li>
														<li><a href="https://plus.google.com/share?url={{ url('product',$product->subtitle) }}" target="_blank"
                                    title="Share
                                on Google Plus" onclick="javascript:window.open(this.href, '_blank', 'menubar=no,toolbar=no,resizable=no,scrollbars=no,height=400,width=600');return
                                false;"><i class="fa fa-google-plus"></i></a></li>
														
													</ul>
												</td>
											</tr>
										</table>
									</div>
									
									<!--=======  End of other info table  =======-->
								</div>
								
								<!--=======  End of shop product description  =======-->
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<!--=======  shop product description tab  =======-->
								
								<div class="shop-product__description-tab pt-100">
									<!--=======  tab navigation  =======-->
					
									<div class="tab-product-navigation tab-product-navigation--product-desc mb-50">
										<div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
											<a class="nav-item nav-link active" id="product-tab-1" data-toggle="tab" href="#product-series-1" role="tab" aria-selected="true">Description</a>
											<a class="nav-item nav-link" id="product-tab-2" data-toggle="tab" href="#product-series-2" role="tab" aria-selected="false">Additional information</a>
											<a class="nav-item nav-link" id="product-tab-3" data-toggle="tab" href="#product-series-3" role="tab" aria-selected="false">Reviews (3)</a>
										</div>
									</div>
									
									<!--=======  End of tab navigation  =======-->

									<!--=======  tab content  =======-->
									
									<div class="tab-content" id="nav-tabContent2">

										<div class="tab-pane fade show active" id="product-series-1" role="tabpanel" aria-labelledby="product-tab-1">
											<!--=======  shop product long description  =======-->
											
											<div class="shop-product__long-desc mb-30">
												<p>{{ $product->description }}</p>
											</div>
											
											<!--=======  End of shop product long description  =======-->
										</div>

										<div class="tab-pane fade" id="product-series-2" role="tabpanel" aria-labelledby="product-tab-2">
											<!--=======  shop product additional information  =======-->
											
											<div class="shop-product__additional-info">
												{{ $product->information }}
											</div>
											
											<!--=======  End of shop product additional information  =======-->
										</div>

										<div class="tab-pane fade" id="product-series-3" role="tabpanel" aria-labelledby="product-tab-3">
											<!--=======  shop product reviews  =======-->
											
											<div class="shop-product__review">
												<h2 class="review-title mb-20">{{ Review::count($product->id) }} reviews for {{ $product->title }}</h2>

												<!--=======  single review  =======-->
												
												{{ Review::rating($product->id) }}

												<div id="rateYo"></div>
												
												<!--=======  End of single review  =======-->
												@foreach(Review::get($product->id) as $review)
												<!--=======  single review  =======-->
											
												<div class="single-review">
													
													<div class="single-review__content">
														<!--=======  rating  =======-->
														
														<div class="shop-product__rating">
															<span class="product-rating">
																@if($review->rating == 1)
																	<i class="active ion-android-star"></i>
																	<i class="ion-android-star-outline"></i>
																	<i class="ion-android-star-outline"></i>
																	<i class="ion-android-star-outline"></i>
																	<i class="ion-android-star-outline"></i>
																@endif
																	@if($review->rating == 2)
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																	<i class="ion-android-star-outline"></i>
																	<i class="ion-android-star-outline"></i>
																	<i class="ion-android-star-outline"></i>
																@endif
																@if($review->rating == 3)
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																	<i class="ion-android-star-outline"></i>
																	<i class="ion-android-star-outline"></i>
																@endif
																@if($review->rating == 4)
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																	<i class="ion-android-star-outline"></i>
																@endif
																@if($review->rating == 5)
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																	<i class="active ion-android-star"></i>
																@endif
															</span>
														</div>
														
														<!--=======  End of rating  =======-->

														<!--=======  username and date  =======-->
														
														<p class="username">{{ $review->name }} <span class="date">/ {{ $review->created_at->todateString() }}</span></p> 
														
														<!--=======  End of username and date  =======-->

														<!--=======  message  =======-->
														
														<p class="message">
															{{ $review->review }}
														</p>
														
														<!--=======  End of message  =======-->
													</div>
												</div>
												@endforeach
												<!--=======  End of single review  =======-->

												<h2 class="review-title mb-20">Add a review</h2>
												<p class="text-center">Your email address will not be published. Required fields are marked *</p>

												<!--=======  review form  =======-->
												
												<div class="lezada-form lezada-form--review">
													<form action="{{ route('review.store') }}" method="POST">
														@csrf
														<div class="row">
															<div class="col-lg-6 mb-20">
																<input type="text" placeholder="Name *" required name="name">
															</div>
															<div class="col-lg-6 mb-20">
																<input type="email" placeholder="Email *" required name="email">
															</div>
															<div class="col-lg-12 mb-20">
																<span class="rating-title mr-30">YOUR RATING</span>
																<span class="product-rating">
																	<select class="from-control" name="rating">
																		<option>Select Rating</option>
																		
																		<option value="1">1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																	</select>
																</span>
															</div>
															<input type="hidden" name="product_id" value="{{ $product->id }}">
															<div class="col-lg-12 mb-20">
																<textarea cols="30" rows="10" placeholder="Your review *" name="review"></textarea>
															</div>
															<div class="col-lg-12 text-center">
																<button type="submit" class="lezada-button lezada-button--medium">submit</button>
															</div>
														</div>
													</form>
												</div>
												
												<!--=======  End of review form  =======-->


											</div>
											
											<!--=======  End of shop product reviews  =======-->
										</div>

									</div>
									
									<!--=======  End of tab content  =======-->
								</div>
								
								<!--=======  End of shop product description tab  =======-->
							</div>
						</div>
					</div>
					
					<!--=======  End of shop product content  =======-->
				</div>
            </div>
        </div>
    </div>
   
    <!--=====  End of shop page content  ======-->

@endsection

@push('js')


<script src="{{ asset('frontend/assets/jquery.rateyo.js') }}"></script>

@endpush