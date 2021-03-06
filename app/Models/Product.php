<?php

namespace App\Models;

use App\Transformers\Product\ProductTransformer;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'created_at','image','updated_at'
    ];

    public $transformer = ProductTransformer::class;

    
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }
    
    public function options(){
        return $this->hasMany(Option::class,'product_id');
    }

    public function inventories(){
        return $this->hasMany(inventory::class,'product_id');
    }

    public function attributes(){
        return $this->belongsToMany(Attribute::class,'options','product_id','attribute_id');
    }

}
