@extends('nuclues::backend.layouts.app')
@section('title','widget')


@section('content')
    <div class="panel-body">
              
      <div class="content-area">
        <div class="sub-bar">
          <div class="sub-title">
            <h4>Dashboard:</h4>
            <span>Welcome To widget</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="{{ route('admin.dashboard') }}" title="">Dashboard</a></li>
            <li>widget</li>
          </ul>
        </div>
        <div class="gap no-gap">
            <div class="inner-bg">
              <div class="element-title">
                <h4>about widget</h4>
                <span>Please fill the form bellow.</span> </div>
              <div class="add-prod-from">
                <form action="{{ route('widget.update',$widget->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    
                   
                         <div class="col-md-12">
                      <br>
                      <label>Product Description</label>
                      <textarea cols="30" id="description" rows="10" placeholder="Enter Description" name="description">{{ $widget->description }}</textarea>
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