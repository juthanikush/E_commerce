@extends('admin/layout')
@section('page_title','Users Details')
@section('user_select','active')
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
        <h1>User Address</h1>
        <div class="table-responsive m-b-40">
            @if(isset($data[0]->id))
                
                <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach($data as $list)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$list->address}}</td>
                        
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