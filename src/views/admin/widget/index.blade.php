@extends('nuclues::backend.layouts.app')
@section('title','widget')

@push('css')
<style>
  .pagination {
    position: absolute;
    top: -25px;
    right: 4px;
}
.widget-item.active .widget-link {
    z-index: 1;
    color: #fff;
    border-color: rgba(0,0,0,0);
    background: rgba(0,0,0,0) linear-gradient(45deg, #6878E2, #7356B2);
}
img.widget-image {
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
            <span>Welcome To widget</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="#" title="">Dashboard</a></li>
            <li>widget</li>
          </ul>
        </div>
        <div class="gap inner-bg">
          <div class="element-title">
            <h4>widget</h4>
            <span>It's your widget list </span> </div>
          <div class="table-styles">
            <div class="widget">
              <table class="prj-tbl striped table-responsive">
                <thead class="color">
                  <tr>
                    <th><em>ID</em></th>
                    <th><em>Name</em></th>
                  
                    <th><em>Action</em></th>
                  </tr>
                </thead>
                <tbody>
                    @if($widgets->count() > 0)
                    @foreach($widgets as $key=>$widget)
                      <tr>
                        <td><span>{{ $key + 1 }}</span></td>
                        <td><i>{{ Str::limit($widget->name,10) }}</i></td>
                  
                       
                        <td><i>
                            <a href="{{ route('widget.edit',$widget->id) }}" class="btn-st blu-clr"><i class="fa fa-edit"></i></a>
                            
                        </i></td>

                      </tr>
                  @endforeach
                    <div class="pagination">
                      {!! $widgets->links() !!}
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