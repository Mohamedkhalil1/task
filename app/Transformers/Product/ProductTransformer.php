<?php

namespace App\Transformers\Product;

use App\Models\Product;
use App\Traits\GeneralTrait;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
{
    use GeneralTrait;

    public function transform(Product $product)
    {
        $attributes = $this->transformData($product->attributes,AttributeTransformer::class);
        $inventories = $this->transformData($product->inventories,VariantTransformer::class);
        return [
            'id' => $product->id,
            'title' => $product->title,
            'description'=> $product->description,
            'price' => $product->price,
            'stock' => $product->stock,
            'price_discount'=> $product->price_discount,
            'attributes' => $attributes['data'],
            'inventories' =>$inventories['data']
        ];
    }
}
