<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';

    public function haveCategories() {                  //foreign, local
        return $this->hasMany('App\Category', 'item_id', 'id');
   }
}
