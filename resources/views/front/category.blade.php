@extends('front/layout')
@section('page_title','Category')
@section('container')  
<div class="section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Weekly Bestseller</h2>
                            <p>Our most popular products based on sales</p>
                        </div>
						<div class="productSlider grid-products">
                            @foreach($product as $list)
                            @php
                                $pid=$list->id;
                            @endphp
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="{{url('product_details')}}/{{$list->id}}" class="grid-view-item__link">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{asset('storage/media/product/'.$list->main_image)}}" src="{{asset('storage/media/product/'.$list->main_image)}}"height="300px" width="150px" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        @foreach($pro_attr as $list1)
                                        @if($list->id==$list1->p_id)
                                            @php
                                                $p_attr=$list1->id;
                                            @endphp
                                            <img class="hover blur-up lazyload" data-src="{{asset('storage/media/product/'.$list1->image)}}" src="{{asset('storage/media/product/'.$list1->image)}}"height="300px" width="150px" alt="image" title="product">
                                        
                                        @endif
                                        
                                        @endforeach
                                       
                                        <!-- Variant Image-->
                                        <img class="grid-view-item__image hover variantImg" src="{{asset('front_assets/images/product-images/product-image1.jpg')}}" alt="image" title="product">
                                        <!-- Variant Image-->
                                       
                                    </a>
                                    <!-- end product image -->
                                    
                                    
                                    <!-- Start product button -->
                                    @php
                                        $q=0;
                                    @endphp
                                    @foreach($cart as $list3)
                                        @if($list3->pid==$list->id)
                                            @php
                                                $q+=1;
                                            @endphp
                                        @endif
                                    
                                    @endforeach
                                    @if($q==0)
                                        <form class="variants add" action="#" method="post">
                                            <a class="btn btn-addto-cart add{{$pid}}" href="javascript:void(0)" onclick="add_to_cart_pop({{$pid}},{{$p_attr}})"   type="button" tabindex="0">Add To Cart</a>
                                        </form>
                                    @else

                                    @endif
                                    
                                    <div class="button-set">
                                        <!-- <input type="hidden" id="image" value="{{asset('storage/media/product/'.$list->main_image)}}">
                                        <input type="hidden" id="name" value="{{$list->name}}">
                                        <input type="hidden" id="short_desc" value="{{$list->short_desc}}">
                                        @foreach($pro_attr as $list1)
                                        @if($list->id==$list1->p_id)
                                            @php
                                                $price=$list1->mrp+100;
                                            @endphp
                                            <input type="hidden" id="price" value="{{$list1->mrp}}">
                                            <input type="hidden" id="mrp" value="{{$price}}">
                                            @php
                                                break;
                                            @endphp
                                        @endif
                                        @endforeach 
                                        
                                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view"   data-toggle="modal" onclick=quick_view("{{asset('storage/media/product/'.$list->main_image)}}","{{$list1->mrp}}")  >
                                          <i   class="icon anm anm-search-plus-r"></i>
                                        </a>-->
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                <i class="icon anm anm-heart-l"></i>
                                            </a>
                                        </div>
                                        
                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="product-layout-1.html">{{$list->name}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        @foreach($pro_attr as $list1)
                                            @if($list->id==$list1->p_id)
                                                @php
                                                    $price=$list1->mrp;
                                                    $price+=100;
                                                @endphp
                                                <span class="old-price"> &#8377;{{$price}}</span>
                                                <span class="price"> &#8377;{{$list1->mrp}}</span>
                                                @php
                                                    break;
                                                @endphp
                                            @endif
                                        @endforeach
                                        
                                    </div>
                                    <!-- End product price -->
                                    <!-- Color Variant -->
                                    <ul class="swatches">
                                        
                                        @foreach($pro_attr as $list1)
                                            @if($list->id==$list1->p_id)
                                                @foreach($color as $list2)
                                                    @if($list1->color_id==$list2->id)
                                                        <li class="swatch small rounded {{$list2->color}}" rel="assets/images/product-images/product-image-stw1.jpg"></li>
                                                    @endif
                                                @endforeach       
                                            @endif
                                        @endforeach
                                    </ul>
                                    <!-- End Variant -->
                                </div>
                                <!-- End product details -->
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
            	</div>    
            </div>
        </div>
@endsection