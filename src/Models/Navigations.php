<?php

namespace Laramaster\Nuclues\Models;

use Illuminate\Database\Eloquent\Model;

class Navigations extends Model
{
    public function menus()
    {
    	return $this->HasMany('Laramaster\Nuclues\Models\Menus');
    }
}
