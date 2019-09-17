 <div class="footer-container footer-one pt-100 pb-50">
        <div class="container wide">
            <div class="row">
                <div class="col footer-single-widget">
                    <!--=======  copyright text  =======-->
                        <!--=======  logo  =======-->
                        
                        <div class="logo">
                            <img src="assets/images/logo.png" class="img-fluid" alt="">
                        </div>
                        
                        <!--=======  End of logo  =======-->

                        <!--=======  copyright text  =======-->
                        
                        <div class="copyright-text">
                            <p> &copy; 2019 lezada.  <span>All Rights Reserved</span></p>
                        </div>
                        
                        <!--=======  End of copyright text  =======-->
                    
                    <!--=======  End of copyright text  =======-->
                </div>

                @foreach(Navigation::get() as $v)

                    
        

   
                <div class="col footer-single-widget">
                    <!--=======  single widget  =======-->
                        <h5 class="widget-title">{{ $v->name }}</h5>

                        <!--=======  footer navigation container  =======-->
                         @foreach(Navigation::menu($v->name) as $r)
                        <div class="footer-nav-container">
                            <nav>
                                <ul>
                                    <li><a href="{{ $r->link }}">{{ $r->name }}</a></li>
                                    
                                </ul>
                            </nav>
                        </div>
                           @endforeach
                        <!--=======  End of footer navigation container  =======-->
                    
                    <!--=======  single widget  =======-->
                </div>
              

                 @endforeach
                <div class="col footer-single-widget">
                    <!--=======  single widget  =======-->
                            
                    <div class="footer-subscription-widget">
                        <h2 class="footer-subscription-title">Subscribe.</h2>
                        <p class="subscription-subtitle">Subscribe to our newsletter to receive news on update.</p>

                        <!--=======  subscription form  =======-->
                        
                        <div class="subscription-form">
                            <form class="mc-form" action="{{ route('subscriber') }}" method="POST">
                                @csrf
                                <input type="email" placeholder="Your email address" name="email">
                                <button type="submit"><i class="ion-ios-arrow-thin-right"></i></button>
                            </form>
                        </div>
                        
                        <!--=======  End of subscription form  =======-->

                        <!-- mailchimp-alerts Start -->

                        <div class="mailchimp-alerts">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->

                    </div>
                    
                    <!--=======  End of single widget  =======-->
                </div>
            </div>
        </div>
    </div>