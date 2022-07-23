@extends('front/layout')
@section('page_title','Profile');
@section('container') 
    <!--Body Content-->
    <div id="page-content">
    	<!--Page Title-->
      @if(session()->has('message'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        {{session('message')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
        </div>
        @endif
    	<div class="page section-header text-center">
			<div class="page-title">
        		<div class="wrapper"><h1 class="page-width">Profile</h1></div>
      		</div>
		</div>
        <!--End Page Title-->
        
        <div class="container">
        	<div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 main-col offset-md-3">
                	<div class="mb-4">
                        @php
                            $i=1;
                        @endphp
                        @foreach($user_address as $list)
                            <h2>Address {{$i}}</h2>
                            Name: {{$list->name}}<br>
                            Address: {{$list->address}}<br>
                            City: {{$list->city}}<br>
                            PinCode: {{$list->pincode}}<br>
                            <a href="{{url('user/address/edit')}}/{{$list->id}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('user/address/delete')}}/{{$list->id}}" class="btn btn-danger">Delete</a>
                            <br><br>
                        @php
                            $i++;
                        @endphp
                        @endforeach
                    </div>
                    <a href="{{url('add/address')}}" class="btn btn-success">+Add Address</a>
               	</div>
            </div>
        </div>
        
    </div>
    <!--End Body Content-->
    
@endsection