<?php

namespace Laramaster\Nuclues\Models;

use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
    public function product()
    {
    	return $this->belogsTo('Laramaster\Nuclues\Models\Product');
    }
}
