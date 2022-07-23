@extends('admin/layout')
@section('page_title','Brands')
@section('brands_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">1Baner</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Add Baner</h3>
            </div>
            <hr>
            <form action="{{url('admin/add/baner')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Baner Image</label>
                            <input id="cc-exp" name="image" type="file" class="form-control cc-exp">
                        </div>
                        @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Button Txt</label>
                            <input id="cc-exp" name="btn_txt" type="text" class="form-control cc-exp">
                        </div>
                        @error('btn_txt')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Button Link </label>
                            <input id="cc-exp" name="btn_link" type="text" class="form-control cc-exp">
                        </div>
                        @error('btn_link')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Heading</label>
                            <input id="cc-exp" name="heading" type="text" class="form-control cc-exp">
                        </div>
                        @error('heading')
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