<?php

namespace Laramaster\Nuclues\Models;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
     public function products()
    {
    	return $this->HasMany('Laramaster\Nuclues\Models\Product');
    }
}
