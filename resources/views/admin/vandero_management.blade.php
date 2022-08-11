@extends('admin/layout')
@section('page_title','Vendore Management')
@section('vendore_select','active')
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
                        <th>Business Name</th>
                        <th>GST No.</th>
                        <th>Athar Card  No.</th>
                        
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($data as $list)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href="{{url('admin/vendor_product/details')}}/{{$list->id}}">{{$list->business_name}}</a></td>
                        <td>{{$list->GST_NO}}</td>
                        <td>{{$list->athara_cart_no}}</td>
                        
                        <td>
                        @if($list->status==1)
                        <a href="{{url('admin/vendoer/status')}}/{{$list->id}}/{{0}}" class="white btn btn-secondary">Deactive</a> 
                        @else
                        <a href="{{url('admin/vendoer/status')}}/{{$list->id}}/{{1}}" class="white btn btn-warning">Active</a> 
                        @endif
                        <a href="{{url('admin/vendoer/delete')}}/{{$list->id}}" class="white btn btn-danger">Delete</a></td>
                        
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