@extends('layouts.admin')
@section('title',"Add Variant")
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard table-responsive">
                                        <form method="post" action="{{route('admin.products.store.variant')}}">
                                            @csrf
                                            <table class="table table-de mb-0 display nowrap table-striped table-bordered">
                                                <thead class="">
                                                <tr>
                                                    <th>variant</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Remove</th>
                                                </tr>
                                                </thead>
                                                @foreach ($items as $item)
                                                <tbody>
                                                
                                                        <td>{{$item->value}}</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <input type="text" value="{{old('price')}}" id="size"
                                                                            class="form-control"
                                                                            placeholder="Product Price"
                                                                            name="price[]">
                                                                    @error("price")
                                                                    <span class="text-danger"> {{ $message }} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <div class="form-group">
                                                            <div class="form-group">
                                                                <input type="hidden" value="{{$product_id}}"
                                                                        class="form-control"
                                                                        placeholder=""
                                                                        name="product_id">
                                                                @error("product_id")
                                                                <span class="text-danger"> {{ $message }} </span>
                                                                @enderror
                                                            </div>
                                                        </div>


                                                        <td>
                                                            <div class="form-group">
                                                                <div class="form-group">
                                                                    <input type="text" value="{{old('quantity')}}" id="size"
                                                                            class="form-control"
                                                                            placeholder="Product Quantity"
                                                                            name="quantity[]">
                                                                    @error("quantity")
                                                                    <span class="text-danger"> {{ $message }} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </td>


                                                        <td>
                                                            <a class="btn btn-lg" href="{{route('admin.products.variant.remove',[$product_id,$item->id])}}">
                                                                <i class=" mr-1 ft-trash-2" style="color: #637381;"></i>
                                                            </a>
                                                        </td>
                                                </tbody>
                                                @endforeach
                                            </table>

                                            <div class="form-actions mb-2">
                                             
                                                <button type="submit" class="btn btn-primary float-right">
                                                    Save
                                                </button>

                                                <button type="button" class="btn btn-warning mr-1 float-right"
                                                        onclick="history.back();">
                                                     Back
                                                </button>

                                            </div>

                                        </form>
                                        
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
