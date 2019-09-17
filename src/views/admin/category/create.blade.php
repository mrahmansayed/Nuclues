@extends('nuclues::backend.layouts.app')
@section('title','Category')


@section('content')
    <div class="panel-body">
              
      <div class="content-area">
        <div class="sub-bar">
          <div class="sub-title">
            <h4>Dashboard:</h4>
            <span>Welcome To Category</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="{{ route('admin.dashboard') }}" title="">Dashboard</a></li>
            <li>Category</li>
          </ul>
        </div>
        <div class="gap no-gap">
            <div class="inner-bg">
              <div class="element-title">
                <h4>about category</h4>
                <span>Please fill the form bellow.</span> </div>
              <div class="add-prod-from">
                <form action="{{ route('category.store') }}" method="POST">
                  @csrf
                  <div class="row">
                    
                    <div class="col-md-6">
                      <label>category name</label>
                      <input type="text" placeholder="Enter category name" name="name">
                    </div>
                    <div class="col-md-6">
                      <label>category slug</label>
                      <input type="text" placeholder="Enter category slug" name="slug">
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