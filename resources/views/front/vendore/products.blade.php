@extends('front/vendore/layout')
@section('page_title','Product')
@section('product_select','active')
@section('container')
@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
{{session('message')}}
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
   </button>
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Product</h2>
            <a href="{{url('vendor/add/product')}}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add Product</a>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            @if(isset($data[0]->id))
                
                <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        
                        <th>No.</th>
                        <th>Name</th>
                        <th>Image</th>
                        
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($data as $list)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{url('vendor/product/pro_attr')}}/{{$list->id}}">{{$list->name}}</a></td>
                        <td><img src="{{asset('storage/media/product/'.$list->main_image)}}" height="150px" width="150px" alt="" srcset=""></td>
                        <td><a href="{{url('vendor/product/edit')}}/{{$list->id}}" class="white btn btn-primary">Edit</a> 
                        <!-- @if($list->status==1)
                        <a href="{{url('vendor/product/status')}}/{{$list->id}}/{{0}}" class="white btn btn-secondary">Deactive</a> 
                        @else
                        <a href="{{url('vendor/product/status')}}/{{$list->id}}/{{1}}" class="white btn btn-warning">Active</a> 
                        @endif -->
                        <a href="{{url('vendor/product/delete')}}/{{$list->id}}" class="white btn btn-danger">Delete</a></td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                    
                </tbody>
            </table>
            @else
            <h1>Data is Not Avalibale</h1>
            @endif
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection