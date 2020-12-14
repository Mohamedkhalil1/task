@extends('layouts.admin')
@section('title',"Edit Variant")
@section('content')

    <div class="app-content content">

        <div class="content-wrapper">
            
             <!-- ALERTS -->
             @include('admin.includes.alerts.success')
             @include('admin.includes.alerts.errors')

            <div class="content-detached content-right">

                <div class="content-body">
                <form class="form" action="{{route('admin.products.variant.update',$variant->id)}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" value="{{$variant->id}}" name="id">

                    <!-- option section -->
                    <section class="row">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Options</h4>
                            </div>
                            <div class="card-content">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        @foreach ($options as $index => $option)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput1">{{ucfirst($option->attribute->name)}}</label>
                                                <input type="text" value="{{explode('/',$variant->value)[$index]}}" 
                                                        class="form-control"
                                                        placeholder=""
                                                        name="options[]">
                                                @error("attributes")
                                                <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @endforeach  
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                        </div>
                        </div>
                    </section>

                    <!-- pricing section-->
                    <section class="row">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Pricing</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="projectinput1"> Price </label>
                                            <div class="input-group">
                                                <input type="number" value={{$variant->price}} class="form-control square" placeholder="Product Price" aria-label="Amount (to the nearest EGP)" name="price">
                                                <div class="input-group-append">
                                                <span class="input-group-text">EGP</span>
                                                </div>
                                            </div>
                                            @error("price")
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="projectinput1"> Price After Discount </label>
                                            <div class="input-group">
                                                <input type="number" value={{$variant->product->price_discount}} class="form-control square" placeholder="Product Price After Discount" aria-label="Amount (to the nearest EGP)" name="price_discount">
                                                <div class="input-group-append">
                                                <span class="input-group-text">EGP</span>
                                                </div>
                                            </div>
                                            @error("price_discount")
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </section>

                    <!-- inventory section-->
                    <section class="row">
                        <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Inventory</h4>
                            </div>
                            <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput1"> Quantity </label>
                                            <input type="number"
                                                    class="form-control"
                                                    placeholder="Product quantity"
                                                    value="{{$variant->quantity}}"
                                                    name="quantity">

                                            @error("quantity")
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            </div>
                        </div>
                        </div>
                    </section>
                  
                    <div class="form-actions mb-4">
                                                
                        <button type="submit" class="btn btn-primary float-right">
                            update
                        </button>

                        <button type="button" class="btn btn-danger">
                            <a style="color:white" href="{{route('admin.products.variant.remove',[$variant->product->id,$variant->id])}}">Remove Variant</a>
                        </button>
                    </div>

                </form>
                  
                </div>

            </div>
            <div class="sidebar-detached sidebar-left" ,=",">
              <div class="sidebar">
                <div class="bug-list-sidebar-content">

                    <!-- General Information -->
                  <div class="card">
                    <div class="card-header mb-0">
                      <h4 class="card-title">General Information</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content">
                      <div class="card-body  py-0 px-0">
                        <div class="list-group">
                          <a href="javascript:void(0)" class="list-group-item">
                            <div class="media">
                              <div class="media-left pr-1">
                                <span class="avatar avatar-sm avatar-online rounded-circle mr-2">
                                    @if($variant->product->images()->first() === null)
                                        <img src="" alt="image">
                                    @else
                                     <img src="{{asset('assets/'.$variant->product->images()->first()->image)}}" alt="image">
                                    @endif
                                </span>
                              </div>
                              <div class="media-body">
                                <h6 class="media-heading mb-0">{{$variant->product->title}}</h6>
                                <p class="font-small-2 mb-0">{{count($variant->product->inventories)." variants"}}</p>
                              </div>
                            </div>
                          </a>
                         
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/ General Information -->


                  <!-- Variant Section -->
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Variants</h4>
                    </div>
                    
                      <div class="card-body ">
                        <div class="list-group">
                            @foreach ($variant->product->inventories as $item)
                            
                            <a href="{{route('admin.products.edit',$item->id)}}" class="list-group-item list-group-item-action">
                                <span class="avatar avatar-sm avatar-online rounded-circle mr-4">
                                    @if($variant->product->images()->first() === null)
                                        <img src="" alt="image">
                                    @else
                                        <img src="{{asset('assets/'.$variant->product->images()->first()->image)}}" alt="image">
                                    @endif
                                  </span>
                                {{$item->value}}
                            
                            </a> 
                            @endforeach
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--/ Variant Section -->
                </div>
              </div>
            </div>

            

          </div>
          
          
    </div>

@endsection
