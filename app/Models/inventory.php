<?php

namespace App\Models;

use App\Transformers\Variant\VariantTransformer;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $guarded = [];


    public $transformer = VariantTransformer::class;

    protected $casts = [
        'array_values' => 'array'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

}
