@extends('front/vendore/layout')
@section('page_title','Product')
@section('product_select','active')
@section('container')

<div class="col-lg-12">
<form action="{{url('vendor/add/product')}}" method="post"  enctype="multipart/form-data">
    <div class="card">
        <div class="card-header">Product</div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="text-center title-2">Add Product</h3>
            </div>
            <hr>
            
            @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Name</label>
                            <input id="cc-exp" name="name" type="text" class="form-control cc-exp" required>
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
                            <input id="cc-exp" name="main_image" type="file" class="form-control cc-exp" required>
                        </div>
                        @error('main_image')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                        
                    </div>
                    
                    
                </div>
                <div class="row">
                    
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Sub Category Name</label>
                            <select name="sub_cat" class="form-control" required>
                            <option value="0">Select Any one</option>
                                @foreach($data2 as $list)
                                <option value="{{$list->id}}">{{$list->sub_category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error("sub_cat")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1"> Category Name</label>
                            <select name="cat_id" class="form-control" required>
                            <option>Select Any one</option>
                                @foreach($data4 as $list)
                                <option value="{{$list->id}}">{{$list->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error("sub_cat")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Rating</label>
                            <select name="ra" class="form-control" required>
                                <option>Select Any one</option>
                                @for($i=1;$i<=5;$i++)
                                <option  value="{{$i}}">{{$i}}</option>
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
                            <textarea id="short_desc" name="short_desc" type="text"  class="form-control" aria-required="true" aria-invalid="false" required></textarea>
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
                            <textarea id="long_desc" name="long_desc" type="text"  class="form-control" aria-required="true" aria-invalid="false" required></textarea>
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
                                <option value="1">Yes</option>
                                <option value="0">No</option></select>
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
                                <option value="{{$list->id}}">{{$list->Tax}}%</option>
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
        <h1>Product Attributes</h1>
        <div class="card" id="card">
            <div class="card-body" >
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">MRP</label>
                            <input id="cc-exp" name="mrp[]" type="text" class="form-control cc-exp" required>
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
                            <select name="size[]" class="form-control" require>
                                <option value="0">Select Any one</option>
                                @foreach($data as $list)
                                <option value="{{$list->id}}">{{$list->size}}</option>
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
                            <select name="color[]" class="form-control" required>
                            <option>Select Any one</option>
                                @foreach($data1 as $list)
                                <option value="{{$list->id}}">{{$list->color}}</option>
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
                            <input type="text" name="qty[]" class="form-control cc-exp" required> 
                        </div>
                        @error("qty[]")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-5">
                        <div class="form-group">
                            <label for="cc-exp" class="control-label mb-1">Image</label>
                            <input type="file" name="image[]" class="form-control cc-exp" required> 
                        </div>
                        @error("image")
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                        <label for="cc-exp" class="control-label mb-1"></label><br>
                            <button type="button" class="btn btn-success btn-lg" onclick="add_more()">+ ADD</button>
                        </div>
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
<script>
   
    var loop_count=1;
    function add_more(){
        loop_count++;
        var html='<div class="card-body" id="remove_'+loop_count+'"><hr><div class="row"><div class="col-4"><div class="form-group"><label for="cc-exp" class="control-label mb-1">MRP</label><input required id="cc-exp" name="mrp[]" type="text" class="form-control cc-exp"></div>@error("mrp")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div>';

        html+='<div class="col-4"><div class="form-group"><label for="cc-exp" class="control-label mb-1">SIZE</label><select required name="size[]" class="form-control"><option value="0">Select Any one</option>@foreach($data as $list)<option value="{{$list->id}}">{{$list->size}}</option>@endforeach</select></div>@error("size")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div>';


        html+='<div class="col-4"><div class="form-group"><label for="cc-exp" class="control-label mb-1">Color</label><select required name="color[]" class="form-control"><option>Select Any one</option>@foreach($data1 as $list)<option value="{{$list->id}}">{{$list->color}}</option>@endforeach</select></div>@error("color")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div></div>';
                
        
        html+='<div class="row"><div class="col-5"><div class="form-group"><label for="cc-exp" class="control-label mb-1">Qty</label><input type="text" name="qty[]" required class="form-control cc-exp"></div>@error("qty")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div>';
                    
        html+='<div class="col-5"><div class="form-group"><label for="cc-exp" class="control-label mb-1">Image</label><input required type="file" name="image[]" class="form-control cc-exp"></div>@error("image")<div class="alert alert-danger" role="alert">{{$message}}</div>@enderror</div><div class="col-2"><div class="form-group"><label for="cc-exp" class="control-label mb-1"></label><br><button type="button" class="btn btn-danger btn-lg" onclick="remove_attr('+loop_count+')">- Remove</button></div></div></div></div>';

        jQuery('#card').append(html);
        
    }

    function remove_attr(loop_count)
    {
        
        jQuery('#remove_'+loop_count).remove();
        
    }
</script>
@endsection