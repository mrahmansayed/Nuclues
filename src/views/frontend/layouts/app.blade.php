<!DOCTYPE html>
<html class="no-js" lang="zxx">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lezada - Multipurpose eCommerce Bootstrap4 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico">

    <!-- CSS
    ============================================ -->
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- FontAwesome CSS -->
    <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Ionicons CSS -->
    <link href="{{ asset('frontend/assets/css/ionicons.min.css') }}" rel="stylesheet">

    <!-- Themify CSS -->
    <link href="{{ asset('frontend/assets/css/themify-icons.css') }}" rel="stylesheet">

    <!-- Plugins CSS -->
    <link href="{{ asset('frontend/assets/css/plugins.css') }}" rel="stylesheet">

    <!-- Helper CSS -->
    <link href="{{ asset('frontend/assets/css/helper.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">
    


    <!-- Modernizer JS -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

</head>

<body>

    @include('nuclues::frontend.layouts.partails.header')
   

    @yield('content')

     <!--=============================================
    =            footer area         =
    =============================================-->
    
    @include('nuclues::frontend.layouts.partails.footer')
    
    <!--=====  End of footer area  ======-->
      <!--=============================================
    =            overlay items         =
    =============================================-->
    
    <!--=======  about overlay  =======-->
    
    <div class="header-offcanvas about-overlay" id="about-overlay">
        <div class="overlay-close inactive"></div>
        <div class="overlay-content">

            <!--=======  close icon  =======-->
            
            <span class="close-icon" id="about-close-icon">
                <a href="javascript:void(0)">
                    <i class="ti-close"></i>
                </a>
            </span>
            
            <!--=======  End of close icon  =======-->

            <!--=======  overlay content container  =======-->
            
            <div class="overlay-content-container d-flex flex-column justify-content-between h-100">
                <!--=======  widget wrapper  =======-->

                <div class="widget-wrapper">
                    <!--=======  single widget  =======-->
                    
                    <div class="single-widget">
                        <h2 class="widget-title">About Us</h2>
                        <p>At Lezada, we put a strong emphasis on simplicity, quality and usefulness of fashion products over other factors. Our fashion items never get outdated. They are not short-lived as normal fashion clothes.</p>
                    </div>
                    
                    <!--=======  End of single widget  =======-->
                </div>
            
                <!--=======  End of widget wrapper  =======-->
    
                <!--=======  contact widget  =======-->
                
                <div class="contact-widget">
                    <p class="email"><a href="mailto:contact@lezada.com">contact@lezada.com</a></p>
                    <p class="phone">(+00) 123 567990</p>
    
                    <div class="social-icons">
                        <ul>
                            <li><a href="http://www.twitter.com/" data-tippy="Twitter" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="http://www.facebook.com/" data-tippy="Facebook" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"  target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="http://www.instagram.com/" data-tippy="Instagram" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="http://www.youtube.com/" data-tippy="Youtube" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <!--=======  End of contact widget  =======-->
            </div>
            
            <!--=======  End of overlay content container  =======-->
        </div>
    </div>
    
    <!--=======  End of about overlay  =======-->

    <!--=======  wishlist overlay  =======-->
    
    <div class="wishlist-overlay" id="wishlist-overlay">
        <div class="wishlist-overlay-close inactive"></div>
        <div class="wishlist-overlay-content">
            <!--=======  close icon  =======-->
            
            <span class="close-icon" id="wishlist-close-icon">
                <a href="javascript:void(0)">
                    <i class="ion-android-close"></i>
                </a>
            </span>
            
            <!--=======  End of close icon  =======-->

            <!--=======  offcanvas wishlist content container  =======-->
            
            <div class="offcanvas-cart-content-container">
                <h3 class="cart-title">Wishlist</h3>

                <div class="cart-product-wrapper">
                    <div class="cart-product-container  ps-scroll">
                        <!--=======  single cart product  =======-->
                        
                      @if(Wishlist::has())
                        @foreach(Wishlist::get() as $cart)
                        <div class="single-cart-product">
                            <span class="cart-close-icon">
                                <a href="#"><i class="ti-close"></i></a>
                            </span>
                            <div class="image">
                                <a href="shop-product-basic.html">
                                    <img src="{{ asset('product/'.$cart['image']) }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h5><a href="shop-product-basic.html">{{ $cart['title'] }}</a></h5>
                                <p><span class="cart-count">{{ $cart['qty'] }} x </span> <span class="discounted-price">{{ $cart['price'] }}</span></p>
                                
                            </div>
                        </div>
                        @endforeach

                        @else 

                        no product found
                  @endif
                     
                        
                        <!--=======  End of single cart product  =======-->
                    </div>

                    <!--=======  cart buttons  =======-->
                    
                    <div class="cart-buttons">
                        <a href="{{ route('wishlist') }}">view wishlist</a>
                    </div>
                    
                    <!--=======  End of cart buttons  =======-->
                </div>
            </div>
            
            <!--=======  End of offcanvas wishlist content container   =======-->
        </div>
    </div>
    
    <!--=======  End of wishlist overlay  =======-->

    <!--=======  cart overlay  =======-->
    
    <div class="cart-overlay" id="cart-overlay">
        <div class="cart-overlay-close inactive"></div>
        <div class="cart-overlay-content">
            <!--=======  close icon  =======-->
            
            <span class="close-icon" id="cart-close-icon">
                <a href="javascript:void(0)">
                    <i class="ion-android-close"></i>
                </a>
            </span>
            
            <!--=======  End of close icon  =======-->

            <!--=======  offcanvas cart content container  =======-->
            
            <div class="offcanvas-cart-content-container">
                <h3 class="cart-title">Cart</h3>

                <div class="cart-product-wrapper">
                    <div class="cart-product-container  ps-scroll">

                     
                        <!--=======  single cart product  =======-->
                        @foreach(Cart::get() as $cart)
                        <div class="single-cart-product">
                            <span class="cart-close-icon">
                                <a href="#"><i class="ti-close"></i></a>
                            </span>
                            <div class="image">
                                <a href="shop-product-basic.html">
                                    <img src="{{ asset('product/'.$cart['image']) }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h5><a href="shop-product-basic.html">{{ $cart['title'] }}</a></h5>
                                <p><span class="cart-count">{{ $cart['qty'] }} x </span> <span class="discounted-price">{{ $cart['price'] }}</span></p>
                                
                            </div>
                        </div>
                        @endforeach
                
                        <!--=======  End of single cart product  =======-->
                    </div>

                    <!--=======  subtotal calculation  =======-->
                    
                    <p class="cart-subtotal">
                        <span class="subtotal-title">Subtotal:</span>
                        <span class="subtotal-amount">{{ Cart::total() }}</span>
                    </p>
                    
                    <!--=======  End of subtotal calculation  =======-->

                    <!--=======  cart buttons  =======-->
                    
                    <div class="cart-buttons">
                        <a href="{{ route('cart') }}">view cart</a>
                        <a href="shop-checkout.html">checkout</a>
                    </div>
                    
                    <!--=======  End of cart buttons  =======-->

                    <!--=======  free shipping text  =======-->
                    
                    <p class="free-shipping-text">
                            Free Shipping on All Orders Over $100!
                    </p>
                    
                    <!--=======  End of free shipping text  =======-->
                </div>
            </div>
                
                <!--=======  End of offcanvas cart content container   =======-->
        </div>
    </div>
    
    <!--=======  End of cart overlay  =======-->


    <!--=======  search overlay  =======-->
    
    <div class="search-overlay" id="search-overlay">
        
        <!--=======  close icon  =======-->
        
        <span class="close-icon search-close-icon">
            <a href="javascript:void(0)"  id="search-close-icon">
                <i class="ti-close"></i>
            </a>
        </span>
        
        <!--=======  End of close icon  =======-->

        <!--=======  search overlay content  =======-->
        
        <div class="search-overlay-content">
            <div class="input-box">
                <form action="https://demo.hasthemes.com/lezada-preview/lezada/index.html">
                    <input type="search" placeholder="Search Products...">
                </form>
            </div>
            <div class="search-hint">
                <span># Hit enter to search or ESC to close</span>
            </div>
        </div>
        
        <!--=======  End of search overlay content  =======-->
    </div>
    
    <!--=======  End of search overlay  =======-->
    
    <!--=====  End of overlay items  ======-->

    <!--=============================================
    =            quick view         =
    =============================================-->
    <!-- scroll to top  -->
    <a href="#" class="scroll-top"></a>
    <!-- end of scroll to top -->

    <!-- JS
    ============================================ -->
    <!-- jQuery JS -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery.min.js') }}"></script>

    <!-- Popper JS -->
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    
    
    @stack('js')
</body>


</html>