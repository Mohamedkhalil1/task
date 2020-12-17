<?php

namespace App\Transformers\Product;

use App\Models\Attribute_value;
use League\Fractal\TransformerAbstract;

class OptionTransformer extends TransformerAbstract
{
   
    public function transform(Attribute_value $attr_value)
    {
        return [
            'id' => $attr_value->id,
            'value' => $attr_value->value
        ];
    }

    public static function originAttribute ($index){
        $attrubites = [
            'id'          => 'id', 
            'value'         => 'value'
        ];
        return isset($attrubites[$index]) ? $attrubites[$index] : null ;
    }
    

}
