@extends('nuclues::backend.layouts.app')
@section('title','blog')
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
            <span>Welcome To blog</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="{{ route('admin.dashboard') }}" title="">Dashboard</a></li>
            <li>blog</li>
          </ul>
        </div>
        <div class="gap no-gap">
            <div class="inner-bg">
              <div class="element-title">
                <h4>about blog</h4>
                <span>Please fill the form bellow.</span> </div>
      
              <div class="add-prod-from">

                <form action="{{ route('blog.store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    
                    <div class="col-md-6">
                <label>blog Title</label>
                <input type="text" placeholder="blog Title" name="title">
              </div>
              <div class="col-md-6">
                <label>blog Subtitle</label>
                <input type="text" placeholder="subtitle" name="slug">
              </div>
              <div class="col-md-6">
                <label class="label-ctegory">Select category</label>
                <select class="form-group category_id" name="category" id="1">
                <option style="width: 60px;">Select blogcategories</option>
                @foreach($blogcategories as $blogcategory)
                <option value="{{ $blogcategory->id }}">{{ $blogcategory->name }}</option>
                @endforeach
                </select>
              </div>
                <div class="col-md-6">
                    <br>
                <label>User</label>
                <input type="text" placeholder="User name" name="user">
              </div>
              
              <div class="col-md-12">
                <br>
                <label>blog Description</label>
                <textarea cols="30" rows="10" id="description" placeholder="Enter Description" name="description"></textarea>
              </div>
             
            
              
              <div class="col-md-6"> 
                    <br>
                <span class="upload-image">upload blog image</span><br>
                <label class="fileContainer"> <span>upload</span>
                <input type="file" name="image" />
                </label>
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
   
<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>

  <script>
    CKEDITOR.replace('description');

  </script>
@endpush