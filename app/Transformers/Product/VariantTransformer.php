<?php

namespace App\Transformers\Product;

use App\Models\inventory;
use League\Fractal\TransformerAbstract;

class VariantTransformer extends TransformerAbstract
{
   
    public function transform(inventory $variant)
    {
        return [
            'id' => $variant->id,
            'price' => $variant->price,
            'quantity' => $variant->quantity,
            'array_values' => $variant->array_values
        ];
    }
}
