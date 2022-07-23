@extends('front/layout')
@section('page_title','Checkout')
@section('container')   
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Checkout</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        

            <div class="row billing-fields">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 sm-margin-30px-bottom">
                    <div class="create-ac-content bg-light-gray padding-20px-all">
                        <form method="post" action="{{url('place/order')}}">
                            @csrf
                            <fieldset>
                                
                                <h2 class="login-title mb-3">Billing details</h2>
                                <div class="mb-4">
                        @php
                            $i=1;
                        @endphp
                        @foreach($user_address as $list)
                            <h2><input checked type="radio" name="address" value="{{$list->id}}" >Address {{$i}}</input></h2>
                            Name: {{$list->name}}<br>
                            Address: {{$list->address}}<br>
                            City: {{$list->city}}<br>
                            PinCode: {{$list->pincode}}<br><br>
                            <a href="{{url('user/address/edit')}}/{{$list->id}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('user/address/delete')}}/{{$list->id}}" class="btn btn-danger">Delete</a>
                            <br><br>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                        <a href="{{url('add/address')}}" class="btn btn-success">+Add Address</a>
                    </div>
                             
                                

                            
                        
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="your-order-payment">
                        <div class="your-order">
                            <h2 class="order-title mb-4">Your Order</h2>

                            <div class="table-responsive-sm order-table"> 
                                <table class="bg-white table table-bordered table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Product Name</th>
                                            <th>Price</th>
                                            <th>Color</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $gt=0;
                                        @endphp
                                        @foreach($cart as $list)
                                        <tr>
                                            <td class="text-left">{{$list->name}}</td>
                                            <td>&#8377;{{$list->mrp}}</td>
                                            <td>{{$list->color}}</td>
                                            <td>{{$list->q}}</td>
                                            @php
                                                $subtot=0;
                                                $subtot=$list->mrp*$list->q;
                                                $gt+=$subtot;
                                            @endphp
                                            <td>&#8377;{{$subtot}}</td>
                                        </tr>
                                        
                                        @endforeach
                                       
                                    </tbody>
                                    <tfoot class="font-weight-600">
                                        @if(session()->has('COUPON_CODE'))
                                        <tr>
                                            <td colspan="4" class="text-right">Coupon Code </td>
                                            <td>&#8377;{{session()->get('COUPON_CODE')}}</td>
                                            @php
                                                $gt=$gt-session()->get('COUPON_CODE');
                                            @endphp
                                            <input type="hidden" value="{{session()->get('COUPON_CODE')}}" name="coupon_code">
                                        </tr>
                                        @else
                                            <input type="hidden" value="0" name="coupon_code">
                                        @endif
                                        <tr>
                                            @php
                                                $tax=($gt*$tax_value[0]->Tax)/100;
                                                $gt+=$tax;
                                            @endphp
                                            <td colspan="4" class="text-right">Tax/GST </td>
                                            <td>&#8377;{{$tax}}</td>
                                           
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total</td>
                                            <td>&#8377;{{$gt}}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        
                        <hr />

                        <div class="your-payment">
                            <h2 class="payment-title mb-3">payment method</h2>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div id="accordion" class="payment-section">
                                       
                                        <div class="card margin-15px-bottom border-radius-none">
                                            <div class="card-header">
                                                <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree"> Online Mode </a>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                <div class="card-body">
                                                    <input type="radio" name="gateway" value="instamojo" checked> ATM Card
</div></div>
                                        </div>
                                       
                                    </div>
                                </div>

                                <div class="order-button-payment">
                                    <button class="btn" value="Place order" type="submit">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!--End Body Content-->
@endsection