<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'created_at','updated_at','pivot'
    ];

    public function options(){
        return $this->hasMany(Option::class,'attribute_id');
    }

    public function values(){
        return $this->hasMany(Attribute_value::class,'attribute_id');
    }

}
