@extends('front/vendore/layout')
@section('page_title','Product')
@section('product_select','active')
@section('container')

<div class="col-lg-12">
<form action="{{url('vendor/edit/product_attr')}}" method="post"  enctype="multipart/form-data">
    @csrf
        <h1>Product Attributes</h1>
        <div class="card" id="card">
            <div class="card-body" >
                <div class="row">
                    <input type="hidden" value="{{$data2[0]->id}}" name="id">
                    <input type="hidden" value="{{$data2[0]->p_id}}" name="p_id">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">MRP</label>
                            <input id="cc-exp" name="mrp" type="text" class="form-control cc-exp" value="{{$data2[0]->mrp}}" required>
                        </div>
                        @error("mrp")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                        
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">SIZE</label>
                            <select name="size" class="form-control" require>
                                <option>Select Any one</option>
                                @foreach($data as $list)
                                @if($data2[0]->size_id == $list->id)
                                <option selected value="{{$list->id}}">{{$list->size}}
                                @else
                                <option  value="{{$list->id}}">{{$list->size}}
                                @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error("size")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Color</label>
                            <select name="color" class="form-control" required>
                            <option>Select Any one</option>
                                @foreach($data1 as $list)
                                @if($data2[0]->color_id==$list->id)
                                <option selected value="{{$list->id}}">{{$list->color}}
                                @else
                                <option value="{{$list->id}}">{{$list->color}}
                                @endif
                            </option>
                                @endforeach
                            </select>
                        </div>
                        @error("color")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                
                    <div class="col-5">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Qty</label>
                            <input type="text" name="qty" value="{{$data2[0]->qty}}"class="form-control cc-exp" required> 
                        </div>
                        @error("qty")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Image</label>
                            <input type="file" name="image" class="form-control cc-exp" > 
                        </div>
                        <img src="{{asset('storage/media/product/'.$data2[0]->image)}}" height="150px" width="150px" alt="" srcset="">
                        @error("image")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div>
        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Submit</button>
    </div>
</form>
</div>

@endsection