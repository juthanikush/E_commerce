@extends('admin/layout')
@section('page_title','Order')
@section('order_select','active')
@section('container')

    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Order</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<form action="#">
                        <div class="wishlist-table table-content table-responsive">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                    	
                                        <th>Sr.No</th>
                                        <th >Image</th>
                                        <th >Name</th>
                                        <th>Qty</th>

                                        <th >Amount</th>
                                        <th >Total</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                        //prx($oreders);
                                    @endphp
                                    @foreach($oreders as $list)
                                    @php
                                        $total=0;
                                        $total=$list->qty*$list->mrp;
                                    @endphp
                                    <tr>
                                        
                                        <td >{{$i}}</td>
                                        <td >
                                            <img src="{{asset('storage/media/product/'.$list->image)}}" height="300px" width="300px" alt="" srcset="">
                                        </td>
                                        <td>{{$list->name}}</td>
                                        <td >{{$list->qty}}</td>
                                        <td  >&#8377;{{$list->mrp}}</td>
                                        <td >&#8377;{{$total}}
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                        
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </form>                   
               	</div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->

@endsection