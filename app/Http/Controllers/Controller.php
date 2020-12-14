<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $error_msg= "Something goes wrong , please try again";
    protected $added_msg= "has been added";
    protected $updated_msg = "has been updated";
    protected $deleted_msg = "has been deleted";

    protected $map = [
        'Shipment Received' => 'Accepted',
        'At Warehouse'      => 'Prepared',
        'Out For Delivery'  => 'Shipped',
        'Delivered'         => 'Delivered',
        'Cancelled'         => 'Cancelled'
    ];

    protected $color = [
        'white' => '#FFF',
        'dark blue' => '#00008B',
        'gray'  => '#808080',
        'black'         => '#000',
        'indigo'         => '#4b0082',
        'blue'       => '#0000FF',
        'red'       => '#FF0000',
        'yellow'    =>'#FFFF00',
        'pink'     => '#FFC0CB',
        'fuchsia' => '#FF00FF',
        'rose' => '#ff007f',
        'purple'=>'#800080',
        'purble'=>'#800080',
        'beige' => '#F5F5DC',
        'baby blue' =>'#89CFF0' ,
        'silver' =>'#C0C0C0',
        'cool intentions' => '#6B3330',
        'camel' => '#c19a6b',
        'burgundy' => '#800020',
        'mint' =>'#98ff98',
        'orange' => '#FFA500',
        'green' => '#008000',
        'navy' => '#000080',
        'jeans' =>'#1560bd', 
        'royal blue' => '#002366',
        'stripe blue'=>'#008cdd',
        'ombre' =>'#a86e64',
        'light pink' =>'#FFB6C1',
        'moody' => '#a67173',
        'aloe vera' =>'#759966',
        'brown'=>'#A52A2A',
        'grey'=>'#808080',
        'denim' => '#1560bd',
        'dark simon'=>'#e9967a',
        'turquoise' => '#40E0D0',
        'sky' => '87ceeb',
        'alabaster'=>'#f2f0e6',
        'pink porcelaine' => '#F9CED8',
        'marble' =>'#E6E4D8',
        'ivory beige' => '#FFFFF0',
        'soft sand' => '#edc9af',
        'beige nude' => '#E3BC9A',
        'pink beige' => '#b39283',
        'sand' => '#c2b280',
        'warm ivory'=>'#efebd8',
        'dark sand' => '#a88f59',
        'natural beige' => '#f5f5dc',
        'desert' => '#edc9af',
        'golden sand' => '#F2D16B',
        'golden honey' => '#ebaf4c',
        'golden beige' => '#a7825d',
        'almond' => '#efdecd',
        'amber' => '#ffbf00',
        'neutral beige' => '#f5f5dc',
        'pearl' =>'#eae0c8',
        'nude ivory'=> '#fff4c6',
        'cinnamon' => '#d2691e',
        'sand beige' => '#a0a494',
        'macadamia' => '#d5c6ac',
        'apricot beige' => '#fbceb1',
        'caramel' => '#FFD59A',
        'honey' => '#8b6647',
        'hazelut'=>'b8a894',
        'praline'=>'#f09816',
        'chestnut' => '#954535',

    ];

    protected $colorName = [
         '#FFF' => 'white',
         '#00008B'=>'dark blue',
         '#808080' => 'gray',
         '#000'    => 'black',
         '#4b0082'=> 'indigo'  ,
         '#0000FF'       => 'blue',
         '#FF0000'  => 'red',
         '#FFFF00'  =>'yellow',
         '#FFC0CB'=> 'pink',
         '#FF00FF' => 'fuchsia',
         '#ff007f'=>  'rose',
         '#800080'=> 'purple',
         '#F5F5DC'=> 'beige',
         '#89CFF0' =>'baby blue' ,
         '#C0C0C0' =>'silver',
         '#6B3330' =>'cool intentions' ,
         '#c19a6b' =>'camel' ,
         '#800020' =>'burgundy' ,
         '#98ff98'=>'mint',
         '#FFA500' => 'orange',
         '#008000'=> 'green',
         '#000080' =>'navy' ,
         '#1560bd' =>'jeans', 
         '#002366' =>'royal blue' ,
         '#008cdd'=>'stripe blue',
         '#a86e64' =>'ombre',
         '#FFB6C1' =>'light pink',
         '#a67173' =>'moody',
         '#759966' =>'aloe vera',
         '#A52A2A'=>'brown',
         '#808080'=>'grey'
    ];
    

    protected $pagination = 15;

    function uploadImage($folder,$image){
        $image->store('/',$folder);
        $filename= $image->hashName();
        $path = 'images/'.$folder.'/'.$filename;
        return $path;
    }
}
