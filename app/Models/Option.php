<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

}
