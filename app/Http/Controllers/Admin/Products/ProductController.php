<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductRequest;
use App\Http\Requests\Products\ProductVariantRequest;
use App\Models\Attribute;
use App\Models\inventory;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
   
    public function index()
    {
       
        try{
            $products = Product::all();
            return view('admin.products.index',compact('products'));
        }catch(\Exception $ex){
          
            return redirect()->route('admin.products')->with(['error' =>  $this->error_msg]);
        }
        
    }

    public function inventory()
    {
        try{
            $products = inventory::all();
            return view('admin.products.inventory',compact('products'));
        }catch(\Exception $ex){
            return redirect()->route('admin.products')->with(['error' =>  $this->error_msg]);
        }
        
    }

    
    public function create()
    {
        try{
            return view('admin.products.create');  
        }catch(\Exception $ex){
            dd($ex);
            return redirect()->route('admin.products')->with(['error' => $this->error_msg]);
        }
    }

    public function store(ProductRequest $request)
    {
    
        try{
            DB::beginTransaction();
            
            ## Step 1  
                ## create products with its variant 

            ## get general information
            $params = $request->only([
                'title','description','price','price_discount','stock'
            ]);
            ## create general product
            $product = Product::create($params);
    
            #Media
            if($request->has('document') && count($request->document) > 0 ){
                foreach($request->document as $image){
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $image
                    ]);
                }
            }

            ## get options array
            $options = $request->repeater_group;
           

            ## if variant is null then create only product
            if($options[0]['option'] === null){
                DB::commit();
                return redirect()->route('admin.products')->with(['success' => 'Product '.$this->added_msg]);
            }

            ## sperate value and keys
            $option_values =array();
            for($i=0 ; $i< count($options) ;$i++){
                $arr['item '.$i]=explode(',',$options[$i]['option_value']);
                array_push($option_values,$options[$i]['option_value']);
            }

            ## get all combinations of options
            $result = $this->get_combinations($arr);
            $final=array();
            $variant = '';
            foreach($result as $item){
                foreach($item as $i){
                    $variant = $variant.'/'.$i;
                }
                array_push($final,ltrim($variant,'/'));
                $variant='';
            }
           // dd($final);
            $option_key = array();
            //dd($option_values);
            for($i=0 ; $i< count($options) ;$i++){
               array_push($option_key,$options[$i]['option']);
               $attr = Attribute::where('name',strtolower($options[$i]['option']))->first();
               if($attr === null){
                   $attr = Attribute::create([
                    'name' => $options[$i]['option']
                   ]);
               }
                Option::create([
                    'product_id' => $product->id,
                    'attribute_id' => $attr->id,
                ]);
            }
            
            ## create variant for this product
            foreach($final as $item){
                inventory::create([
                    'value' => $item,
                    'product_id' => $product->id,
                    'price' => 0,
                    'quantity' => 0
                ]);
            }

            DB::commit();            
            

            ## Step 2
            ## get all variant to make action on them (delete , update price and quantity)
            $items = inventory::where('product_id',$product->id)->get();
            $product_id = $product->id;
            return view('admin.products.variant',compact('items','product_id'));
        
         
            return redirect()->route('admin.products')->with(['success' => 'Product '.$this->added_msg]);
        }catch(\Exception $ex){
            DB::rollback();
            return redirect()->back()->with(['error' => $this->error_msg]);
        }
     
    }

    // save images into folder only 
    public function saveProductImage(Request $request){
        $file = $request->file('dzfile');
        $filename = uploadImage('products',$file);
        return response()->json([
            'name' => $filename,
            'origin_name' => $file->getClientOriginalName() 
        ]);
    }

    ## Step 2 
    public function store_variant(ProductVariantRequest $result){
        try{
            $products = inventory::where('product_id',$result->product_id)->get();
            foreach($products as $index => $product){
                $product->price = $result->price[$index];
                $product->quantity = $result->quantity[$index];
                $product->save();
            }
            return redirect()->route('admin.products')->with(['success' => 'Product '.$this->added_msg]);

        }catch(\Exception $ex){
            //dd($ex->getMessage());
            return redirect()->back()->with(['error' => $this->error_msg]);
        }
        
    }

    public function edit($id){
        {
            try{
                $variant = inventory::find($id);
                $product  = $variant->product;
                $options  = $product->options;

                return view('admin.products.edit',compact('variant','product','options'));
            }catch(\Exception $ex){
                //dd($ex);
                return redirect()->route('admin.products')->with(['error' => $this->error_msg]);
            }
            
        }
    }

    

    public function update(ProductRequest $request, $id)
    {
        try{
            DB::beginTransaction();
            DB::commit();
            return redirect()->route('admin.products')->with(['success' =>'Product '.$this->updated_msg]);
        }catch(\Exception $ex){
            DB::rollback();
           // dd($ex);
            return redirect()->route('admin.products')->with(['error' => $this->error_msg]);
        }  
    }


    public function variant_update(Request $request , $id){
        try{
           
            $params = $request->only('price','quantity');
            $params['value']='';
            foreach($request->options as $option){
                $params['value'] =$params['value'].'/'.$option;
            }
            $params['value']=ltrim($params['value'],'/');
            
            inventory::findOrFail($id)->update($params);
            return redirect()->back()->with(['success' =>'Variant '.$this->updated_msg]);
        }catch(\Exception $ex){
         
            dd($ex);
            return redirect()->back()->with(['error' => $this->error_msg]);
        }  
    }

    public function remove_variant($product_id , $variant_id){

        try{
            inventory::findOrFail($variant_id)->delete();
            $items = inventory::where('product_id',$product_id)->get();
            return view('admin.products.variant',compact('items','product_id'));
        }catch(\Exception $ex){
            return redirect()->route('admin.products')->with(['error' => $this->error_msg]);
        }
        
    }



    private function get_combinations($arrays) {
        $result = array(array());
        foreach ($arrays as $property => $property_values) {
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));   
                }
            }
            $result = $tmp;
        }
        return $result;
    }


}
