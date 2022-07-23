@extends('admin/layout')
@section('page_title','Category')
@section('category_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Category</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Add Category</h3>
            </div>
            <hr>
            <form action="{{url('admin/add/category')}}" method="post" novalidate="novalidate">
            @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Category Name</label>
                            <input id="cc-exp" name="category_name" type="text" class="form-control cc-exp">
                        </div>
                        @error('category_name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="x_card_code" class="control-label mb-1">Category Sluge</label>
                        <div class="input-group">
                            <input id="x_card_code" name="category_sluge" type="text" class="form-control cc-cvc" >
                        </div>
                        @error('category_sluge')
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