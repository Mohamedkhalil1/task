<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];

    public function options(){
        return $this->hasMany(Option::class,'attribute_id');
    }

}
