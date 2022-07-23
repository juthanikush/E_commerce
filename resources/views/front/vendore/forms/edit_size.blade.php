@extends('front/vendore/layout')
@section('page_title','Size')
@section('size_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Size</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Edit Size</h3>
            </div>
            <hr>
            <form action="{{url('vendor/edit/size')}}" method="post" novalidate="novalidate">
            @csrf
            <input type="hidden" value="{{$data['id']}}" name="id" >
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Size</label>
                            <input id="cc-exp" value="{{$data['size']}}" name="size" type="text" class="form-control cc-exp">
                        </div>
                        @error('size')
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