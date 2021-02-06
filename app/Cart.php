<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\product;

class Cart extends Model
{
    public function products(){
        return $this->belongsTo(product::class,'product_id');
    }
}
