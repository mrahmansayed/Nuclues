@extends('nuclues::backend.layouts.app')
@section('title','page')

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
img.page-image {
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
            <span>Welcome To page</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="#" title="">Dashboard</a></li>
            <li>page</li>
          </ul>
        </div>
        <div class="gap inner-bg">
          <div class="element-title">
            <h4>page</h4>
            <span>It's your page list </span> </div>
          <div class="table-styles">
            <div class="widget">
              <table class="prj-tbl striped table-responsive">
                <thead class="color">
                  <tr>
                    <th><em>ID</em></th>
                    <th><em>Title</em></th>
                    <th><em>Slug</em></th>
                    <th><em>Action</em></th>
                  </tr>
                </thead>
                <tbody>
                    @if($pages->count() > 0)
                    @foreach($pages as $key=>$page)
                      <tr>
                        <td><span>{{ $key + 1 }}</span></td>
                        <td><i>{{ Str::limit($page->title,10) }}</i></td>
                        
                        <td><span>{{ Str::limit($page->slug,10) }}</span></td>
                       
                        <td><i>
                            <a href="{{ route('page.edit',$page->slug) }}" class="btn-st blu-clr"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('page.delete',$page->slug) }}" class="btn-st rd-clr"><i class="fa fa-trash"></i></a>
                        </i></td>

                      </tr>
                  @endforeach
                    <div class="pagination">
                      {!! $pages->links() !!}
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
                            <span>© 2019. Laramaster. All Rights Reserved.</span>
                        </div>
      <!-- bottombar --> 
    </div>
@endsection