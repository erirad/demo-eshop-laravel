<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function haveProducts() {               //foreign, local
        return $this->hasMany('App\Product', 'category_id', 'id');
   }
   public function haveItem() {            //foreign  local
      return $this->hasOne('App\Item', 'id', 'item_id');
    }
}
