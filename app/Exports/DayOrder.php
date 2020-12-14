<?php

namespace App\Exports;

use App\Models\OrderDetails;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DayOrder implements FromView
{

    use Exportable;

    protected $orders;
    protected $details ;
    protected $amount ;

    public function __construct($orders,$details,$amount)
    {
        $this->orders = $orders;
        $this->details = $details;
        $this->amount = $amount;
    }

      /**
    * @return \Illuminate\Support\Collection
    */
    public function view() : view
    {
        
        return view('exports.orders', [
            'orders' => $this->orders,
            'details'=> $this->details,
            'amount' => $this->amount
        ]);
    }

}
