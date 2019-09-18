@extends('nuclues::backend.layouts.app')
@section('title','Slider')


@section('content')
    <div class="panel-body">
              
      <div class="content-area">
        <div class="sub-bar">
          <div class="sub-title">
            <h4>Dashboard:</h4>
            <span>Welcome To Slider</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="{{ route('admin.dashboard') }}" title="">Dashboard</a></li>
            <li>Slider</li>
          </ul>
        </div>
        <div class="gap no-gap">
            <div class="inner-bg">
              <div class="element-title">
                <h4>about Slider</h4>
                <span>Please fill the form bellow.</span> </div>
              <div class="add-prod-from">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    
                    <div class="col-md-12">
                      <label>Slider Title</label>
                      <input type="text" placeholder="Enter Slider title" name="title">
                    </div>
                         <div class="col-md-12">
                      <br>
                      <label>Product Description</label>
                      <textarea cols="30" id="description" rows="10" placeholder="Enter Description" name="description"></textarea>
                    </div>
                    <div class="col-md-6"> 
                    <br>
                        <span class="upload-image">upload Slider image</span><br>
                        <label class="fileContainer"> <span>upload</span>
                        <input type="file" name="image" />
                        </label>
                      </div>
                    <div class="col-md-6">
                      <br>
                      <label>Slider Button</label>
                      <input type="text" placeholder="Enter Slider Button" name="button">
                    </div>
                    <div class="col-md-6">
                      <label>Slider Button Link</label>
                      <input type="text" placeholder="Enter Slider Button Link" name="button_link">
                    </div>
                    <br>
                    <div class="col-md-12">
                      <div class="buttonz">
                        <br>
                        <button type="submit">save</button>
                         </form>
                       


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
<script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>

  <script>
    CKEDITOR.replace('description');
  </script>
@endpush