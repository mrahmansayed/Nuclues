@extends('nuclues::backend.layouts.app')
@section('title','currency')


@section('content')
    <div class="panel-body">
              
      <div class="content-area">
        <div class="sub-bar">
          <div class="sub-title">
            <h4>Dashboard:</h4>
            <span>Welcome To currency</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="{{ route('admin.dashboard') }}" title="">Dashboard</a></li>
            <li>currency Edit</li>
          </ul>
        </div>
        <div class="gap no-gap">
            <div class="inner-bg">
              <div class="element-title">
                <h4>about currency</h4>
                <span>Please fill the form bellow.</span> </div>
              <div class="add-prod-from">
                <form action="{{ route('currency.update',$currency->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    
                    <div class="col-md-6">
                      <label>currency name</label>
                      <input type="text" placeholder="Enter currency name" name="name" value="{{ $currency->name }}">
                    </div>

                   <div class="col-md-6">
                      <label>currency code</label>
                      <input type="text" placeholder="Enter currency code" name="code" value="{{ $currency->code }}">
                    </div>
                     <div class="col-md-6">
                      <br>
                      <label>currency symbol</label>
                      <input type="text" placeholder="Enter currency symbol" name="symbol" value="{{ $currency->symbol }}">
                    </div>
                    <br>
                    <div class="col-md-6">
                      <br>
                      <div class="input-group">
                        <br>
                      <label>currency exchange rate</label>
                      <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                      <input class="form-control" placeholder="$..." type="text" name="exchange_rate" value="{{ $currency->exchange_rate }}">
                      </div>
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
            <span>© 2019. Dewwater. All Rights Reserved.</span>
        </div>
      <!-- bottombar --> 
    </div>
@endsection