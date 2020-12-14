@extends('layouts.admin')
@section('title',"Products")
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
           
            <div class="content-body">

                <div class="heading-elements mb-2 ">
                    <a href="{{route('admin.products.create')}}" class="btn btn-success btn-sm"><i class="ft-plus white"></i>Add Product</a>
                </div>
                
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                               

                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard table-responsive">
                                        
                                        <table class="table table-de mb-0 display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr>
                                                <th>Produt</th>
                                                <th>Inventory</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($products)
                                                @foreach($products as $product)
                                                    <tr>
                                                        <td>{{$product->title}}</td>
                                                        <td>
                                                            @if($product->inventories()->first() !== null )
                                                                <a href="{{route('admin.products.edit',$product->inventories()->first()->id)}}">
                                                                    {{$product->inventories->sum('quantity')." in stock for ".count($product->inventories)." variants"}}
                                                                </a>
                                                            @else
                                                                <a href="#">
                                                                    {{$product->inventories->sum('quantity')." in stock for ".count($product->inventories)." variants"}}
                                                                </a>
                                                            @endif
                                                        </td>
                                                            
                                                        
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        
                                        <div class="justify-content-center d-flex">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    
@endsection
