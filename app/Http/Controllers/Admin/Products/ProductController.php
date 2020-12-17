<?php

namespace App\Http\Controllers\Admin\Products;


use App\Http\Controllers\Controller;
use App\Http\Requests\Products\ProductRequest;
use App\Http\Requests\Products\ProductVariantRequest;
use App\Models\Attribute;
use App\Models\inventory;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductAttributeValue;
use App\Models\ProductImage;
use App\Models\Attribute_value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
                $array_values = explode('/',$item);
                foreach($array_values as $index => $value){
                    $attr_value = Attribute_value::where('value',$value)
                            ->where('attribute_id',$product->options[$index]->attribute_id)->first();
                          
                    if($attr_value === null){
                        Attribute_value::create([
                            'value' => $value,
                            'count' => 1,
                            'attribute_id' => $product->options[$index]->attribute_id
                        ]);
                    }else{
                        $attr_value->update([
                            'count' =>  $attr_value->count+1
                        ]);
                    }
                    $attr_product_value = ProductAttributeValue::where('value',$value)
                    ->where('attribute_id',$product->options[$index]->attribute_id)
                    ->where('product_id',$product->id)->first();

                    if($attr_product_value === null){
                        $attr_product_value = ProductAttributeValue::create([
                            'value' => $value,
                            'count' => 1,
                            'attribute_id' => $product->options[$index]->attribute_id,
                            'product_id' => $product->id
                        ]);
                    }else{
                        $attr_product_value->update([
                            'count' =>  $attr_product_value->count+1
                        ]);
                    }
                    
                }
                inventory::create([
                    'value' => $item,
                    'product_id' => $product->id,
                    'price' => 0,
                    'quantity' => 0,
                    'array_values' => $array_values
                ]);
            }

            DB::commit();            
            
            ## Step 2
            ## get all variant to make action on them (delete , update price and quantity)
         
            return redirect()->route('admin.products.show.variants',$product->id)->with(['success' => 'Product '.$this->added_msg]);
        }catch(\Exception $ex){
            DB::rollback();
            Log::error($ex);
            dd($ex);
            return redirect()->back()->with(['error' => $this->error_msg]);
        }
     
    }

    public function showVariants($product_id){
        try{
            $items = inventory::where('product_id',$product_id)->get();
            return view('admin.products.variant',compact('items','product_id'));
        }catch(\Exception $ex){
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
            $array_values = array();
            foreach($request->options as $option){
                $params['value'] =$params['value'].'/'.$option;
                array_push($array_values,$option);
            }
            $params['array_values']=$array_values;
            $params['value']=ltrim($params['value'],'/');
            
            inventory::findOrFail($id)->update($params);
            return redirect()->back()->with(['success' =>'Variant '.$this->updated_msg]);
        }catch(\Exception $ex){
           
            return redirect()->back()->with(['error' => $this->error_msg]);
        }  
    }

    public function remove_variant($product_id , $variant_id){

        try{
            DB::beginTransaction();
            $varient = inventory::findOrFail($variant_id);
            
            $options = $varient->product->options;
            foreach($options as $index => $option){
               $attr_value = Attribute_value::where('attribute_id',$option->attribute_id)
                    ->where('value',$varient->array_values[$index])->first();

                $attr_value->update([
                    'count' => $attr_value->count-1
                ]);

                $product_attr_value = ProductAttributeValue::where('attribute_id',$option->attribute_id)
                ->where('value',$varient->array_values[$index])
                ->where('product_id',$product_id)->first();
                $product_attr_value->update([
                    'count' => $product_attr_value->count-1
                ]);
            }

            if((int)$varient->price !== 0){
                $varient->delete();
                DB::commit();
                return redirect()->route('admin.products')->with(['success' => 'Product '.$this->deleted_msg]);
            }
            $varient->delete();
            DB::commit();
            return redirect()->route('admin.products.show.variants',$product_id)->with(['success' => 'Variant '.$this->deleted_msg]);
            //return view('admin.products.variant',compact('items','product_id'));
        }catch(\Exception $ex){
            dd($ex);
            DB::rollback();
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



    /* API ROUTES */

    ## get general options for all products 
    public function get_option(Request $request){
        try{
            $attr = Attribute::where('name',$request->option)->first();
            if($attr === null){
                return $this->errorResponse('0000',"this attribute is not exist",404); 
            }
            $values = $attr->values()->where('count','>',0)->get();
    
            return $this->showAll($attr->name,$values);
        }catch(\Exception $ex){
            return $this->errorResponse('0000',$ex->getMessage(),404);
        }
    }

    ## get all option attributes value for one product 
    public function get_product_options(Request $request,$id){
        $attr = Attribute::where('name',$request->option)->first();
        $data = ProductAttributeValue::where('attribute_id',$attr->id)->where('product_id',$id)
                    ->where('count','>',0)->get();
        return $this->showAll('options',$data); 
    }
    

    ## get specific product with his optional attributes and variants
    public function get_product($id){
        // $product = Product::with('attributes','inventories')->find($id);
        $product = Product::find($id);
         return $this->showOne('product',$product);  
    }

    ## searching with options (color red , size L) and return all products with these options
    ## get products form options
    public function products(Request $request){
        $params = $request->all();
        $params = array_values($params);
        $products = inventory::whereJsonContains('array_values',$params)->get();
        return $this->showAll('products',$products);
    }

    
}
