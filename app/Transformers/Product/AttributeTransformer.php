<?php

namespace App\Transformers\Product;

use App\Models\Attribute;
use League\Fractal\TransformerAbstract;

class AttributeTransformer extends TransformerAbstract
{
    public function transform(Attribute $attr)
    {
        return [
            'id' => $attr->id,
            'name' => $attr->name, 
        ];
    }

      public static function originAttribute ($index){
        $attrubites = [
            'id'          => 'id', 
            'name'         => 'name'
        ];
        return isset($attrubites[$index]) ? $attrubites[$index] : null ;
    }

}
