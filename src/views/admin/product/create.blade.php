@extends('nuclues::backend.layouts.app')
@section('title','product')
@push('css')
  <style>

.form-group {
    margin-bottom: 1rem;
    margin-top: 48px;
}
label.label-ctegory {
    position: absolute;
    top: 16px;
}
  </style>
  <link rel="stylesheet" href="{{ asset('backend/css/flatweather.css') }}">

  <link rel="stylesheet" href="{{ asset('backend/css/nice-select.css') }}">

@endpush

@section('content')
    <div class="panel-body">
              
      <div class="content-area">
        <div class="sub-bar">
          <div class="sub-title">
            <h4>Dashboard:</h4>
            <span>Welcome To product</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="{{ route('admin.dashboard') }}" title="">Dashboard</a></li>
            <li>product</li>
          </ul>
        </div>
        <div class="gap no-gap">
            <div class="inner-bg">
              <div class="element-title">
                <h4>about product</h4>
                <span>Please fill the form bellow.</span> </div>
      
              <div class="add-prod-from">

                <form action="{{ route('product.store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    
                    <div class="col-md-6">
                <label>Product Title</label>
                <input type="text" placeholder="Product Title" name="title">
              </div>
              <div class="col-md-6">
                <label>Product Subtitle</label>
                <input type="text" placeholder="leather" name="subtitle">
              </div>
              <div class="col-md-6">
                <label class="label-ctegory">Select category</label>
                <select class="form-group category_id" name="category" id="{{ config('nuclues.site_domain').'/admin/category/get' }}">
                <option style="width: 60px;">Select Category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
                </select>
              </div>
              <div class="subcategory">
                
              </div>
              <div class="col-md-6">
                <div class="input-group">
                <label>price</label>
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input class="form-control" placeholder="$..." type="text" name="price">
                </div>
              </div>
              <div class="col-md-6">
                <div class="input-group">
                <label>Discount</label>
                <span class="input-group-addon"><i >%</i></span>
                <input class="form-control" placeholder="$.." type="text" name="discount">
                </div>
              </div>
              
              <div class="col-md-6">
                <div class="input-group">
                <label>Compare</label>
                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                <input class="form-control" placeholder="$..." type="text" name="compare_price">
                </div>
              </div>
              <div class="col-md-12">
                <br>
                <label>Product Description</label>
                <textarea cols="30" id="description" rows="10" placeholder="Enter Description" name="description"></textarea>
              </div>
              <div class="col-md-6">
                    <br>
                <label>Product Type</label>
                <input type="text" placeholder="Product Type" name="product_type">
              </div>
              <div class="col-md-6">
                    <br>
                <label>Vendor</label>
                <input type="text" placeholder="vendor name" name="vendor">
              </div>
              <div class="col-md-12">
                    <br>
                <label>Product Information</label>
                <textarea cols="30" rows="10" id="information" placeholder="Enter Information" name="information"></textarea>
              </div><br>
              <div class="col-md-6"> 
                    <br>
                <span class="upload-image">upload product image</span><br>
                <label class="fileContainer"> <span>upload</span>
                <input type="file" name="image" />
                </label>
              </div>
              <div class="col-md-6"> 
                    <br>
                <span class="upload-image">upload product gallary image</span><br>
                <label class="fileContainer"> <span>upload</span>
                <input type="file" name="productimages[]" multiple />
                </label>
              </div>
              <div class="col-md-6">
                <label>product Quantity</label>
                <input type="text" placeholder="quantity" name="quantity" value="0">
              </div>
              
              <div class="col-md-12">
                <div class="buttonz">
                <button type="submit">save</button>
             
                </div>
              </div>

                </div>
              </div>      
            </div>
        </div>
      </div>
      <div class="bottombar"> 
            <span>© 2019. Laramaster. All Rights Reserved.</span>
        </div>
      <!-- bottombar --> 
    </div>
@endsection

@push('js')
<script src="{{ asset('backend/js/echart.min.js') }}"></script> 

  <script src="{{ asset('backend/js/nice-select.js') }}"></script> 
  <script src="{{ asset('backend/js/flatweather.min.js') }}"></script> 
<script src="{{ asset('backend/js/html5lightbox.js') }}"></script> 
    <script>
     $(".category_id").change(function () {
       id = $(this).attr('id');
       value = $(this).val();
       url = $(this).attr('id');
        $.ajax({
                url:url,

                data: {value:value,
                    id:id},
               type: "GET",
               dataType: "html",
               success:function(response){
              
                 $('.subcategory').html(response)
                  
               }
           });
     });
  </script>
  <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>

  <script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('information');
  </script>

@endpush