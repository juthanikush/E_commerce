@extends('admin/layout')
@section('page_title','Coupon')
@section('coupon_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Coupon</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Add Coupon</h3>
            </div>
            <hr>
            <form action="{{url('admin/edit/coupon')}}" method="post" novalidate="novalidate">
            @csrf
            <input type="hidden" value="{{$data['id']}}" name="id" >
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Coupon Name</label>
                            <input id="cc-exp" value="{{$data['coupon_name']}}" name="coupon_name" type="text" class="form-control cc-exp">
                        </div>
                        @error('coupon_name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="x_card_code" class="control-label mb-1">Price</label>
                        <div class="input-group">
                            <input id="x_card_code" value="{{$data['value']}}" name="price" type="text" class="form-control cc-cvc" >
                        </div>
                        @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection