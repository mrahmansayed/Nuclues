## Laravel Ecommerce Package

A simple ecommerce package implementation for Laravel.

## Installation

Install the package through [Composer](http://getcomposer.org/). 

Run the Composer require command from the Terminal:
	
	composer require laramaster/nuclues

Now you're ready to start using the shoppingcart in your application.

## Usage

First you need set up laravel default authentication in your application

This package has configuration files which can be configured to your needs.

Deploy the prooph config files to add your configuration for the prooph components.

	php artisan vendor:publish --tag=public

Then you need migrate some table.

	php artisan migrate

The shoppingcart gives you the following methods to use:

### Product::get();

Of course you also want to get the product content. This is where you'll use the `get` method. This method will return a Collection of ProductsItems which you can iterate over and show the content to your customers.

	Product::get();

Suppose you want to get latest,oldest,featured,best selling,related products. So you can pass parameter in this method.

	Product::get('latest'); //Will get latest product
	Product::get('oldest'); //will get oldest product
	Product::get('featured'); //will get featured product
	Product::get('best_selling'); //will get best selling product
	Product::get('random'); //will get random product

Now you want to get 5 or 3 latest,oldest,featured,best_selling,random product then you can use in this method.

	Product::get('latest',3); //will get latest 3 product
	Product::get('oldest',5); //will get oldest 5 product
	Product::get('featured',7); //will get featured 7 product
	Product::get('best_selling',12); //will get best_selling 12 product
	Product::get('random',15); //will get random 15 product

### Products::details('product 1');

Now you want to get single product. So,you can use in this method. And you must be pass product subtitle not product id.
	
	Products::details($product->subtitle);

### Product::pre_next('1');

If you use this method you can get previous and next product. You need pass product is in this method.

	Product::pre_next($product->id);

### Product::bycategory('categoryId',2);

If you want to get product by category then you can use this method. 

	Product::bycategory('categoryId',5); //First parameter will be your category id and second parameter will be how many product you want to get.  

### Product::bysubcategory('subcategoryId',2);

If you want to get product by subcategory then you can use this method. 

	Product::bysubcategory('subcategoryId',5); //First parameter will be your subcategory id and second parameter will be how many product you want to get.  

### Cart::get();

You can use this method for get your cart item.

	Cart::get();

### Cart::add('product id','product name','product price','product qty');

You can use this method for add product in your cart

	Cart::add(1,'product 1',100.00,4);

### Cart::update('product id','product qty');

You can use this method for update cart

	Cart::update(1,8);

### Cart::subtotal();

You can use this method for get cart subtotal price.

	Cart::subtotal();

### Cart::total();

You can use this method for get cart total price

### Cart::remove('cart id');

You can use this method for delete item from cart

	Cart::remove(1);

### Cart::count();

You can use this method for total cart quantity

	Cart::count();

### Cart::has();

This method will be check that you have any item in cart

	Cart::has();

### Cart::destroy();

You can use this method for delete all item from cart

	Cart::destroy();














