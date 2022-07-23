@extends('front/vendore/layout')
@section('page_title','Tax')
@section('tax_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Tax</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Add Tax</h3>
            </div>
            <hr>
            <form action="{{url('vendor/add/tax')}}" method="post" novalidate="novalidate">
            @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Tax</label>
                            <input id="cc-exp" name="tax" type="text" class="form-control cc-exp">
                        </div>
                        @error('tax')
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