@extends('nuclues::frontend.layouts.app')

@section('content')
<script src="https://js.stripe.com/v3/"></script>

   
    <!--=============================================
    =            slider area         =
    =============================================-->
    
    <div class="slider-area mb-100 mb-md-80 mb-sm-60">
        <!--=======  slider-wrapper  =======-->
        
        <div class="lezada-slick-slider lezada-slick-slider--fullscreen"
        data-slick-setting='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "arrows": true,
            "dots": true,
            "autoplay": false,
            "autoplaySpeed": 5000,
            "speed": 1000,
            "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
            "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
        }'
        >
            @foreach(Slider::get('latest') as $slider)
            <!--=======  single slider  =======-->
            <div class="lezada-single-slider bg-img" data-bg="{{ asset('slider/'.$slider->image) }}">
                <div class="container h-100">
                    <div class="row text-center text-lg-left justify-content-center justify-content-lg-start align-items-center h-100">
                        <div class="lezada-single-slider__content">
                            <h5 class="subtitle subtitle--black">{{ $slider->title }}</h5>
                            <h2 class="main-title main-title--black">{!! $slider->description !!}</h2>
                            <a href="{{ $slider->button }}" class="lezada-button lezada-button--dark lezada-button--medium">{{ $slider->button }}</a>
                        </div>
                    </div>
                </div>
            </div>
            
            @endforeach
            <!--=======  End of single slider  =======-->

        
        


        </div>
        
        <!--=======  End of slider-wrapper  =======-->
    </div>
    
    <!--=====  End of slider area  ======-->

   
    
    <!--=============================================
    =            hover banner area         =
    =============================================-->
    
    <div class="hover-banner-area mb-70 mb-md-50 mb-sm-30">
        <div class="container">
            <div class="row">
                {!! Widget::byname('Men Bag')->description !!}
                {!! Widget::byname('DESIGN')->description !!}
                
              
                
            </div>
        </div>
    </div>


    
    <!--=====  End of hover banner area  ======-->
    

     
    <!--=============================================
    =            section title  container      =
    =============================================-->
    
    <div class="section-title-container mb-80 mb-md-60 mb-sm-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->
                    
                    <div class="section-title section-title--one text-center">
                        <h1>New Product</h1>
                        <p class="subtitle subtitle--deep subtitle--trending-home">Lorem ipsum dolor sit amet, consecte tur cing elit.</p>
                    </div>
                    
                    <!--=======  End of section title  =======-->
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of section title container ======-->
  
    <!--=============================================
    =            product carousel container         =
    =============================================-->
    
    <div class="product-carousel-container mb-100 mb-md-80 mb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  product carousel  =======-->
                    
                    <div class="lezada-slick-slider product-carousel"
                    data-slick-setting='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "arrows": false,
                        "dots": true,
                        "autoplay": false,
                        "autoplaySpeed": 5000,
                        "speed": 1000,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
                    }'
                    data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 4, "arrows": false} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 4, "arrows": false} },
                        {"breakpoint":991, "settings": {"slidesToShow": 3,"slidesToScroll": 3, "arrows": false} },
                        {"breakpoint":767, "settings": {"slidesToShow": 2, "slidesToScroll": 2, "arrows": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2, "slidesToScroll": 2,  "arrows": false} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "slidesToScroll": 1, "arrows": false} }
                    ]'
                    >
                            
                           
                            @foreach(Product::get('featured') as $product)
                            <!--=======  single product  =======-->
                            <div class="col">
                                <div class="single-product">
                                    <!--=======  single product image  =======-->
                                    
                                    <div class="single-product__image">
                                        <a class="image-wrap" href="{{ route('product',$product->subtitle) }}">
                                            <img src="{{ asset('product/'.$product->image) }}" class="img-fluid" alt="">
                                                   @php $i = 1; @endphp

                                                  @foreach ($product->productimages as $image) @if ($i > 0)
                                            <img src="{{ asset('product/gallary/'.$image->image) }}" class="img-fluid" alt="">
                                        </a>@endif @php $i--;
                            @endphp
                            @endforeach
                                        </a>

                                    
                
                                        <div class="single-product__floating-badges">
                                          @if($product->discount)
                                            <span class="onsale">-{{ $product->discount }}%</span>
                                          @endif
                            
                                        </div>
                                        
                                        <div class="single-product__floating-icons">
                                            <span class="wishlist"><a href="{{ route('add-to-wishlist',$product->id) }}" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left" ><i class="ion-android-favorite-outline"></i></a></span>
                                            <span class="compare"><a href="{{ route('getAddToCompare',$product->id) }}" data-tippy="Compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left" ><i class="ion-ios-shuffle-strong"></i></a></span>
                                            <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left"  ><i class="ion-ios-search-strong"></i></a></span>
                                        </div>
                                    </div>
                                    
                                    <!--=======  End of single product image  =======-->
                
                                    <!--=======  single product content  =======-->
                                    
                                    <div class="single-product__content">
                                        <div class="title">
                                            <h3> <a href="shop-product-basic.html">{{ $product->title }}</a></h3>
                                           @if($product->quantity > 0)
                                            <a href="{{ route('add-to-cart',$product->id) }}">Add to cart</a>
                                            @endif
                                        </div>
                                        <div class="price">
                                            <span class="main-price">{{ Currencies::price($product->price) }}</span>
                                        </div>
                                    </div>
                                    
                                    <!--=======  End of single product content  =======-->
                                </div>
                            </div>
                            <!--=======  End of single product  =======-->
                            
                        @endforeach
                            
                          
                    </div>
                    
                    <!--=======  End of product carousel  =======-->
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of product carousel container  ======-->
    
    
    <!--=============================================
    =            single item testimonial area         =
    =============================================-->
    
    <div class="lezada-testimonial single-item-testimonial-area testimonial-bg testimonial-bg-2 pt-135 pb-135 mb-100 mb-md-80 mb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  testmonial slider container  =======-->
                    
                    <div class="lezada-slick-slider multi-testimonial-slider-container"
                    data-slick-setting='{
                        "slidesToShow": 1,
                        "arrows": true,
                        "autoplay": true,
                        "autoplaySpeed": 5000,
                        "speed": 1000,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
                    }'
                    data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 1} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 1} },
                        {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                    ]'
                    >
                        
                        <!--=======  single testimonial  =======-->
                        
                        <div class="col">
                            <div class="testimonial-item single-testimonial-single-item">

                                <div class="single-testimonial-single-item__content text-center m-auto">

                                    <div class="quote-icon d-inline-block mb-30">
                                        <img src="{{ asset('frontend/assets/images/icons/quote.png') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="text mb-40 text-white">
                                        I can say your dedication is second to none. I like the fact that you are strongly proud of your work in every way.
                                    </div>

                                    <div class="client-info">
                                        <p class="name text-white">Sally Ramsey</p>
                                        <span class="designation text-white">/ Reporter</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        
                        <!--=======  End of single testimonial  =======-->
                        
                        <!--=======  single testimonial  =======-->
                        
                        <div class="col">
                            <div class="testimonial-item single-testimonial-single-item">

                                

                                <div class="single-testimonial-single-item__content text-center m-auto">

                                    <div class="quote-icon d-inline-block mb-30">
                                        <img src="{{ asset('frontend/assets/images/icons/quote.png') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="text mb-40 text-white">
                                        This has already been my fifth-time purchasing their theme. I have been highly satisfied with their work.
                                    </div>

                                    <div class="client-info">
                                        <p class="name text-white">Lois Thompson</p>
                                        <span class="designation text-white">/ Model</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        
                        <!--=======  End of single testimonial  =======-->
                        
                        <!--=======  single testimonial  =======-->
                        
                        <div class="col">
                            <div class="testimonial-item single-testimonial-single-item">


                                <div class="single-testimonial-single-item__content text-center m-auto">

                                    <div class="quote-icon d-inline-block mb-30">
                                        <img src="{{ asset('frontend/assets/images/icons/quote.png') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="text mb-40 text-white">
                                        There's nothing would satisfy me much more than a worry-free clean and responsive theme for my high-traffic site.
                                    </div>

                                    <div class="client-info">
                                        <p class="name text-white">Florence Pittman</p>
                                        <span class="designation text-white">/ Actor</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        
                        <!--=======  End of single testimonial  =======-->
                        
                        <!--=======  single testimonial  =======-->
                        
                        <div class="col">
                            <div class="testimonial-item single-testimonial-single-item">

                                
                                <div class="single-testimonial-single-item__content text-center m-auto">

                                    <div class="quote-icon d-inline-block mb-30">
                                        <img src="{{ asset('frontend/assets/images/icons/quote.png') }}" class="img-fluid" alt="">
                                    </div>

                                    <div class="text mb-40 text-white">
                                        Five-star for good customer support. They have the ability to resolve any issue in less than the time for a coffee cup.
                                    </div>

                                    <div class="client-info">
                                        <p class="name text-white">Anais Coulon</p>
                                        <span class="designation text-white">/ Reporter</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        
                        <!--=======  End of single testimonial  =======-->


                    </div>
                    
                    <!--=======  End of testmonial slider container  =======-->
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of single item testimonial area  ======-->
        
        
    
    
    <!--=============================================
    =            section title  container      =
    =============================================-->
    
    <div class="section-title-container mb-80 mb-md-60 mb-sm-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  section title  =======-->
                    
                    <div class="section-title section-title--one text-center">
                        <h1>New Products</h1>
                        <p class="subtitle subtitle--deep subtitle--trending-home">We create beard oil by natural ingredients.</p>
                    </div>
                    
                    <!--=======  End of section title  =======-->
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of section title container ======-->


    <!--=============================================
    =            product carousel container         =
    =============================================-->
    
    <div class="product-carousel-container mb-100 mb-md-80 mb-sm-60">
        <div class="container">
            <div class="row">
                @foreach(Product::get('latest',5) as $product)
                <!--=======  single product  =======-->
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                    <div class="single-product">
                        <!--=======  single product image  =======-->
                        
                        <div class="single-product__image">
                            <a class="image-wrap" href="shop-product-basic.html">
                                <img src="{{ asset('product/'.$product->image) }}" class="img-fluid" alt="">
                                <img src="assets/images/backpack-one/product-2.jpg" class="img-fluid" alt="">
                            </a>

                            <div class="single-product__floating-badges">
                                <span class="onsale">-10%</span>
                                <span class="hot">hot</span>
                            </div>
                            
                            <div class="single-product__floating-icons">
                                <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left" ><i class="ion-android-favorite-outline"></i></a></span>

                                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left" ><i class="ion-ios-shuffle-strong"></i></a></span>

                                <span class="quickview"><a class="cd-trigger" href="#qv-1"  data-tippy="Quick View" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme = "sharpborder" data-tippy-placement = "left"  ><i class="ion-ios-search-strong"></i></a></span>
                            </div>

                            
                        </div>
                        
                        <!--=======  End of single product image  =======-->

                        <!--=======  single product content  =======-->
                
                        <div class="single-product__content">
                                <div class="single-product__variations">
                                    <div class="size-container mb-5">
                                        <span class="size">L</span>
                                        <span class="size">M</span>
                                        <span class="size">S</span>
                                        <span class="size">XS</span>
                                    </div>
                                    <div class="color-container">
                                        <span class="black"></span>
                                        <span class="blue"></span>
                                        <span class="yellow"></span>
                                    </div>
                                    <!-- <a href="#" class="clear-link">clear</a> -->
                                </div>
                            <div class="title">
                                <h3> <a href="shop-product-basic.html">Demo product one</a></h3>
                                <a href="#">Select options</a>
                            </div>
                            <div class="price">
                                <span class="main-price discounted">$160.00</span>
                                <span class="discounted-price">$180.00</span>
                            </div>
                        </div>
                        
                        <!--=======  End of single product content  =======-->
                    </div>
                </div>
                <!--=======  End of single product  =======-->
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a class="lezada-loadmore-button" href="https://demo.hasthemes.com/collections/all"><i class="ion-ios-plus-empty"></i> Load More..</a>
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of product carousel container  ======-->

    
    <!--=============================================
    =            hover banner area         =
    =============================================-->
    
    <div class="hover-banner-area mb-100 mb-md-80 mb-sm-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!--=======  single banner  =======-->
                    
                    <div class="single-banner single-banner--hoverborder">
                        <a class="banner-link" href="shop-left-sidebar.html"></a>
                        <img src="assets/images/backpack-one/banner-3.jpg" class="img-fluid" alt="">
                        <div class="banner-content banner-content--middle-white">
                            <p>Bag Fashion Collection</p>
                            <p> BackPack</p>
                        </div>
                    </div>
                    
                    <!--=======  End of single banner  =======-->
                </div>
            </div>
        </div>
    </div>
    
    <!--=====  End of hover banner area  ======-->
    

    
    <!--=============================================
    =            instagram slider area         =
    =============================================-->
    
   <!--=======  blog post area  =======-->
    
    <div class="blog-post-area mb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 mb-50 mb-lg-0">
                    <!--=======  blog intro  =======-->
                    
                    <div class="blog-intro">
                        <h2>From our blog</h2>
                        <p>Lorem ipsum dolor sit amet, consecte tur cing elit. Suspe ndisse suscipit sagittis leo sit met condim entum.</p>
                        <a href="blog-standard-left-sidebar.html" class="lezada-button lezada-button--medium">view all</a>
                    </div>
                    
                    <!--=======  End of blog intro  =======-->
                </div>
                <div class="col-lg-8">
                    <!--=======  blog post slider container  =======-->
                    
                    <div class="blog-post-slider-container">
                        <div class="lezada-slick-slider blog-post-slider"

                        data-slick-setting='{
                            "slidesToShow": 2,
                            "arrows": true,
                            "speed": 800,
                            "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
                            "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
                        }'
                        data-slick-responsive='[
                            {"breakpoint":1501, "settings": {"slidesToShow": 2} },
                            {"breakpoint":1199, "settings": {"slidesToShow": 2} },
                            {"breakpoint":991, "settings": {"slidesToShow": 2, "arrows": false} },
                            {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
                            {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
                            {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
                        ]'

                        >

                        @foreach(Blog::get('latest',5) as $blog)
                            <!--=======  single slider post  =======-->
                            <div class="col">
                                <div class="single-slider-post">
                                <!--=======  image  =======-->
                                
                                <div class="single-slider-post__image mb-30">
                                    <a href="{{ route('blog.details',$blog->slug) }}">
                                        <img src="{{ asset('blog/'.$blog->image) }}" class="img-fluid" alt="">
                                    </a>
                                </div>
                                
                                <!--=======  End of image  =======-->

                                <!--=======  content  =======-->
                                
                                <div class="single-slider-post__content">
                                    <div class="post-date">
                                        <i class="ion-android-calendar"></i>
                                        <a href="blog-standard-left-sidebar.html"> {{ $blog->created_at->toDateString() }}</a>
                                    </div>
                                    <h2 class="post-title"><a href="blog-single-post-left-sidebar.html">{{ $blog->title }}</a></h2>
                                    <p class="post-excerpt">{{ str_limit($blog->description,150) }}</p>
                                    <a href="blog-single-post-left-sidebar.html" class="blog-readmore-btn">read more</a>
                                </div>
                                
                                <!--=======  End of content  =======-->
                                </div>
                            </div>
                            
                            <!--=======  End of single slider post  =======-->
                           @endforeach 
                        </div>
                    </div>
                    
                    <!--=======  End of blog post slider container  =======-->
                </div>
            </div>
        </div>
    </div>
    
    <!--=======  End of blog post area  =======-->

    
    <!--=====  End of instagram slider area  ======-->

   

  
    
    <div id="qv-1" class="cd-quick-view">
        <div class="cd-slider-wrapper">
            <ul class="cd-slider">
                <li class="selected"><img src="assets/images/backpack-one/product-1.jpg" alt="Product 2"></li>
                <li><img src="assets/images/backpack-one/product-2.jpg" alt="Product 1"></li>
            </ul> <!-- cd-slider -->

            <ul class="cd-slider-pagination">
                <li class="active"><a href="#0">1</a></li>
                <li><a href="#1">2</a></li>
            </ul> <!-- cd-slider-pagination -->

            <ul class="cd-slider-navigation">
                <li><a class="cd-prev" href="#0">Prev</a></li>
                <li><a class="cd-next" href="#0">Next</a></li>
            </ul> <!-- cd-slider-navigation -->
        </div> <!-- cd-slider-wrapper -->

        <div class="lezada-item-info cd-item-info ps-scroll">

            <h2 class="item-title">Demo product one</h2>
            <p class="price">
                <span class="main-price discounted">$360.00</span>
                <span class="discounted-price">$300.00</span>
            </p>
            
            <p class="description">Hurley Dry-Fit Chino Short. Men's chino short. Outseam Length: 19 Dri-FIT Technology helps keep you dry and comfortable. Made with sweat-wicking fabric. Fitted waist with belt loops. Button waist with zip fly provides a classic look and feel .</p>

            <span class="quickview-title">Quantity:</span>
            <div class="pro-qty d-inline-block mb-40">
                <input type="text" value="1">
            </div>

            <div class="add-to-cart-btn mb-25">

                <button class="lezada-button lezada-button--medium">add to cart</button>
            </div>

            <div class="quick-view-other-info">
                <table>
                    <tr class="single-info">
                        <td class="quickview-title">SKU: </td>
                        <td class="quickview-value">12345</td>
                    </tr>
                    <tr class="single-info">
                        <td class="quickview-title">Categories: </td>
                        <td class="quickview-value">
                            <a href="#">Fashion</a>, 
                            <a href="#">Men</a>, 
                            <a href="#">Sunglasses</a> 
                        </td>
                    </tr>
                    <tr class="single-info">
                        <td class="quickview-title">Tags: </td>
                        <td class="quickview-value">
                            <a href="#">Fashion</a>, 
                            <a href="#">Men</a>
                        </td>
                    </tr>
                    <tr class="single-info">
                        <td class="quickview-title">Share on: </td>
                        <td class="quickview-value">
                            <ul class="quickview-social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>

            
        </div> <!-- cd-item-info -->
        <a href="#0" class="cd-close">Close</a>
    </div>
    
    <!--=====  End of quick view  ======-->
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