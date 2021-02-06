<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public function products(){
        return $this->belongsTo(product::class,'product_id');
    }
}
