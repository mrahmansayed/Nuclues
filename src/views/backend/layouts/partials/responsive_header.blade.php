 <div class="responsive-header">
                                <div class="logo-area">
                                    <ul class="notify-area">
                                        <li>
                                            <div class="nav-icon3"> <span></span> <span></span> <span></span> <span></span> </div>
                                        </li>
                                       
                                    </ul>
                                    
                                    <div class="user-head">
                                        @if(Site::profile())
                                    <div class="admin">
                                        <div class="admin-avatar"> <img src="{{ asset('profile/'.Site::profile()->image) }}" alt=""> <i class="online"></i> </div>
                                    </div>
                                    @else
                                        <div class="admin">
                                        <div class="admin-avatar"> <img src="{{ asset('backend/images/resources/active-member1.jpg') }}" alt="">  </div>
                                    </div>
                                    @endif
                                    <div class="drop setting"> <span class="drop-head">{{ Auth::User()->name }}</span>
                                        <ul class="drop-meta">
                                            <li> <a href="{{ route('user.edit') }}" title=""><i class="fa fa-eyedropper"></i>Edit Profile</a> </li>
                            <li> <a href="{{ route('order.index') }}" title=""><i class="fa fa-align-right"></i>Order List</a> </li>
                        </ul>
                        <span class="drop-bottom"><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>log Out</span> </div>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
                                    <ul class="seting-area">
                                    
                                  
                                </ul>
                                </div>
                                
                            </div>