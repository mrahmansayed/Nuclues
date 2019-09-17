<?php

namespace Laramaster\Nuclues\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
    	return $this->HasMany('Laramaster\Nuclues\Models\Product');
    }

     public function subcategory()
    {
    	return $this->HasMany('Laramaster\Nuclues\Models\SubCategory');
    }
}
