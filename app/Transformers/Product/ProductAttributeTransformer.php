<?php

namespace App\Transformers\Product;

use App\Models\ProductAttributeValue;
use League\Fractal\TransformerAbstract;

class ProductAttributeTransformer extends TransformerAbstract
{
    
    public function transform(ProductAttributeValue $attr)
    {
        return [
            'id'     => $attr->id, 
            'value'  => $attr->value
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
