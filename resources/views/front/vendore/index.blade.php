@extends('front/vendore/layout')
@section('page_title','welcome')
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
            <h2 class="title-1">Welcome {{Session::get('VENDOR_NAME')}}</h2>
            
        </div>
    </div>
</div>
<div class="row m-t-30">
  
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