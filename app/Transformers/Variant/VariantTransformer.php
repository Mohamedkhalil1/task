<?php

namespace App\Transformers\Variant;

use App\Models\inventory;
use League\Fractal\TransformerAbstract;

class VariantTransformer extends TransformerAbstract
{
    public function transform(inventory $variant)
    {
        return [
            'id' => $variant->id,
            'product_id' => $variant->product->id,
            'title' => $variant->product->title,
            'description' => $variant->product->description,
            'price' => $variant->price,
            'quantity' => $variant->quantity,
            'array_values' => $variant->array_values 
        ];
    }

    public static function originAttribute ($index){
        $attrubites = [
            'id'          => 'id'
        ];
        return isset($attrubites[$index]) ? $attrubites[$index] : null ;
    }

}
