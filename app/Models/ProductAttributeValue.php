<?php

namespace App\Models;

use App\Transformers\Product\AttributeTransformer;
use App\Transformers\Product\ProductAttributeTransformer;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $guarded = [];

    public $transformer = ProductAttributeTransformer::class;

    protected $hidden = ['created_at','updated_at','product_id','attribute_id'];
}
