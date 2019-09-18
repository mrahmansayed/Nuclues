@extends('nuclues::backend.layouts.app')
@section('title','coupon')

@push('css')

  <style>

.form-group {
    margin-bottom: 1rem;
    margin-top: 48px;
}
label.label-ctegory {
    position: absolute;
    top: 16px;
    left: 14px;
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
            <span>Welcome To coupon</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="{{ route('admin.dashboard') }}" title="">Dashboard</a></li>
            <li>coupon Edit</li>
          </ul>
        </div>
        <div class="gap no-gap">
            <div class="inner-bg">
              <div class="element-title">
                <h4>about coupon</h4>
                <span>Please fill the form bellow.</span> </div>
              <div class="add-prod-from">
                <form action="{{ route('coupon.update',$coupon->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    
                   <div class="col-md-6">
                      <label>Coupon Code</label>
                      <input type="text" placeholder="Enter Coupon Code" name="code" value="{{ $coupon->code }}">
                    </div>

                   <div class="col-md-6">
                      <label class="label-ctegory">Select Coupon Type</label>
                        <select class="form-group coupon" name="type" id="1">
                        <option style="width: 60px;">Select Coupon Type</option>
                        
                        <option {{ $coupon->type == 'fixed' ? 'selected' : '' }} value="fixed">Fixed</option>
                        <option {{ $coupon->type == 'percent_off' ? 'selected' : '' }} value="percent_off">Percent off</option>
                       
                        </select>
                      
                    </div>
                     <div class="col-md-6">
                        <label>Coupon Fixed Price</label>
                        <input type="text" placeholder="Enter Fixed Price" name="value" value="{{ $coupon->value }}">
                      </div>
                                           <div class="col-md-6">
                        <label>Coupon Percent</label>
                        <input type="text" placeholder="Enter Percent" name="percent_off" value="{{ $coupon->percent_off }}">
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
<script src="{{ asset('backend/js/echart.min.js') }}"></script> 

  <script src="{{ asset('backend/js/nice-select.js') }}"></script> 
  <script src="{{ asset('backend/js/flatweather.min.js') }}"></script> 
<script src="{{ asset('backend/js/html5lightbox.js') }}"></script> 

@endpush