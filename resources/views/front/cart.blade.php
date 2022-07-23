@extends('front/layout')
@section('page_title','cart')
@section('container')   
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Shopping Cart</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 main-col">
                	<div class="alert alert-success text-uppercase" role="alert">
						<i class="icon anm anm-truck-l icon-large"></i> &nbsp;<strong>Congratulations!</strong> You've got free shipping!
					</div>
                	<form action="#" method="post" class="cart style2">
                		<table>
                            <thead class="cart__row cart__header">
                                <tr>
                                    <th colspan="2" class="text-center">Product</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Total</th>
                                    <th class="action">&nbsp;</th>
                                </tr>
                            </thead>
                    		<tbody>
                                @php
                                    $total=0;
                                @endphp
                                @foreach($cart as $list)
                                <tr class="cart__row border-bottom line1 cart-flex border-top item{{$list->id}}">
                                    <td class="cart__image-wrapper cart-flex-item">
                                        <a href="#"><img class="cart__image" src="{{asset('storage/media/product/'.$list->image)}}" alt="Minerva Dress black"></a>
                                    </td>
                                    <td class="cart__meta small--text-left cart-flex-item">
                                        <div class="list-view-item__title">
                                            <a href="#">{{$list->name}}</a>
                                        </div>
                                    </td>
                                    <td class="cart__price-wrapper cart-flex-item">
                                        <span class=""> &#8377;{{$list->mrp}}</span>
                                    </td>
                                    <td class="cart__update-wrapper cart-flex-item text-right">
                                        <div class="cart__qty text-center">
                                            <div class="qtyField">
                                                <a class="qtyBtn minus" onclick="minus_add_to_cart('{{$list->id}}')" href="javascript:void(0);"><i class="icon icon-minus"></i></a>
                                                <input class="cart__qty-input qty" type="text" name="updates[]" id="qty" value="{{$list->q}}" pattern="[0-9]*">
                                                <a class="qtyBtn plus" onclick="plus_add_to_cart('{{$list->id}}')"  href="javascript:void(0);"><i class="icon icon-plus"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                    @php
                                    $tot=0;
                                    $tot=$list->q*$list->mrp;
                                    @endphp
                                    <td class="text-right small--hide cart-price">
                                        <div><span class="money{{$list->id}}" id="price{{$list->id}}" > &#8377;{{$tot}}</span></div>
                                    </td>
                                    <td class="text-center small--hide"><a href="javascript:void(0)" onclick="remove_add_to_cart('{{$list->id}}')"  class="btn btn--secondary cart__remove" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a></td>
                                </tr>
                                @php
                                    $total+=$tot;
                                @endphp
                                @endforeach
                            </tbody>
                    		<tfoot>
                                <tr>
                                    <td colspan="3" class="text-left"><a href="{{url('/')}}" class="btn btn-secondary btn--small cart-continue">Continue shopping</a></td>
                                    <td colspan="3" class="text-right">
	                                    <a type="submit" href="{{url('clear/cart')}}" name="clear" class="white btn btn-secondary btn--small  small--hide">Clear Cart</a>
                                    	
                                    </td>
                                </tr>
                            </tfoot>
                    </table> 
                    </form>                   
               	</div>
                
                
                <div class="container mt-4">
                    <div class="row">
                    	<div class="col-12 col-sm-12 col-md-5 col-lg-5 mb-5">
                            <div id="add_to_cart_msg"></div>
                        	<h5>Discount Codes</h5>
                            <form action="#" method="post">
                            	<div class="form-group">
                                    <label for="address_zip">Enter your coupon code if you have one.</label>
                                    <input type="text" id="coupon" name="coupon">
                                </div>
                                <div class="actionRow">
                                    <div>
                                        <a href="javascript:void(0)" class="btn btn-secondary btn--small" onclick="coupon_code()">Apply Coupon</a>
                                       </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 mb-2">
                        	
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 cart__footer">
                            <div class="solid-border">	
                              <div class="row border-bottom pb-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Subtotal</span>
                                <span class="col-12 col-sm-6 text-right"><span id="money1" class="money"> &#8377;{{$total}}.00</span></span>
                              </div>
                              @php
                                $tax=($total*$tax_value[0]->Tax)/100;
                                $GT=$tax+$total;
                              @endphp
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Tax</span>
                                <span class="col-12 col-sm-6 text-right" id="TAX"> &#8377;{{$tax}}</span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title">Shipping</span>
                                <span class="col-12 col-sm-6 text-right">Free shipping</span>
                              </div>
                              <div class="row border-bottom pb-2 pt-2">
                                <span class="col-12 col-sm-6 cart__subtotal-title"><strong>Grand Total</strong></span>
                                <span class="col-12 col-sm-6 cart__subtotal-title cart__subtotal text-right"><span class="money1" id="GT" > &#8377;{{$GT}}</span></span>
                              </div>
                              <br>
                              <a href="{{url('checkout')}}" class="white btn btn--small-wide checkout">Proceed To Checkout</a>
                              
                            </div>
        
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
@endsection