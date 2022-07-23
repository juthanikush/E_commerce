@extends('front/layout')
@section('page_title','Wishlist')
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
                                    	<th class="product-name text-center alt-font">Remove</th>
                                        <th class="product-price text-center alt-font">Images</th>
                                        <th class="product-name alt-font">Product</th>
                                        
                                        <th class="product-subtotal text-center alt-font">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($wishilist as $list)
                                        <tr class="wishlist{{$list->wid}}">
                                            <td class="product-remove text-center" valign="middle"><a href="javascript:void(0)" onclick="remove_wishlist({{$list->wid}})"><i class="icon icon anm anm-times-l"></i></a></td>
                                            <td class="product-thumbnail text-center">
                                                <a href="#"><img src="{{asset('storage/media/product/'.$list->main_image)}}" alt="" title="" /></a>
                                            </td>
                                            <td class="product-name"><h4 class="no-margin"><a href="#">{{$list->name}}</a></h4></td>
                                            
                                            <td class="product-subtotal text-center"><a href="{{url('product_details')}}/{{$list->id}}" type="button" class="white btn btn-small">View Product</a></td>
                                        </tr>
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