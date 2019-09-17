<style>
    .drop .drop-head {
    background: #fff none repeat scroll 0 0;
    float: left;
    font-size: 14px;
    font-weight: 600;
    padding: 20px 33px 10px;
    position: relative;
    width: 100%;
    z-index: 3;
}
</style>

<div class="topbar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                @if(Site::logo())
                    <div class="logo"><a href="{{ route('admin.dashboard') }}" title=""><img src="{{ Site::logo() }}" alt=""></a></div>
                @else
                    <div class="logo"><a href="{{ route('admin.dashboard') }}" title="">Nuclues</a></div>
                @endif
            </div>
            <div class="col-lg-9">
                <ul class="notify-area">
                    <li>
                        <div class="nav-icon3"> <span></span> <span></span> <span></span> <span></span> </div>
                        <i class="fa fa-navicon nav-icon3"></i>
                    </li>
                    
                  
                </ul>
                <div class="t-search">
                    <form method="post" action="#">
                        <input type="text" placeholder="Enter Your Keyword">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                
            </div>
            <div class="col-lg-1">
                <div class="user-head">
                    <div class="admin">
                        @if(Site::profile())
                        <div class="admin-avatar"><img src="{{ asset('profile/'.Site::profile()->image) }}" alt="">  </div>
                        @else


                            <div class="admin-avatar"><img width="45" src="https://image.flaticon.com/icons/png/512/55/55089.png"> </div>
                        @endif
                    </div>
                    <div class="drop setting"> <span class="drop-head">{{ Auth::User()->name }} </span>
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
            </div>
        </div>
    </div>
</div>