@extends('nuclues::backend.layouts.app')
@section('title','Dashboard')
@section('content')

<div class="panel-body">
    <div class="content-area">
        <div class="sub-bar">
            <div class="sub-title">
                <h4>Dashboard:</h4>
                <span>Welcome To Admin Panel!</span>
            </div>
            <ul class="bread-crumb">
                <li><a href="#" title="">Home</a></li>
                <li>Dashbord</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="top-widget">
                    <i class="fa fa-reorder"></i>
                    <div class="informative">
                        <span>{{ $total_order }}</span>
                        <em>total orders</em>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="top-widget">
                    <i class="fa fa-openid"></i>
                    <div class="informative">
                        <span>{{ $pending_order }}</span>
                        <em>total pending order</em>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="top-widget">
                    <i class="fa fa-codepen"></i>
                    <div class="informative">
                        <span>{{ $pending_payment }}</span>
                        <em>total pending payment</em>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="top-widget">
                    <i class="fa fa-users"></i>
                    <div class="informative">
                        <span>{{ $customers }}</span>
                        <em>total customer</em>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="col-lg-12">
                <div class="widget">
                    <div class="widget-title no-margin">
                        <h4>Total Orders</h4>
                        <span>order lists</span>
                        <ul class="widget-controls">
                            <li title="Refresh" class="refresh-content"><i class="fa fa-refresh"></i></li>
                            <li title="Maximize" class="expand-content"><i class="icon-frame"></i></li>
                            <li title="More Options" class="more-option"><i class="ti-more-alt"></i></li>
                        </ul>
                    </div>
                    <table class="prj-tbl striped table-responsive">
                        <thead>
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
                           
                    @foreach($orders as $key=>$order)
                      <tr>
                        <td><span>{{ $key + 1 }}</span></td>
                        <td><i>{{ App\User::where('id',$order->user_id)->first()->name }}</i></td>
                        <td><span>
                          @if($order->payment_status == 0)
                          <a href="{{ route('order.payment_approved',$order->id) }}" class="btn-st rd-30 rd-clr">pending</a>
                          @else
                            <a href="{{ route('order.payment_status',$order->id) }}" class="btn-st rd-30">Approved</a>
                          @endif
                        </span></td>
                   
                        <td><span>
                          @if($order->delivery_status == 'approved')
                          <a href="{{ route('order.delivery_approved',$order->id) }}" class="btn-st rd-30">Published</a>
                          
                          @else
                            <a href="{{ route('order.delivery_status',$order->id) }}" class="btn-st rd-30 org-clr">Pending</a>
                          @endif
                        </span></td>
                        <td><span>
                          @if($order->payment_status == 1 && $order->delivery_status == 'approved')
                          <span href="" class="btn-st rd-30 org-clr">Finished</span>
                          @else
                            <span href="" class="btn-st rd-30">Active</span>
                          @endif
                        </span></td>
                        <td><span>{{ $order->currency_type }}</span></td>
                        <td>{{ $order->amount }}</td>
                        <td><i>
                            <a href="{{ route('order.edit',$order->id) }}" class="btn-st blu-clr"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('order.delete',$order->id) }}" class="btn-st rd-clr"><i class="fa fa-trash"></i></a>
                        </i></td>

                      </tr>
                  @endforeach
                    
               
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- table widget -->
            
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="widget">
                    <div class="widget-title no-margin">
                        <h4>Subscribers</h4>
                        <ul class="widget-controls">
                            <li title="Refresh" class="refresh-content"><i class="fa fa-refresh"></i></li>
                            <li title="Maximize" class="expand-content"><i class="icon-frame"></i></li>
                            <li title="More Options" class="more-option"><i class="ti-more-alt"></i></li>
                        </ul>
                        <em>subscriber lists</em> </div>
                    <div class="">
                        <div class="scl-wdgt-lst">
                            
                                <table class="prj-tbl striped table-responsive">
                                   <thead>
                                       <tr>
                                           <th><em>ID</em></th>
                                           <th><em>Email</em></th>
                                           <th><em>Created At</em></th>
                                           
                                       </tr>
                                   </thead>
                                   <tr>
                                       <tbody>
                                        @foreach($subscribers as $key=>$subscriber)
                                           <tr>
                                               <td>{{ $key + 1 }}</td>
                                               <td>{{ $subscriber->email }}</td>
                                               <td>{{ $subscriber->created_at->toDateString() }}</td>
                                               
                                           </tr>
                                             @endforeach
                                       </tbody>
                                   </tr>
                                </table>
                          
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="widget">
                  <div class="widget-title">
                    <h4>Contact</h4>
                    <ul class="widget-controls">
                            <li title="Refresh" class="refresh-content"><i class="fa fa-refresh"></i></li>
                            <li title="Maximize" class="expand-content"><i class="icon-frame"></i></li>
                            <li title="More Options" class="more-option"><i class="ti-more-alt"></i></li>
                        </ul>
                    <em>Contact lists</em> </div>
                  <div class="widget-peding">
                    
                                <table class="prj-tbl striped table-responsive">
                                   <thead>
                                       <tr>
                                           <th><em>ID</em></th>
                                           <th><em>Name</em></th>
                                           <th><em>Email</em></th>
                                           <th><em>Created At</em></th>
                                           
                                       </tr>
                                   </thead>
                                   <tr>
                                       <tbody>
                                        @foreach($contacts as $key=>$contact)
                                           <tr>
                                               <td>{{ $key + 1 }}</td>
                                               <td>{{ $contact->name }}</td>
                                               <td>{{ $contact->email }}</td>
                                               <td>{{ $contact->created_at->toDateString() }}</td>
                                               
                                           </tr>
                                             @endforeach
                                       </tbody>
                                   </tr>
                                </table>
                          
                </div>
              </div>
              <!-- instagram widget --> 
            </div>
           
        </div>
    </div>
    <div class="bottombar"> 
        <span>© 2019. Dewwater. All Rights Reserved.</span>
    </div>
    <!-- bottombar -->
</div>
                       
@endsection