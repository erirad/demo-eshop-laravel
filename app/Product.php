<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function haveOneCategory() {            //foreign  local
       return $this->hasOne('App\Category', 'id', 'category_id');
     }

    public function haveManyDescriptions() {                  //foreign, local
         return $this->hasMany('App\Description', 'product_id', 'id');
    }
    public function haveManyMaterials() {                  //foreign, local
         return $this->hasMany('App\Material', 'product_id', 'id');
    }
    public function hasManySizes() {                  //foreign, local
         return $this->hasMany('App\Size', 'product_id', 'id');
    }
}
