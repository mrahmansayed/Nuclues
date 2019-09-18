@extends('nuclues::backend.layouts.app')
@section('title','contact')

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
</style>
@endpush
@section('content')
     <div class="panel-body">
              
      <div class="content-area">
        <div class="sub-bar">
          <div class="sub-title">
            <h4>Dashboard:</h4>
            <span>Welcome To contact</span>
          </div>
          <ul class="bread-crumb">
            <li><a href="#" title="">Dashboard</a></li>
            <li>contact</li>
          </ul>
        </div>
        <div class="gap inner-bg">
          <div class="element-title">
            <h4>contact</h4>
            <span>It's your contact list </span> </div>
          <div class="table-styles">
            <div class="widget">
              <table class="prj-tbl striped table-responsive">
                <thead class="color">
                  <tr>
                    <th><em>ID</em></th>
                    <th><em>Name</em></th>
                    <th><em>Email</em></th>
                    <th><em>Subject</em></th>
                    <th><em>Message</em></th>
                    <th><em>Action</em></th>
                  </tr>
                </thead>
                <tbody>
                    @if($contacts->count() > 0)
                    @foreach($contacts as $key=>$contact)
                      <tr>
                        <td><span>{{ $key + 1 }}</span></td>
                        <td><i>{{ $contact->name }}</i></td>
                        <td><span>{{ $contact->email }}</span></td>
                        <td><span>{{ Str::limit($contact->subject,15) }}</span></td>
                        <td><span>{{ Str::limit($contact->message,50) }}</span></td>
                        <td><i>
                          
                            <a href="{{-- {{ route('contact.edit',$contact->slug) }} --}}" class="btn-st blu-clr"><i class="fa fa-edit"></i></a>
                            <a href="{{ route('contact.delete',$contact->id) }}" class="btn-st rd-clr"><i class="fa fa-trash"></i></a>
                        </i></td>

                      </tr>
                  @endforeach
                    <div class="pagination">
                      {!! $contacts->links() !!}
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