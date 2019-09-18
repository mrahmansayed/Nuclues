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







