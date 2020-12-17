@extends('layouts.admin')
@section('title',"Add Product")
@section('content')

<div class="app-content content">
    <div class="content-wrapper">  
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title" id="basic-layout-form">Add New Product </h3>
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ALERTS -->
                            @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors')

                            <!-- FORM -->
                            <div class="card-content collapse show">
                                <div class="card-body">
                                  <form class="row" method="POST" action="{{route('admin.products.store')}}">
                                    @csrf
                                  
                                    <!-- Information-->
                                    <div class="col-12">
                                      <h4 class="form-section"><i class="ft-tag"></i>Product Information</h4>
                                      <div class="row"> 
                                        <div class="form-group col-md-12">
                                          <label>Title</label>
                                          <input type="text" class="form-control" placeholder="Title" name="title">
                                          @error("title")
                                          <span class="text-danger"> {{ $message }} </span>
                                          @enderror
                                        </div>
                                        
                                        <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="complaintinput5">Description </label>
                                              <textarea id="complaintinput5" rows="5" class="form-control round" name="description" placeholder="Product Description">{{old('description')}}</textarea>
                                              @error("description")
                                              <span class="text-danger"> {{ $message }} </span>
                                              @enderror
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Media -->
                                    <div class="col-12">
                                      <h4 class="form-section"><i class="ft-image"></i> Media </h4>
                                      <div class="row"> 
                                        <div class="form-group col-md-12">
                                          <div class="form-group">
                                              <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                  <div class="dz-message">Drop files to upload</div>
                                              </div>

                                              @error("document")
                                              <span class="text-danger"> {{ $message }} </span>
                                              @enderror
                                              <br><br>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    
                                    
                                    <!-- Pricing -->
                                    <div class="col-12">
                                      <h4 class="form-section"><i class="ft-money"></i>Pricing</h4>
                                      <div class="row"> 
                                        <div class="col-md-6">
                                          <label for="projectinput1"> Price </label>
                                          <div class="input-group">
                                              <input type="number" value="{{old('price')}}" class="form-control square" placeholder="Price" aria-label="Amount (to the nearest EGP)" name="price">
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
                                              <input type="number" value="{{old('price_discount')}}" class="form-control square" placeholder="Price After Discount" aria-label="Amount (to the nearest EGP)" name="price_discount">
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

                                    <!-- Inventory -->
                                    <div class="col-12 mt-2">
                                      <h4 class="form-section"><i class="ft-money"></i>Inventory</h4>
                                      <div class="row"> 
                                        <div class="col-md-12">
                                          <label for="projectinput1"> Qunatity </label>
                                          <div class="input-group">
                                              <input type="number" value="{{old('stock')}}" class="form-control square" placeholder="Quantity" aria-label="Amount (to the nearest EGP)" name="stock">
                                          </div>
                                          @error("stock")
                                          <span class="text-danger"> {{ $message }} </span>
                                          @enderror
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Option -->
                                    <div class="col-12 mt-2">
                                      <h4 class="form-section"><i class="ft-money"></i>Options</h4>
                                      <div class="row"> 
                                        <div class="col-md-12">
                                          <div class="form-group col-12 mb-2 contact-repeater">
                                            <div data-repeater-list="repeater_group">
                                              <div class="input-group mb-1" data-repeater-item="">
                                                <input type="type" placeholder="Option Title" class="form-control" name="option" id="example-tel-input">
                                                <input type="type" placeholder="Separate options with a comma" class="form-control ml-2 mr-1" name="option_value" id="example-tel-input">
                                                <span class="input-group-append" id="button-addon2">
                                                  <button class="btn btn-danger" type="button" data-repeater-delete=""><i class="ft-x"></i></button>
                                                </span>
                                              </div>
                                            </div>
                                            <button type="button" data-repeater-create="" class="btn btn-primary">
                                              <i class="ft-plus"></i> Add another option
                                            </button>
                                          </div>
                                          @error("option")
                                          <span class="text-danger"> {{ $message }} </span>
                                          @enderror
                                        </div>
                                      </div>
                                    </div>

                                    <!-- buttons -->
                                    <div class="form-actions mb-2 float-right">
                                        <button type="submit" class="btn btn-primary float-right">
                                            Save
                                        </button>
                                        <button type="button" class="btn btn-warning mr-1 float-right"
                                                onclick="history.back();">
                                              Back
                                        </button>
                                    </div>

                                  </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->

        </div>
    </div>
</div>

                 
@stop


@section('script')
    <script>
             var uploadedDocumentMap = {}
            Dropzone.options.dpzMultipleFiles = {
                paramName: "dzfile", // The name that will be used to transfer the file
                //autoProcessQueue: false,
                maxFilesize: 5, // MB
                clickable: true,
                addRemoveLinks: true,
                acceptedFiles: 'image/*',
                dictFallbackMessage: "",
                dictInvalidFileType: " ",
                dictCancelUpload: "cancel ",
                dictCancelUploadConfirmation: "Are you sure to cancel upload",
                dictRemoveFile: "delete image",
                dictMaxFilesExceeded: "you can upload only 11 images ",
                headers: {
                    'X-CSRF-TOKEN':
                        "{{ csrf_token() }}"
                }
                ,
                url: "{{ route('admin.products.images.store') }}", // Set the url
                success:
                    function (file, response) {
                        $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name
                    }
                ,
                removedfile: function (file) {
                    file.previewElement.remove()
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedDocumentMap[file.name]
                    }
                    $('form').find('input[name="document[]"][value="' + name + '"]').remove()
                }
                ,
                // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
                init: function () {
                        @if(isset($event) && $event->document)
                    var files =
                    {!! json_encode($event->document) !!}
                        for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                    @endif
                }
            }
    </script>
@stop

