@extends('front/layout')
@section('page_title','Home')
@section('container')   
    <!--Body Content-->
    <div id="page-content">
    	<!--Home slider-->
    	<div class="slideshow slideshow-wrapper pb-section">
        	<div class="home-slideshow">
            	
                @foreach($baner as $list)
                
                <div class="slide">
                	<div class="blur-up lazyload">
                        <img class="blur-up lazyload" data-src="{{asset('storage/media/baner/'.$list->image)}}" src="{{asset('storage/media/baner/'.$list->image)}}"   />
                        <div class="slideshow__text-wrap slideshow__overlay classic middle">
                            <div class="slideshow__text-content middle">
                            	<div class="container">
                                    <div class="wrap-caption right">
                                        @if(!empty($list->heading))
                                        <h2 class="white h1 mega-title slideshow__title">{{$list->heading}}</h2>
                                        @endif
                                        @if(!empty($list->btn_link))
                                        <a class="btn" href="{{$list->btn_link}}">{{$list->btn_txt}}</a>
                                        @endif
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
        <!--End Home slider-->
        <!--Weekly Bestseller-->
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
                                            <a class="wishlist{{$pid}} add-to-wishlist" href="javascript:void(0)" onclick="wishlist({{$pid}})">
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
        <!--Weekly Bestseller-->
        <!--Parallax Section-->
        <div class="section">
            <div class="hero hero--large hero__overlay bg-size">
            	<img class="bg-img" src="{{asset('front_assets/images/parallax-banners/parallax-banner.jpg')}}" alt="" />
                <div class="hero__inner">
                    <div class="container">
                        <div class="wrap-text left text-small font-bold">
                            <h2 class="h2 mega-title">Belle <br> The best choice for your store</h2>
                            <div class="rte-setting mega-subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                            <a href="#" class="btn">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Parallax Section-->
        <!--New Arrivals-->
        <div class="product-rows section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
        				<div class="section-header text-center">
                        
                        </div>
            		</div>
                </div>
	            <div class="grid-products">
                <div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Weekly Bestseller</h2>
                            <p>Our most popular products based on sales</p>
                        </div>
						<div class="productSlider grid-products">
                            @foreach($product as $list)
                            @if($list->isfechaer==1)
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
                                        
                                        <div class="wishlist-btn">
                                            <a class="wishlist{{$pid}} add-to-wishlist" href="javascript:void(0)" onclick="wishlist({{$pid}})">
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
                            @endif
                            @endforeach
                            
                        </div>
                    </div>
            	</div> 
                    
                   
                </div>
           </div>
        </div>	
        <!--End Featured Product-->
        <div id="show" ></div>
        <!--Logo Slider-->
        <div class="section logo-section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    	<div class="section-header text-center">
                        	<h2 class="h2">The Most Loved Brands</h2>
                    	</div>
                		<div class="logo-bar">
                            @foreach($brands as $list)
                            <div class="logo-bar__item">
                                <img src="{{asset('storage/media/brand/'.$list->image)}}" alt="" title="" />
                            </div>
                            @endforeach
                            
               			 </div>
                	</div>
                </div>
            </div>
        </div>
        <!--End Logo Slider-->
    </div>
   
    <!--End Body Content-->
@endsection
  