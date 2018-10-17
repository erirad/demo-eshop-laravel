<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';

    public function hasManyColors() {                  //foreign, local
         return $this->hasMany('App\Color', 'size_id', 'id');
    }
}
