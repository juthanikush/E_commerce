@extends('admin/layout')
@section('page_title','Category')
@section('category_select','active')
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
            <h2 class="title-1">Category</h2>
            <a href="{{url('admin/add/form')}}" class="au-btn au-btn-icon au-btn--blue">
                <i class="zmdi zmdi-plus"></i>add Category</a>
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
        @if(isset($data[0]->id))
                
            <table class="table table-borderless table-data3" id="category_table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Categoru</th>
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
                        <td>{{$list->category_name}}</td>
                        <td><a href="{{url('admin/category/edit')}}/{{$list->id}}" class="white btn btn-primary">Edit</a> 
                        <!-- @if($list->status==1)
                        <a href="{{url('admin/category/status')}}/{{$list->id}}/{{0}}" class="white btn btn-secondary " id="deactive">Deactive</a> 
                        @else
                        <a href="{{url('admin/category/status')}}/{{$list->id}}/{{1}}" class="white btn btn-warning">Active</a> 
                        @endif -->
                        <a href="{{url('admin/category/delete')}}/{{$list->id}}" class="white btn btn-danger">Delete</a></td>
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
<form id="status_form">
    @csrf
    <input type="hidden" id="id" name="id">
    <input type="hidden" id="status" name="status">
</form>
<script>
    function status($id,$status)
    {
        
        var name;
        jQuery('#id').val($id);
        jQuery('#status').val($status);
        if($status==0)
        {
            name="deactive";
        }
        else
        {
            name="active";
        }

        jQuery.ajax({
            url:"{{url('admin/category/status')}}",
            data:jQuery('#status_form').serialize(),
            type:'post',
            success:function(result){
                if(result.status=='success')
                {
                    //pending code....
                }
            }
        });
    }
</script>
@endsection