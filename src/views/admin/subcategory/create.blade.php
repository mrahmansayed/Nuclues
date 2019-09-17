@extends('nuclues::backend.layouts.app')
@section('title','navigation')
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
            <span>Welcome To navigation</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="{{ route('admin.dashboard') }}" title="">Dashboard</a></li>
            <li>navigation</li>
          </ul>
        </div>
        <div class="gap no-gap">
            <div class="inner-bg">
              <div class="element-title">
                <h4>about navigation</h4>
                <span>Please fill the form bellow.</span> </div>
      
              <div class="add-prod-from">

                <form action="{{ route('navigation.store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
            
              <div class="col-md-6">
                <label>Navigation Name</label>
                <input type="text" placeholder="Name" name="name">
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
            <span>© 2019. Dewwater. All Rights Reserved.</span>
        </div>
      <!-- bottombar --> 
    </div>
@endsection

@push('js')
<script src="{{ asset('backend/js/echart.min.js') }}"></script> 

  <script src="{{ asset('backend/js/nice-select.js') }}"></script> 
  <script src="{{ asset('backend/js/flatweather.min.js') }}"></script> 
<script src="{{ asset('backend/js/html5lightbox.js') }}"></script> 


@endpush