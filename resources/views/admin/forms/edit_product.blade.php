@extends('admin/layout')
@section('page_title','Product')
@section('product_select','active')
@section('container')

<div class="col-lg-12" >

<?php
//prx($da[0]->main_image);
?>
<form action="{{url('admin/edit/product')}}" method="post"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{$da[0]->id}}"> 
    <div class="card">
        <div class="card-header">Product</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Edit Product</h3>
            </div>
            <hr>
            
        
            @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Name</label>
                            <input id="cc-exp" name="name" value="{{$da[0]->name}}" type="text" class="form-control cc-exp" required>
                        </div>
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                        
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Image</label>
                            <input id="cc-exp" name="main_image" type="file" class="form-control cc-exp" >
                            <img src="{{asset('storage/media/product/'.$da[0]->main_image)}}" height="150px" width="150px" alt="" srcset="">
                        </div>
                        @error('main_image')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                        
                    </div>
                    
                    
                </div>
                <div class="row">
                    
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Sub Category Name</label>
                            <select name="sub_cat" class="form-control" required>
                            <option>Select Any one</option>
                                @foreach($data2 as $list)
                                @if($da[0]->sub_id==$list->id)
                                <option selected value="{{$list->id}}">{{$list->sub_category_name}}
                                @else
                                <option  value="{{$list->id}}">{{$list->sub_category_name}}
                                @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error("sub_cat")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Rating</label>
                            <select name="ra" class="form-control" required>
                                <option>Select Any one</option>
                                
                                @for($i=1;$i<=5;$i++)
                                    @if($da[0]->rating==$i)
                                    <option selected value="{{$i}}">{{$i}}
                                    @else
                                    <option  value="{{$i}}">{{$i}}
                                    @endif

                                    </option>
                                @endfor

                            </select>
                        </div>
                        @error('ra')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Short Descripshion</label>
                            <textarea id="short_desc" name="short_desc" type="text"  class="form-control" aria-required="true" aria-invalid="false" required>{{$da[0]->short_desc}}</textarea>
                        </div>
                        @error('short_desc')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                        
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">long Descripshion</label>
                            <textarea id="long_desc" name="long_desc" type="text"  class="form-control" aria-required="true" aria-invalid="false" required>{{$da[0]->long_desc}}</textarea>
                        </div>
                        @error('long_desc')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">is Feacherd</label>
                            <select name="is_fe" class="form-control" required>
                                <option>Select Any one</option>
                                @if($da[0]->isfechaer==1)
                                <option selected value="1">Yes</option>
                                @else
                                <option selected  value="0">No</option>
                                @endif
                                </select>
                        </div>
                        @error('is_fe')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                        
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Tax</label>
                            <select name="tax" class="form-control" required>
                            <option>Select Any one</option>
                                @foreach($data3 as $list)
                                @if($da[0]->tax_id==$list->id)
                                <option selected value="{{$list->id}}">{{$list->Tax}}%
                                @else
                                <option value="{{$list->id}}">{{$list->Tax}}%
                                @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                        @error('tax')
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