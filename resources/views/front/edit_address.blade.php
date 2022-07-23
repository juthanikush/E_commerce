@extends('front/layout')
@section('page_title','Add Address')
@section('container')  
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                       <form method="post" action="{{url('edit_address')}}" id="CustomerLoginForm" accept-charset="UTF-8" class="contact-form">	
                           @csrf
                           <input type="hidden" name="id" value={{$add[0]->id}}
                          <div class="row">
	                          <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="FirstName">Name</label>
                                    <input type="text" name="name" value="{{$add[0]->name}}" placeholder="" id="name" autofocus="">
                                </div>
                                @error('name')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                               </div>
                               <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="LastName">Address</label>
                                    <input type="text" value="{{$add[0]->address}}" name="address" placeholder="" id="address">
                                </div>
                                @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                               </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerEmail">City</label>
                                    <input type="text" value="{{$add[0]->city}}" name="city" placeholder="" id="CustomerEmail" class="" autocorrect="off" autocapitalize="off" autofocus="">
                                </div>
                                @error('city')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="CustomerPassword">Pincode</label>
                                    <input type="text"  name="pincode" value="{{$add[0]->pincode}}" placeholder="" id="CustomerPassword" class="">                        	
                                </div>
                                @error('pincode')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                          </div>
                          <div class="row">
                            <div class="text-center col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="submit" class="btn mb-3" value="Edit">
                            </div>
                         </div>
                     </form>
                    </div>
               	</div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
 @endsection