<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class products implements FromView
{
    protected $products;
 

    public function __construct($products)
    {
        $this->products = $products;
    }
    public function view() : view
    {
        return view('exports.products', [
            'products' => $this->products
        ]);
    }
}
