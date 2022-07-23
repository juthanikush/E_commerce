<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- belle/home2-default.html   11 Nov 2019 12:22:28 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('page_title')</title>
<link rel="shortcut icon" href="{{asset('admin_assets/images/icon/shortlogo.png')}}">
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="assets/images/favicon.png" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="{{asset('front_assets/css/plugins.css')}}">
<!-- Bootstap CSS -->
<link rel="stylesheet" href="{{asset('front_assets/css/bootstrap.min.css')}}">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" > -->
<!-- Main Style CSS -->
<link rel="stylesheet" href="{{asset('front_assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('front_assets/css/responsive.css')}}">
</head>
<body class="template-index home2-default">
<div id="pre-loader">
    <img src="{{asset('front_assets/images/loader.gif')}}" alt="Loading..." />
</div>
<div class="pageWrapper">
	<!--Promotion Bar-->
	<div class="notification-bar mobilehide">
    	<a href="#" class="notification-bar__message">20% off your very first purchase, use promo code: Cart Que</a>
        <span class="close-announcement">×</span>
    </div>
    <!--End Promotion Bar-->
	<!--Search Form Drawer-->
	<div class="search">
        <div class="search__form">
            <form class="search-bar__form" action="#">
                <button class="go-btn search__button" type="submit"><i class="icon anm anm-search-l"></i></button>
                <input class="search__input" type="search" name="q" value="" placeholder="Search entire store..." aria-label="Search" autocomplete="off">
            </form>
            <button type="button" class="search-trigger close-btn"><i class="anm anm-times-l"></i></button>
        </div>
    </div>
    <!--End Search Form Drawer-->
    <!--Top Header-->
    <div class="top-header">
        <div class="container-fluid">
            <div class="row">
            	<div class="col-10 col-sm-8 col-md-5 col-lg-4">
                   
                  
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 d-none d-lg-none d-md-block d-lg-block">
                	
                </div>
                <div class="col-2 col-sm-4 col-md-3 col-lg-4 text-right">
                	<span class="user-menu d-block d-lg-none"><i class="anm anm-user-al" aria-hidden="true"></i></span>
                    <ul class="customer-links list-inline">
                        
                        
                        @if(!session()->has('USER_LOGIN'))
                        <li><a href="{{url('user_login')}}">Login</a></li>
                        <li><a href="{{url('user_registrashion')}}">Create Account</a></li>
                        @else
                        <li><a href="{{url('vendoer_login')}}">Sell Your Products Here?</a></li>
                        <li><a href="{{url('user_wishlist')}}">Wishlist</a></li>
                        <div class="language-dropdown">
                            <span class="language-ddd">USER NAME</span>
                            <ul id="language1">
                                <li class=""><a href="{{url('user/profile')}}">Profile</a></li>
                                <li class=""><a href="{{url('user/ordered')}}"> Order</a></li>
                                <li class=""><a href="{{url('user/logout')}}">Logout</a></li>
                            </ul>
                        </div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--End Top Header-->
    <!--Header-->
    <div class="header-wrap animated d-flex border-bottom">
    	<div class="container-fluid">        
            <div class="row align-items-center">
            	<!--Desktop Logo-->
                <div class="logo col-md-2 col-lg-2 d-none d-lg-block">
                    <a href="{{url('/')}}">
                        <img src="{{asset('admin_assets/images/icon/logo.jpg')}}"  alt="Cart que" title="Cart que" />
                    </a>
                </div>
                <!--End Desktop Logo-->
                <div class="col-2 col-sm-3 col-md-3 col-lg-8">
                	<div class="d-block d-lg-none">
                        <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                        	<i class="icon anm anm-times-l"></i>
                            <i class="anm anm-bars-r"></i>
                        </button>
                    </div>
                	<!--Desktop Menu-->
                	<nav class="grid__item" id="AccessibleNav"><!-- for mobile -->
                        <ul id="siteNav" class="site-nav medium center hidearrow">
                            <li class="lvl1 parent megamenu"><a href="{{url('/')}}">Home <i class="anm anm-angle-down-l"></i></a>
                
            </li>
            @foreach($category as $list)
            <li class="lvl1 parent megamenu"><a href="{{url('category')}}/{{$list->id}}">{{$list->category_name}} <i class="anm anm-angle-down-l"></i></a>
            @foreach($sub_category as $list1)
                @if($list->id==$list1->category_id)
                <div class="megamenu ">
                    <ul class="grid grid--uniform mmWrapper">

                       
                        <li class="grid__item lvl-1 col-md-3"><a href="#" class="site-nav lvl-1">Sub Categorys</a>
                     
                        <ul class="subLinks">
                        @foreach($sub_category as $list1)
                            @if($list->id==$list1->category_id)
                                    <li class="lvl-2"><a href="{{url('sub_category')}}/{{$list1->id}}" class="site-nav lvl-2">{{$list1->sub_category_name}}</a></li>
                            @endif
                        @endforeach
                        </ul>
                    </li>
             
                </div>
                @endif
            @endforeach
            </li>
            @endforeach
           
                        
                    
            <li class="lvl1 parent dropdown"><a href="{{url('blog')}}">Blog <i class="anm anm-angle-down-l"></i></a>
                
            </li>
            
            </ul>
        </nav>
                    <!--End Desktop Menu-->
                </div>
                <!--Mobile Logo-->
                <div class="col-6 col-sm-6 col-md-6 col-lg-2 d-block d-lg-none mobile-logo">
                	<div class="logo">
                        <a href="{{url('/')}}">
                        <img src="{{asset('admin_assets/images/icon/logo.jpg')}}"  alt="Cart que" title="Cart que" />
                        </a>
                    </div>
                </div>
                <!--Mobile Logo-->
                <div class="col-4 col-sm-3 col-md-3 col-lg-2">
                	<div class="site-cart">
                            @php
                                $count=count($cart);
                            @endphp
                    	<a href="#" class="site-header__cart" title="Cart">
                        	<i class="icon anm anm-bag-l"></i>
                            <span id="CartCount" class="site-header__cart-count" data-cart-render="item_count">{{$count}}</span>
                        </a>
                        <!--Minicart Popup-->
                        @if(session()->has('USER_id'))
                        <div id="header-cart" class="block block-cart">
                            <ul class="mini-products-list" >
                            @php
                                $total=0;
                            @endphp
                                @foreach($cart as $list)
                                   
                                        <li class="item{{$list->id}}">
                                            <a class="product-image" href="{{url('product_details')}}/{{$list->pid}}">
                                                <img src="{{asset('storage/media/product/'.$list->image)}}" alt="{{$list->name}}" title="" />
                                            </a>
                                            <div class="product-details">
                                                <a href="javascript:void(0)" onclick="remove_add_to_cart('{{$list->id}}')" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                                                
                                                {{$list->name}}
                                                
                                                <div class="wrapQtyBtn">
                                                    <div class="qtyField">
                                                        <span class="label">Qty:</span>
                                                        <a class="qtyBtn minus" href="javascript:void(0);" onclick="minus_add_to_cart('{{$list->id}}')"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                        <input type="text" id="Quantity" name="quantity" value="{{$list->q}}" class="product-form__input qty">
                                                        <a class="qtyBtn plus" onclick="plus_add_to_cart('{{$list->id}}')" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                                <div class="priceRow">
                                                    <div class="product-price">
                                                        <span class="money"> &#8377;{{$list->mrp}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @php
                                        $price=$list->mrp*$list->q;
                                        $total+=$price
                                    @endphp
                                @endforeach
                                    <div id="main_pop"></div>

                                </ul>
                            <div class="total">
                            	<div class="total-in">
                                	<span class="label">Cart Subtotal:</span><span class="product-price"><span id="money" class="money"> &#8377;{{$total}}</span></span>
                                </div>
                                 <div class="buttonSet text-center">
                                    <a href="{{url('user/cart')}}" class="btn btn-secondary btn--small">View Cart</a>
                                    <a href="{{url('checkout')}}" class="btn btn-secondary btn--small">Checkout</a>
                                </div>
                            </div>
                        </div>
                        @else
                        @endif
                        <!--End Minicart Popup-->
                    </div>
                    <div class="site-header__search">
                    	
                    </div>
                </div>
        	</div>
        </div>
    </div>
    <!--End Header-->
    
    <!--Mobile Menu-->
    <div class="mobile-nav-wrapper" role="navigation">
		<div class="closemobileMenu"><i class="icon anm anm-times-l pull-right"></i> Close Menu</div>
        <ul id="MobileNav" class="mobile-nav">
        	<li class="lvl1 parent megamenu"><a href="{{url('/')}}">Home <i class="anm anm-plus-l"></i></a></li>
        	<li class="lvl1 parent megamenu"><a href="#">Shop <i class="anm anm-plus-l"></i></a>
          <ul>
            <li><a href="#" class="site-nav">Category<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="shop-left-sidebar.html" class="site-nav">Left Sidebar</a></li>
                <li><a href="shop-right-sidebar.html" class="site-nav">Right Sidebar</a></li>
                <li><a href="shop-fullwidth.html" class="site-nav">Fullwidth</a></li>
                <li><a href="shop-grid-3.html" class="site-nav">3 items per row</a></li>
                <li><a href="shop-grid-4.html" class="site-nav">4 items per row</a></li>
                <li><a href="shop-grid-5.html" class="site-nav">5 items per row</a></li>
                <li><a href="shop-grid-6.html" class="site-nav">6 items per row</a></li>
                <li><a href="shop-grid-7.html" class="site-nav">7 items per row</a></li>
                <li><a href="shop-listview.html" class="site-nav last">Product Listview</a></li>
              </ul>
            </li>
            <li><a href="#" class="site-nav">Shop Features<i class="anm anm-plus-l"></i></a>
              <ul>
                <li><a href="shop-left-sidebar.html" class="site-nav">Product Countdown </a></li>
                <li><a href="shop-right-sidebar.html" class="site-nav">Infinite Scrolling</a></li>
                <li><a href="shop-grid-3.html" class="site-nav">Pagination - Classic</a></li>
                <li><a href="shop-grid-6.html" class="site-nav">Pagination - Load More</a></li>
                <li><a href="product-labels.html" class="site-nav">Dynamic Product Labels</a></li>
                <li><a href="product-swatches-style.html" class="site-nav">Product Swatches </a></li>
                <li><a href="product-hover-info.html" class="site-nav">Product Hover Info</a></li>
                <li><a href="shop-grid-3.html" class="site-nav">Product Reviews</a></li>
                <li><a href="shop-left-sidebar.html" class="site-nav last">Discount Label </a></li>
              </ul>
            </li>
          </ul>
        </li>
        
        
        	<li class="lvl1 parent megamenu"><a href="{{url('blog')}}">Blog <i class="anm anm-plus-l"></i></a>
         
       
      </ul>
	</div>
	<!--End Mobile Menu-->
    @section('container')
    @show
    <!--Footer-->
    <footer id="footer" class="footer-2">
       <hr>
        <div class="site-footer">
        	<div class="container">
     			<!--Footer Links-->
            	<div class="footer-top">
                	
                </div>
                <!--End Footer Links-->
               
                <div class="footer-bottom">
                	<div class="row">
                    	<!--Footer Copyright-->
	                	<div class="col-12 col-sm-12 col-md-12 col-lg-12 order-1 order-md-0 order-lg-0 order-sm-1 copyright text-center"><span></span> <a href="templateshub.net">Templates Hub</a></div>
                        <!--End Footer Copyright-->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--End Footer-->
    <!--Scoll Top-->
    <span id="site-scroll"><i class="icon anm anm-angle-up-r"></i></span>
    <!--End Scoll Top-->
    
    <!--Quick View popup-->
    <div class="modal fade quick-view-popup" id="content_quickview">
    	<div class="modal-dialog">
        	<div class="modal-content">
            	<div class="modal-body">
                    <div id="ProductSection-product-template" class="product-template__container prstyle1">
                <div class="product-single">
                <!-- Start model close -->
                <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right" title="close"><span class="icon icon anm anm-times-l"></span></a>
                <!-- End model close -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                            <div class="pl-20">
                                <img src="assets/images/product-detail-page/camelia-reversible-big1.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product-single__meta">
                                <h2 class="product-single__title">Product Quick View Popup</h2>
                                <div class="prInfoRow">
                                    <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                                    <div class="product-sku">SKU: <span class="variant-sku">19115-rdxs</span></div>
                                </div>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    <s id="ComparePrice-product-template"><span class="money">$600.00</span></s>
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money">$500.00</span></span>
                                    </span>
                                </p>
                                <div class="product-single__description rte">
                                    Belle Multipurpose Bootstrap 4 Html Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion,...
                                </div>
                                
                            <form method="post" action="http://annimexweb.com/cart/add" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
                                <div class="swatch clearfix swatch-0 option1" data-option-index="0">
                                    <div class="product-form__item">
                                      <label class="header">Color: <span class="slVariant">Red</span></label>
                                      <div data-value="Red" class="swatch-element color red available">
                                        <input class="swatchInput" id="swatch-0-red" type="radio" name="option-0" value="Red">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-red" style="background-image:url(assets/images/product-detail-page/variant1-1.jpg);" title="Red"></label>
                                      </div>
                                      <div data-value="Blue" class="swatch-element color blue available">
                                        <input class="swatchInput" id="swatch-0-blue" type="radio" name="option-0" value="Blue">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-blue" style="background-image:url(assets/images/product-detail-page/variant1-2.jpg);" title="Blue"></label>
                                      </div>
                                      <div data-value="Green" class="swatch-element color green available">
                                        <input class="swatchInput" id="swatch-0-green" type="radio" name="option-0" value="Green">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-green" style="background-image:url(assets/images/product-detail-page/variant1-3.jpg);" title="Green"></label>
                                      </div>
                                      <div data-value="Gray" class="swatch-element color gray available">
                                        <input class="swatchInput" id="swatch-0-gray" type="radio" name="option-0" value="Gray">
                                        <label class="swatchLbl color medium rectangle" for="swatch-0-gray" style="background-image:url(assets/images/product-detail-page/variant1-4.jpg);" title="Gray"></label>
                                      </div>
                                    </div>
                                </div>
                                <div class="swatch clearfix swatch-1 option2" data-option-index="1">
                                    <div class="product-form__item">
                                      <label class="header">Size: <span class="slVariant">XS</span></label>
                                      <div data-value="XS" class="swatch-element xs available">
                                        <input class="swatchInput" id="swatch-1-xs" type="radio" name="option-1" value="XS">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-xs" title="XS">XS</label>
                                      </div>
                                      <div data-value="S" class="swatch-element s available">
                                        <input class="swatchInput" id="swatch-1-s" type="radio" name="option-1" value="S">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-s" title="S">S</label>
                                      </div>
                                      <div data-value="M" class="swatch-element m available">
                                        <input class="swatchInput" id="swatch-1-m" type="radio" name="option-1" value="M">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-m" title="M">M</label>
                                      </div>
                                      <div data-value="L" class="swatch-element l available">
                                        <input class="swatchInput" id="swatch-1-l" type="radio" name="option-1" value="L">
                                        <label class="swatchLbl medium rectangle" for="swatch-1-l" title="L">L</label>
                                      </div>
                                    </div>
                                </div>
                                <!-- Product Action -->
                                <div class="product-action clearfix">
                                    <div class="product-form__item--quantity">
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="Quantity" name="quantity" value="1" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>                                
                                    <div class="product-form__item--submit">
                                        <button type="button" name="add" class="btn product-form__cart-submit">
                                            <span>Add to cart</span>
                                        </button>
                                    </div>
                                </div>
                                <!-- End Product Action -->
                            </form>
                            <div class="display-table shareRow">
                                <div class="display-table-cell">
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
                <!--End-product-single-->
                </div>
            </div>
        		</div>
        	</div>
        </div>
    </div>
    <!--End Quick View popup-->
    
    <!-- Newsletter Popup -->

	<!-- End Newsletter Popup -->
    <form id="frmAddToCart">
    @csrf
    
    <input type="hidden" id="color_id" name="color_id">
    <input type="hidden" id="qty" name="qty">
    <input type="hidden" id="product_id" name="product_id">
    
  </form>
    <form id="removeAddToCart">
        @csrf
        <input type="hidden" name="add_id"  id="add_id">
    </form>
    <form id="minusaddtocart">
        @csrf
        <input type="hidden" name="minus_id"  id="minus_id">
    </form>
  <form id="plusaddtocart">
        @csrf
        <input type="hidden" name="plus_id"  id="plus_id">
    </form>
    <form id="addaddtocart">
        @csrf
        <input type="hidden" name="add_add_id"  id="add_add_id">
    </form>
    <form id="couponcode">
        @csrf
        <input type="hidden" name="coupon_code"  id="coupon_code">
    </form>
    <form id="wishilist">
        @csrf
        <input type="hidden" name="wishilist_id"  id="wishilist_id">
    </form>
    <form id="removewishlist">
        @csrf
        <input type="hidden" name="removewishlist"  id="removewishlist">
    </form>
        <!--Including Jquery -->
     <script src="{{asset('front_assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
     <script src="{{asset('front_assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
     <script src="{{asset('front_assets/js/vendor/jquery.cookie.js')}}"></script>
     <script src="{{asset('front_assets/js/vendor/wow.min.js')}}"></script>
     <!-- Including Javascript -->
     <script src="{{asset('front_assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('front_assets/js/plugins.js')}}"></script>
     <script src="{{asset('front_assets/js/popper.min.js')}}"></script>
     <script src="{{asset('front_assets/js/lazysizes.js')}}"></script>
     <script src="{{asset('front_assets/js/main.js')}}"></script>
     <script src="{{asset('front_assets/js/custome.js')}}"></script>
     <!--For Newsletter Popup-->
     <script>
        

		jQuery(document).ready(function(){  
		  jQuery('.closepopup').on('click', function () {
			  jQuery('#popup-container').fadeOut();
			  jQuery('#modalOverly').fadeOut();
		  });
		  
		  var visits = jQuery.cookie('visits') || 0;
		  visits++;
		  jQuery.cookie('visits', visits, { expires: 1, path: '/' });
		  console.debug(jQuery.cookie('visits')); 
		  if ( jQuery.cookie('visits') > 1 ) {
			jQuery('#modalOverly').hide();
			jQuery('#popup-container').hide();
		  } else {
			  var pageHeight = jQuery(document).height();
			  jQuery('<div id="modalOverly"></div>').insertBefore('body');
			  jQuery('#modalOverly').css("height", pageHeight);
			  jQuery('#popup-container').show();
		  }
		  if (jQuery.cookie('noShowWelcome')) { jQuery('#popup-container').hide(); jQuery('#active-popup').hide(); }
		}); 
		
		jQuery(document).mouseup(function(e){
		  var container = jQuery('#popup-container');
		  if( !container.is(e.target)&& container.has(e.target).length === 0)
		  {
			container.fadeOut();
			jQuery('#modalOverly').fadeIn(200);
			jQuery('#modalOverly').hide();
		  }
		});
		
		/*--------------------------------------
			Promotion / Notification Cookie Bar 
		  -------------------------------------- */
		  if(Cookies.get('promotion') != 'true') {   
			 $(".notification-bar").show();         
		  }
		  $(".close-announcement").on('click',function() {
			$(".notification-bar").slideUp();  
			Cookies.set('promotion', 'true', { expires: 1});  
			return false;
		  });
	</script>
    <!--End For Newsletter Popup-->
</div>
</body>

<!-- belle/home2-default.html   11 Nov 2019 12:23:42 GMT -->
</html>