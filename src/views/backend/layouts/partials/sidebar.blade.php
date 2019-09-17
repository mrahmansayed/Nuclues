<header>
    <div class="side-menus">
        <div class="side-header">
            <div class="logo"><a title="" href="index.html"><img alt="" src="{{ Site::logo() }}"></a></div>
            <nav class="slide-menu">
                <span>Navigation <i class="ti-layout"></i></span>
                <ul class="mega">
                    <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"> <a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                       
                    </li>
                    <li class="menu-item-has-children {{ Request::is('admin/product*') ? 'active' : '' }}"> <a title=""><i class="fa fa-shopping-cart"></i><span>Products</span></a>
                        <ul class="{{ Request::is('admin/product*') ? '' : 'mega' }}" style="{{ Request::is('admin/product*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('product.index') }}" title="" class="{{ Request::is('admin/product') ? 'active' : '' }}">product list</a></li>
                            <li><a href="{{ route('product.create') }}" class="{{ Request::is('admin/product/create') ? 'active' : '' }}">Add Product</a></li>
                             <li><a href="{{ route('category.index') }}" title="" class="{{ Request::is('admin/product/category') ? 'active' : '' }}">Categories</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children {{ Request::is('admin/order*') ? 'active' : '' }}"> <a title=""><i class="fa fa-tags"></i><span>Order</span></a>
                        <ul class="{{ Request::is('admin/order*') ? '' : 'mega' }}" style="{{ Request::is('admin/order*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('order.index') }}" title="" class="{{ Request::is('admin/order') ? 'active' : '' }}">Order List</a></li>
                            
                            
                        </ul>
                    </li>
                     <li class="menu-item-has-children {{ Request::is('admin/slider*') ? 'active' : '' }}"> <a title=""><i class="fa fa-sliders"></i><span>Slider</span></a>
                        <ul class="{{ Request::is('admin/slider*') ? '' : 'mega' }}" style="{{ Request::is('admin/slider*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('slider.index') }}" title="" class="{{ Request::is('admin/slider') ? 'active' : '' }}">Slider List</a></li>
                            <li><a href="{{ route('slider.create') }}" class="{{ Request::is('admin/slider/create') ? 'active' : '' }}">Add New</a></li>
                            
                            
                        </ul>
                    </li>
                     <li class="menu-item-has-children {{ Request::is('admin/widget*') ? 'active' : '' }}"> <a title=""><i class="fa fa-building"></i><span>Widget</span></a>
                        <ul class="{{ Request::is('admin/widget*') ? '' : 'mega' }}" style="{{ Request::is('admin/widget*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('widget.index') }}" title="" class="{{ Request::is('admin/widget') ? 'active' : '' }}">Widget List</a></li>
                            <li><a href="{{ route('widget.create') }}" class="{{ Request::is('admin/widget/create') ? 'active' : '' }}">Add New</a></li>
                            
                            
                        </ul>
                    </li>
                     <li class="menu-item-has-children {{ Request::is('admin/coupon*') ? 'active' : '' }}"> <a title=""><i class="fa fa-eraser"></i><span>coupon</span></a>
                        <ul class="{{ Request::is('admin/coupon*') ? '' : 'mega' }}" style="{{ Request::is('admin/coupon*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('coupon.index') }}" title="" class="{{ Request::is('admin/coupon') ? 'active' : '' }}">Coupon List</a></li>
                            <li><a href="{{ route('coupon.create') }}" class="{{ Request::is('admin/coupon/create') ? 'active' : '' }}">Add New</a></li>
                            
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children {{ Request::is('admin/currency*') ? 'active' : '' }}"> <a title=""><i class="fa fa-dollar"></i><span>Currency</span></a>
                        <ul class="{{ Request::is('admin/currency*') ? '' : 'mega' }}" style="{{ Request::is('admin/currency*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('currency.index') }}" title="" class="{{ Request::is('admin/currency') ? 'active' : '' }}">Currency list</a></li>
                            <li><a href="{{ route('currency.create') }}" class="{{ Request::is('admin/currency/create') ? 'active' : '' }}">Add Currency</a></li>
                        </ul>
                    </li>
                      <li class="menu-item-has-children {{ Request::is('admin/customer*') ? 'active' : '' }}"> <a title=""><i class="fa fa-user"></i><span>Customer</span></a>
                        <ul class="{{ Request::is('admin/customer*') ? '' : 'mega' }}" style="{{ Request::is('admin/customer*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('customer.index') }}" title="" class="{{ Request::is('admin/customer') ? 'active' : '' }}">Customer list</a></li>
                            
                        </ul>
                    </li>
                      <li class="menu-item-has-children {{ Request::is('admin/page*') ? 'active' : '' }}"> <a title=""><i class="fa fa-book"></i><span>page</span></a>
                        <ul class="{{ Request::is('admin/page*') ? '' : 'mega' }}" style="{{ Request::is('admin/page*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('page.index') }}" title="" class="{{ Request::is('admin/page') ? 'active' : '' }}">All pages</a></li>
                            <li><a href="{{ route('page.create') }}" class="{{ Request::is('admin/page/create') ? 'active' : '' }}">Add New</a></li>
                        
                        </ul>
                    </li>
                     <li class="menu-item-has-children {{ Request::is('admin/navigation*') ? 'active' : '' }}"> <a title=""><i class="fa fa-bookmark"></i><span>navigation</span></a>
                        <ul class="{{ Request::is('admin/navigation*') ? '' : 'mega' }}" style="{{ Request::is('admin/navigation*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('navigation.index') }}" title="" class="{{ Request::is('admin/navigation') ? 'active' : '' }}">navigation list</a></li>
                            <li><a href="{{ route('navigation.create') }}" class="{{ Request::is('admin/navigation/create') ? 'active' : '' }}">Add New</a></li>
                        </ul>
                    </li>
                      <li class="menu-item-has-children {{ Request::is('admin/subscriber*') ? 'active' : '' }}"> <a title=""><i class="fa fa-bell"></i><span>Subscriber</span></a>
                        <ul class="{{ Request::is('admin/subscriber*') ? '' : 'mega' }}" style="{{ Request::is('admin/subscriber*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('subscriber.index') }}" title="" class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">Subscriber list</a></li>
                            
                        </ul>
                    </li>
                     <li class="menu-item-has-children {{ Request::is('admin/contact*') ? 'active' : '' }}"> <a title=""><i class="fa fa-envelope"></i><span>Contact</span></a>
                        <ul class="{{ Request::is('admin/contact*') ? '' : 'mega' }}" style="{{ Request::is('admin/contact*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('contact.index') }}" title="" class="{{ Request::is('admin/contact') ? 'active' : '' }}">Contact list</a></li>
                            
                        </ul>
                    </li>
                     <li class="menu-item-has-children {{ Request::is('admin/blog*') ? 'active' : '' }}"> <a title=""><i class="fa fa-file-text"></i><span>blog</span></a>
                        <ul class="{{ Request::is('admin/blog*') ? '' : 'mega' }}" style="{{ Request::is('admin/blog*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('blog.index') }}" title="" class="{{ Request::is('admin/blog') ? 'active' : '' }}">All blogs</a></li>
                            <li><a href="{{ route('blog.create') }}" class="{{ Request::is('admin/blog/create') ? 'active' : '' }}">Add New</a></li>
                            <li><a href="{{ route('blogcategory.index') }}" class="{{ Request::is('admin/blog/blogcategory') ? 'active' : '' }}">Blogcategories</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children {{ Request::is('admin/user*') ? 'active' : '' }}"> <a title=""><i class="fa fa-cog"></i><span>Settings</span></a>
                        <ul class="{{ Request::is('admin/user*') ? '' : 'mega' }}" style="{{ Request::is('admin/user*') ? 'display: inline-block;' : '' }}">
                            <li><a href="{{ route('user.edit') }}" title="" class="{{ Request::is('admin/user') ? 'active' : '' }}">User Settings</a></li>
                           <li><a href="{{ route('site.edit') }}" title="" class="{{ Request::is('admin/site') ? 'active' : '' }}">Site Settings</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>