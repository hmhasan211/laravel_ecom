<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable=['category_name','category_description','pub_status'];
//    public function product(){
//        return $this->hasMany(product::class,'category_id','id');
//    }
}

