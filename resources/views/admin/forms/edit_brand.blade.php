@extends('admin/layout')
@section('page_title','Brands')
@section('brands_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Brands</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Add Brands</h3>
            </div>
            <hr>
            <form action="{{url('admin/edit/brand')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
            <input type="hidden" value="{{$data['id']}}" name="id" >
            @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Brands</label>
                            <input id="cc-exp" name="image" type="file" class="form-control cc-exp">
                            <img src="{{asset('storage/media/brand/'.$data->image)}}" height="150px" width="150px" alt="" srcset="">
                        </div>
                        @error('image')
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