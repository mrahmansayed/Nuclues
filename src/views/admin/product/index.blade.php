@extends('nuclues::backend.layouts.app')
@section('title','Product')

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
            <span>Welcome To Product</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="#" title="">Dashboard</a></li>
            <li>product</li>
          </ul>
        </div>
        <div class="gap inner-bg">
          <div class="element-title">
            <h4>Product</h4>
            <span>It's your product list </span> </div>
          <div class="table-styles">
            <div class="widget">
              <table class="prj-tbl striped table-responsive">
                <thead class="color">
                  <tr>
                    <th><em>ID</em></th>
                    <th><em>Title</em></th>
                    <th><em>Image</em></th>
                    <th><em>Price</em></th>
                    <th><em>Stock</em></th>
                    <th><em>Vendor</em></th>
                    <th><em>Featured</em></th>
                    <th><em>Action</em></th>
                  </tr>
                </thead>
                <tbody>
                    @if($products->count() > 0)
                    @foreach($products as $key=>$product)
                      <tr>
                        <td><span>{{ $key + 1 }}</span></td>
                        <td><i>{{ Str::limit($product->title,10) }}</i></td>
                        <td><span><img src="{{ asset('product/'.$product->image) }}" class="product-image"></span></td>
                        <td><span>{{ $product->price }}</span></td>
                        <td><span>{{ $product->quantity }}</span></td>
                        <td><i>{{ $product->vendor }}</i></td>
                        <td>
                          @if($product->like == 0)
                              <a href="{{ route('product.like',$product->id) }}"><i class="fa fa-star" style="color: black"></i></a>
                          @else
                            <a href="{{ route('product.dislike',$product->id) }}"><i class="fa fa-star" style="color: red"></i></a>
                          @endif
                        </td>
                        <td><i>
                            <a href="{{ route('product.edit',$product->subtitle) }}" class="btn-st blu-clr"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('product.delete',$product->subtitle) }}" class="btn-st rd-clr"><i class="fa fa-trash"></i></a>
                        </i></td>

                      </tr>
                  @endforeach
                    <div class="pagination">
                      {!! $products->links() !!}
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
@push('js')

@endpush