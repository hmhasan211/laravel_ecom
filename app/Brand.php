<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['brand_name','brand_description','pub_status'];
//    public function brand(){
//        return $this->hasMany(product::class,'brand_id','id');
//    }
}
