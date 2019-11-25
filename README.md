## Laravel Ecommerce Package

A simple ecommerce package implementation for Laravel.

## Installation

Install the package through [Composer](http://getcomposer.org/). 

Run the Composer require command from the Terminal:
	
	composer require laramaster/nuclues

Now you're ready to start using the Nuclues in your application.

## Usage

First you need set up laravel default authentication in your application

This package has configuration files which can be configured to your needs.

Deploy the prooph config files to add your configuration for the prooph components.

	php artisan vendor:publish --tag=public

Then you need migrate some table.

	php artisan migrate

The Nuclues gives you the following methods to use:

### Product::get()

Of course you also want to get the product content. This is where you'll use the `get` method. This method will return a Collection of ProductsItems which you can iterate over and show the content to your customers.

	Product::get()

Suppose you want to get latest,oldest,featured,best selling,related products. So you can pass parameter in this method.

	Product::get('latest') //Will get latest product
	Product::get('oldest') //will get oldest product
	Product::get('featured') //will get featured product
	Product::get('best_selling') //will get best selling product
	Product::get('random') //will get random product

Now you want to get 5 or 3 latest,oldest,featured,best_selling,random product then you can use in this method.

	Product::get('latest',3) //will get latest 3 product
	Product::get('oldest',5) //will get oldest 5 product
	Product::get('featured',7) //will get featured 7 product
	Product::get('best_selling',12) //will get best_selling 12 product
	Product::get('random',15) //will get random 15 product

### Products::details('product 1')

Now you want to get single product. So,you can use in this method. And you must be pass product subtitle not product id.
	
	Products::details($product->subtitle)

### Product::pre_next(1)

If you use this method you can get previous and next product. You need pass product id in this method.

	Product::pre_next($product->id)

### Product::bycategory('categoryId',2)

If you want to get product by category then you can use this method. 

	Product::bycategory('categoryId',5) //First parameter will be your category id and second parameter will be how many product you want to get.  

### Product::bysubcategory('subcategoryId',2)

If you want to get product by subcategory then you can use this method. 

	Product::bysubcategory('subcategoryId',5) //First parameter will be your subcategory id and second parameter will be how many product you want to get.  

### Cart::get()

You can use this method for get your cart item.

	Cart::get()

### Cart::add('product id','product name','product price','product qty')

You can use this method for add product in your cart

	Cart::add(1,'product 1',100.00,4)

### Cart::update('product id','product qty')

You can use this method for update cart

	Cart::update(1,8)

### Cart::subtotal()

You can use this method for get cart subtotal price.

	Cart::subtotal()

### Cart::total()

You can use this method for get cart total price
	
	Cart::total()

### Cart::remove('cart id')

You can use this method for delete item from cart

	Cart::remove(1)

### Cart::count()

You can use this method for total cart quantity

	Cart::count()

### Cart::has()

This method will be check that you have any item in cart

	Cart::has()

### Cart::destroy()

You can use this method for delete all item from cart

	Cart::destroy()

### Wishlist::get()

You can use this method for get your wishlist item.

	Wishlist::get()

### Wishlist::add('product id','product name','product price','product qty')

You can use this method for add product in your wishlist

	Wishlist::add(1,'product 1',100.00,4)

### Wishlist::remove('wishlist id')

You can use this method for delete item from wishlist

	Wishlist::remove(1)

### Wishlist::count()

You can use this method for total wishlist quantity

	Wishlist::count()

### Wishlist::has()

This method will be check that you have any item in wishlist

	Wishlist::has()

### Compare::get()

You can use this method for get your Compare item.

	Compare::get()

### Compare::add('product id','product name','product price','product qty')

You can use this method for add product in your Compare

	Compare::add(1,'product 1',100.00,4)

### Compare::remove('Compare id')

You can use this method for delete item from Compare

	Compare::remove(1)

### Compare::count()

You can use this method for total Compare quantity

	Compare::count()

### Compare::has()

This method will be check that you have any item in Compare

	Compare::has()

### Blog::get()

You can use this method for get blog item

 	Blog::get()

### Blog::details('blog id')

You can use this method for get single blog item

	Blog::details(1)

### Category get()

Of course you also want to get the category content. This is where you'll use the `get` method. This method will return a Collection of categories which you can iterate over and show the content to your customers.

	Category::get()

Suppose you want to get latest,oldest category. So you can pass parameter in this method.

	Category::get('latest') //Will get latest Category
	Category::get('oldest') //will get oldest Category

Now you want to get 5 or 3 latest,oldest category then you can use in this method.

	Category::get('latest',3) //will get latest 3 category
	Category::get('oldest',5) //will get oldest 5 category

### Category::get()->subcategory

You can use this method for get subcategory by category

	Category::get()->subcategory

### Coupon::get()

This method will return coupon details

	Coupon::get()

### Coupon::add('Coupon code')

You can use this method for add coupon

 	Coupon::add('abc')

### Coupon::check('Coupon code')

This method will check that this coupon code has in your application

	Coupon::check('abc123')

### Currencies::get()

You can use this method for get all currency 

	Currencies::get()

### Currencies::add('currency code')

You can use this method for add currency in your application

	Currencies::add('usd')

### Currencies::price('Product price')

You can use this method for product currency price

	Currencies::price(100.00)

### Currencies::codeCheck()

You can use this method for check now which type currency has in your application
	
	Currencies::codeCheck()

### Review::get('product id')

You can use this method for get all review of your single product 

	Review::get(1)

### Review::add($data)

You can use this method for add review
	
	$data = [
		'product_id' => 1,
		'name' => "Arafat Hossain",
		'email' => "admin@example.com",
		'rating' => 4,
		'review' => "Wow! Nice product",
	];

	Review::add($data);

### Review::rating('product id')

You can use this method for get rating of a product

	Review::rating(1) //will get like 3.6/4.2/5

### Slider::get()

Of course you also want to get the slider content. This is where you'll use the `get` method. This method will return a Collection of sliders which you can iterate over and show the content to your customers.

	Slider::get()

Suppose you want to get latest,oldest slider. So you can pass parameter in this method.

	Slider::get('latest') //Will get latest slider
	Slider::get('oldest') //will get oldest slider

Now you want to get 5 or 3 latest,oldest slider then you can use in this method.

	Slider::get('latest',3) //will get latest 3 slider
	Slider::get('oldest',5) //will get oldest 5 slider

### Site::logo()

You can use this method for get site logo

	Site::logo()

### Site::name()

You can use this method for get site name

	Site::name()

### Page::get()

Of course you also want to get the page content. This is where you'll use the `get` method. This method will return a Collection of pages which you can iterate over and show the content to your customers.

	Page::get()

Suppose you want to get latest,oldest page. So you can pass parameter in this method.

	Page::get('latest') //Will get latest page
	Page::get('oldest') //will get oldest page

Now you want to get 5 or 3 latest,oldest page then you can use in this method.

	Page::get('latest',3) //will get latest 3 page
	Page::get('oldest',5) //will get oldest 5 page

### Navigation::get()

Of course you also want to get the navigation content. This is where you'll use the `get` method. This method will return a Collection of navigations which you can iterate over and show the content to your customers.

	Navigation::get()

Suppose you want to get latest,oldest Navigation. So you can pass parameter in this method.

	Navigation::get('latest') //Will get latest Navigation
	Navigation::get('oldest') //will get oldest Navigation

Now you want to get 5 or 3 latest,oldest Navigation then you can use in this method.

	Navigation::get('latest',3) //will get latest 3 Navigation
	Navigation::get('oldest',5) //will get oldest 5 Navigation

### Navigation::menu('navigation name')

You can use this method for get navigation menu
	
	Navigation::menu('Home')

### Subscriber::add('Email')

You can use this method for add subscriber

	Subscriber::add('admin@email.com')

### Contact::add('name','email','subject','message')

You can use this method for add information in contact list

	Contact::add('Arafat','admin@example.com','I need contact with you','Hello Arafat!')

### Widget::get()	

Of course you also want to get the widget content. This is where you'll use the `get` method. This method will return a Collection of widgets which you can iterate over and show the content to your customers.

	Widget::get()

Suppose you want to get latest,oldest widget. So you can pass parameter in this method.

	Widget::get('latest') //Will get latest widget
	Widget::get('oldest') //will get oldest widget

Now you want to get 5 or 3 latest,oldest widget then you can use in this method.

	Widget::get('latest',3) //will get latest 3 widget
	Widget::get('oldest',5) //will get oldest 5 widget

### Widget::byname('Widget Name')

You can use this method for get a single method

	Widget::byname('Shop Widget')

### Admin::is()

You can use this method for check that if User will be admin then he can access this controller

	Admin::is()

### Order::get()

You can use this method for get all order item

	Order::get()

### Order::add($data)

First you need add stripe package. 

Run the Composer require command from the Terminal:
	
	composer require cartalyst/stripe-laravel

Add follow `cartalyst/stripe-laravel` package requirment

You can use this method for add order 

	$data = [
		'user_id' => 1,
		'first_name' => "Arafat",
		'last_name' => "Hossain",
		'email' => "admin@example.com",
		'phone' => 0175694...,
		'address' => "Kirtipur",
		'country' => "Bangladesh",
		'city' => "Rajshahi",
		'state' => "Naogaon",
		'postal_code' => 6500,
		'total_amount' => Cart::total(),
		'payment_type' => "stripe",
		'currency_type' => Currencies::type(),
		'stripeToken' => $request->stripeToken, //It's will be stripe token
	];

	Order::add($data);

### License

The Laravel Nuclues package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)



	

	
























