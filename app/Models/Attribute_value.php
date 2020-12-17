<?php

namespace App\Models;

use App\Transformers\Product\OptionTransformer;
use Illuminate\Database\Eloquent\Model;

class Attribute_value extends Model
{
    protected $guarded = [];

    public $transformer = OptionTransformer::class;

    protected $hidden =[
        'created_at','updated_at','attribute_id','count'
    ];
}
