@extends('front/layout')
@section('page_title','Orders Details View')
@section('container') 
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Wish List</h1></div>
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
                                        <th class="product-price text-center alt-font">Image</th>
                                        <th class="product-price text-center alt-font">Name</th>
                                        <th class="product-price text-center alt-font">Qty</th>

                                        <th class="product-name text-center alt-font">Amount</th>
                                        <th class="product-price text-center alt-font">Total</th>
                                        
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
                                        
                                        <td class="product-price text-center alt-font">{{$i}}</td>
                                        <td class="product-price text-center alt-font">
                                            <img src="{{asset('storage/media/product/'.$list->image)}}" height="300px" width="300px" alt="" srcset="">
                                        </td>
                                        <td class="product-price text-center alt-font">{{$list->name}}</td>
                                        <td class="product-price text-center alt-font">{{$list->qty}}</td>
                                        <td class="product-price text-center alt-font" >&#8377;{{$list->mrp}}</td>
                                        <td class="product-price text-center alt-font">&#8377;{{$total}}
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