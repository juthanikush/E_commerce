@extends('admin/layout')
@section('page_title','Order')
@section('order_select','active')
@section('container')

<div class="row">
    <div class="col-md-12">
        <div class="overview-wrap">
            
        </div>
    </div>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>User Name</th>
                        <th>Email</th>
                      
                    </tr>
                </thead>
                <tbody>
                @php
                        $i=1;
                    @endphp
                    @foreach($user as $list)
                    <tr>
                        <td><a href="{{url('admin/total_order_of_user')}}/{{$list->id}}">{{$i}}</a></td>
                        <td>{{$list->first_name}} {{$list->last_name}}</td>
                        <td>{{$list->email}}</td>
                      
                    </tr>
                    @php
                        $i++;
                    @endphp
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection