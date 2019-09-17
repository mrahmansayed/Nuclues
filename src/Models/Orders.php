<?php

namespace Laramaster\Nuclues\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
     public function products()
    {
    	return $this->belongsToMany('Laramaster\Nuclues\Models\Product');
    }
}
