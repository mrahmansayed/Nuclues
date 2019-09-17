@extends('nuclues::backend.layouts.app')
@section('title','Menu')

@push('css')
<style>
  .pagination {
    position: absolute;
    top: -25px;
    right: 4px;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    border-color: rgba(0,0,0,0);
    background: rgba(0,0,0,0) linear-gradient(45deg, #6878E2, #7356B2);
}
img.product-image {
    width: 88px;
    height: 67px;
}
</style>
@endpush
@section('content')
     <div class="panel-body">
              
      <div class="content-area">
        <div class="sub-bar">
          <div class="sub-title">
            <h4>Dashboard:</h4>
            <span>Welcome To Menu</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="#" title="">Dashboard</a></li>
            <li>Menu</li>
          </ul>
        </div>
        <div class="gap inner-bg">
          <div class="element-title">
            <h4>Menu</h4>
            <span>It's your menu list </span> </div>

            
          
              <div class="add-prod-from">

                <form action="{{ route('menu.store') }}" method="POST"  enctype="multipart/form-data">
                  @csrf
                  <div class="row">
            
              <div class="col-md-6">
                <label>Menu Name</label>
                <input type="text" placeholder="Name" name="name">
              </div>
              
               <div class="col-md-6">
                <label>Menu Link</label>
                <input type="text" placeholder="Link" name="link">
              </div>
              <input type="hidden" name="navigations_id" value="{{ $id }}">
              <div class="col-md-12">
                <div class="buttonz">
                  <br>
                <button type="submit">save</button>
             
                </div>
              </div>

                </div>
              </div>  
        </div>

        <div class="gap inner-bg">
          <div class="element-title">
            <h4>Menu</h4>
            <span>It's your menu list </span> </div>


          <div class="table-styles">
            <div class="widget">
              <table class="prj-tbl striped table-responsive">
                <thead class="color">
                  <tr>
                    <th><em>ID</em></th>
                    <th><em>Name</em></th>
                    <th><em>LINK</em></th>
                    <th><em>Action</em></th>
                  </tr>
                </thead>
                <tbody>
                    @if($menus->count() > 0)
                    @foreach($menus as $key=>$menu)
                      <tr>
                        <td><span>{{ $key + 1 }}</span></td>
                        <td><i>{{ $menu->name }}</i></td>
                        <td><i>{{ $menu->link }}</i></td>
                        <td><i>
                            
                            <a href="{{ route('admin.menu.delete',$menu->id) }}" class="btn-st rd-clr"><i class="fa fa-trash"></i></a>
                        </i></td>

                      </tr>
                  @endforeach
                    <div class="pagination">
                      {!! $menus->links() !!}
                    </div>
                  @else
                  <tbody>
                      <tr>
                          
                      </tr>
                  </tbody>
                  @endif
                </tbody>
              </table>
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