@extends('nuclues::backend.layouts.app')
@section('title','Site Settings')


@section('content')
    <div class="panel-body">
              
      <div class="content-area">
        <div class="sub-bar">
          <div class="sub-title">
            <h4>Dashboard:</h4>
            <span>Welcome To Site</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="{{ route('admin.dashboard') }}" title="">Dashboard</a></li>
            <li>Site Edit</li>
          </ul>
        </div>
        <div class="gap no-gap">
            <div class="inner-bg">
              <div class="element-title">
                <h4>about Site</h4>
                <span>Please fill the form bellow.</span> </div>
              <div class="add-prod-from">
                <form action="{{ route('site.update',$site->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="row">
                    
                   <div class="col-md-6">
                      <label>Site Name</label>
                      <input type="text" placeholder="Enter Site Name" name="name" value="{{ $site->name }}">
                    </div>

                   
                  <div class="col-md-6">          <br><span class="upload-image">upload site logo</span><br>
                <label class="fileContainer"> <span>upload</span>
                <input type="file" name="image" />
                </label>
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


@endpush