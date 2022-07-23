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
                                    	
                                        <th>Sr.No</th>
                                        <th>Date</th>
                                        <th >Amount</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1;
                                        
                                    @endphp
                                    @foreach($groupde as $list)
                                    @php
                                        $total=0;
                                       
                                    @endphp
                                    @foreach($list as $list1)
                                        @php
                                            $total+=$list1->mrp*$list1->qty;
                                            $date=$list1->date;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        
                                        <td >{{$i}}</td>
                                        <td ><a href="{{url('admin/order_view')}}/{{$list1->id}}">{{$date }}</a></td>
                                        <td >&#8377;{{$total}}</td>
                                        
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