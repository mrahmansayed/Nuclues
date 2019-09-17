<?php

namespace Laramaster\Nuclues\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsTo('Laramaster\Nuclues\Models\Category');
    }

    public function productimages()
    {
    	return $this->HasMany('Laramaster\Nuclues\Models\Productimage');
    }
}
