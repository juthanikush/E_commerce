@extends('front/layout')
@section('page_title','Orders')
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    	
                                        <th class="product-price text-center alt-font">Sr.No</th>
                                        <th class="product-name text-center alt-font">Amount</th>
                                        
                                        <th class="product-subtotal text-center alt-font">date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                        //prx($groupde);
                                    @endphp
                                    @foreach($groupde as $list)
                                    @php
                                        $total=0;
                                       
                                    @endphp
                                    @foreach($list as $list1)
                                        @php
                                            $total+=$list1->mrp*$list1->qty;
                                            $date=$list1->date;
                                        @endphp
                                    @endforeach
                                    @php
                                   
                                    @endphp
                                    <tr>
                                        
                                        <td class="product-price text-center alt-font">{{$i}}</td>
                                        <td class="product-price text-center alt-font" >&#8377;{{$total}}</td>
                                        <td class="product-price text-center alt-font">
                                            <a href="{{url('order_view')}}/{{$list1->id}}">{{$date }}</a>
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