@extends('admin/layout')
@section('page_title','Sub Category')
@section('sub_category_select','active')
@section('container')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Category</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Add Category</h3>
            </div>
            <hr>
            <?php
            
                
            ?>
            <form action="{{url('admin/edit/sub_category')}}" method="post" novalidate="novalidate">
            @csrf
                <input type="hidden" value="{{$data1['id']}}" name="id" >
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Category Name</label>
                            <select name="category_id" class="form-control">
                                @foreach($data as $list)
                                    @if($data1['category_id']==$list->id)
                                        <option selected value="{{$list->id}}">{{$list->category_name}}</option>
                                    @else
                                        <option  value="{{$list->id}}">{{$list->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="x_card_code" class="control-label mb-1">Sub Category Name</label>
                        <div class="input-group">
                            <input id="x_card_code" name="sub_category_name" type="text" value="{{$data1['sub_category_name']}}" class="form-control cc-cvc" >

                        </div>
                        @error('sub_category_name')
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