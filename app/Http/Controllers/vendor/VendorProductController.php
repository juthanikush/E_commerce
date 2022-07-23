<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\DB;
class VendorProductController extends Controller
{
    public function view(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $id=0;
        }
        else{
            $id=$request->session()->get('VENDOR_ID');
        }
        $res1=DB::table('colors')->where('u_id',$id)->get();
        $res2=DB::table('taxes')->where('u_id',$id)->get();
        //prx();
        if(isset($res2[0]->id))
        {
            if(isset($res1[0]->id))
            {
                $res['data']=DB::table('product')->where('u_id',$id)->get();
                return view('front/vendore/products',$res);
            }
            else
            {
                $request->session()->flash('message','Place Add Color first!');
                return redirect('vendor/color');
            }
        }else{
            $request->session()->flash('message','Place Add Tax first!');
            return redirect('vendor/tax');
        }
        
    }

    public function add_product_view(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $id=0;
        }
        else{
            $id=$request->session()->get('VENDOR_ID');
        }
        $res['data']=DB::table('sizes')->where('u_id',$id)->get();
        $res['data1']=DB::table('colors')->where('u_id',$id)->get();
        $res['data3']=DB::table('taxes')->where('u_id',$id)->get();
        $res['data2']=DB::table('sub_categories')->get();
        $res['data4']=DB::table('categories')->get();
        return view('front.vendore.forms.add_product',$res);
    }

    public function add_product(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $id=0;
        }
        else{
            $id=$request->session()->get('VENDOR_ID');
        }
        $request->validate([
            'short_desc'=>['required'],
            'long_desc'=>['required'],
            'name'=>['required'],
            'ra'=>['required'],
            'is_fe'=>['required'],
            'tax'=>['required'],
            'mrp'=>['required'],
            'size'=>['required'],
            'color'=>['required'],
            'qty'=>['required'],
            'image.*'=>"mimes:jpg,jpeg,png"
        ]);
        $rand=rand('111111111','999999999');
            $attr_image=$request->file("main_image");
            $ext=$attr_image->extension();
            $image_name=$rand.'.'.$ext;
            $request->file("main_image")->storeAs('/public/media/product',$image_name);

        $arr=[];
        $arr['name']=$request->post('name');
        $arr['main_image']=$image_name;
        $arr['sub_id']=$request->post('sub_cat');
        $arr['cate_id']=$request->post('cat_id');
        $arr['short_desc']=$request->post('short_desc');
        $arr['long_desc']=$request->post('long_desc');
        $arr['isfechaer']=$request->post('is_fe');
        $arr['tax_id']=$request->post('tax');
        $arr['u_id']=$id;
        $arr['rating']=$request->post('ra');
        $arr['status']=1;

        $p_id=DB::table('product')->insertGetId($arr);
        
        $count=$request->post('qty');
        //prx($count);
        foreach($count as $key=>$val)
        {

            $rand=rand('111111111','999999999');
            $attr_image=$request->file("image.$key");
            $ext=$attr_image->extension();
            $image_name=$rand.'.'.$ext;
            $request->file("image.$key")->storeAs('/public/media/product',$image_name);

            $arr=[];
            $arr['p_id']=$p_id;
            $arr['mrp']=$request->post('mrp')[$key];
            $arr['size_id']=$request->post('size')[$key];
            $arr['color_id']=$request->post('color')[$key];
            $arr['qty']=$request->post('qty')[$key];
            $arr['image']=$image_name;
            $arr['status']=1;

            DB::table('pro_attr')->insert($arr);
        }
        return redirect('vendor/product');
    }

    public function delete(Request $request,$id)
    {
        $arrImage=DB::table('pro_attr')->where(['p_id'=>$id])->get();
        if(isset($arrImage[0]))
        {
            if(Storage::exists('/public/media/product/'.$arrImage[0]->image) ){
                Storage::delete('/public/media/product/'.$arrImage[0]->image);
            }
        }
        $arrImage=DB::table('product')->where(['id'=>$id])->get();
        if(Storage::exists('/public/media/product/'.$arrImage[0]->main_image) ){
            Storage::delete('/public/media/product/'.$arrImage[0]->main_image);
        }
        DB::table('product')->where('id',$id)->delete();
        DB::table('pro_attr')->where('p_id',$id)->delete();
        $request->session()->flash('message','Product Delete');
        return redirect('vendor/product');
    }

    public function edit(Request $request,$id)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $u_id=0;
        }
        else{
            $u_id=$request->session()->get('VENDOR_ID');
        }
        
        $res['data3']=DB::table('taxes')->where('u_id',$u_id)->get();
        $res['data2']=DB::table('sub_categories')->get();
        $res['da']=DB::table('product')->where('id',$id)->get();
        return view('front/vendore/forms/edit_product',$res);
    }

    public function edit_save(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $id=0;
        }
        else{
            $id=$request->session()->get('VENDOR_ID');
        }
        $request->validate([
            'short_desc'=>['required'],
            'long_desc'=>['required'],
            'name'=>['required'],
            'sub_cat'=>['required'],
            'ra'=>['required'],
            'is_fe'=>['required'],
            'tax'=>['required']
        ]);
        $arr=[];
        $arr['name']=$request->post('name');
        $arr['sub_id']=$request->post('sub_cat');
        $arr['short_desc']=$request->post('short_desc');
        $arr['long_desc']=$request->post('long_desc');
        $arr['isfechaer']=$request->post('is_fe');
        $arr['tax_id']=$request->post('tax');
        $arr['u_id']=$id;
        $arr['rating']=$request->post('ra');
        

        if($request->hasfile('main_image')){
            
            $arrImage=DB::table('product')->where(['id'=>$request->post('id')])->get();
            
            if(Storage::exists('/public/media/product/'.$arrImage[0]->main_image) ){
                Storage::delete('/public/media/product/'.$arrImage[0]->main_image);
            }
            
            $rand=rand('111111111','999999999');
            $attr_image=$request->file("main_image");
            $ext=$attr_image->extension();
            $image_name=$rand.'.'.$ext;
            $request->file("main_image")->storeAs('/public/media/product',$image_name);
            $arr['main_image']=$image_name;
        }
        DB::table('product')->where('id',$request->post('id'))->update($arr);
        $request->session()->flash('message','Product Update');
        
        return redirect('vendor/product');

    }

    public function status(Request $request,$id,$status)
    {
        DB::table('product')
        ->where(['id'=>$id])
        ->update(['status'=>$status]);
        $request->session()->flash('message','product Status Update');
        return redirect('vendor/product');
    }

    public function edit_attr(Request $request,$id)
    {
        $id=$id;
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $u_id=0;
        }
        else{
            $u_id=$request->session()->get('VENDOR_ID');
        }
        $res['data2']=DB::table('pro_attr')->where('id',$id)->get();
        $res['data']=DB::table('sizes')->where('u_id',$u_id)->get();
        $res['data1']=DB::table('colors')->where('u_id',$u_id)->get();
        return view('front/vendore/forms/edit_pro_attr',$res);
    }
    public function pro_attr(Request $request,$id)
    {
        $res['data']=DB::table('pro_attr')->where('p_id',$id)->get();
        return view('front/vendore/pro_attr',$res);
    }

    public function delete_attr(Request $request,$id)
    {   
        $p_id=DB::table('pro_attr')->where('id',$id)->get();
       
        $arrImage=DB::table('pro_attr')->where(['id'=>$id])->get();
        
        if(Storage::exists('/public/media/product/'.$arrImage[0]->image) ){
            Storage::delete('/public/media/product/'.$arrImage[0]->image);
        }
        DB::table('pro_attr')->where('id',$id)->delete();
        $request->session()->flash('message','Product Attribute Delete');
        return redirect()->route('pro_attr', ['id' => $p_id[0]->p_id]);
    }

    public function status_attr(Request $request,$id,$status)
    {
        $p_id=DB::table('pro_attr')->where('id',$id)->get();
        
        DB::table('pro_attr')
        ->where(['id'=>$id])
        ->update(['status'=>$status]);
        $request->session()->flash('message','Product Attribute Status Update');
        return redirect()->route('pro_attr', ['id' => $p_id[0]->p_id]);

    }

    public function edit_attr_save(Request $request)
    {
        $p_id=$request->post('p_id');
        $id=$request->post('id');
        $request->validate([
            'mrp'=>['required'],
            'size'=>['required'],
            'color'=>['required'],
            'qty'=>['required']
        ]);
            $arr=[];
            
            $arr['mrp']=$request->post('mrp');
            $arr['size_id']=$request->post('size');
            $arr['color_id']=$request->post('color');
            $arr['qty']=$request->post('qty');
           
        if($request->hasfile('image')){
            
            $arrImage=DB::table('pro_attr')->where(['id'=>$request->post('id')])->get();
            if(Storage::exists('/public/media/product/'.$arrImage[0]->image) ){
                Storage::delete('/public/media/product/'.$arrImage[0]->image);
            }
            
            $rand=rand('111111111','999999999');
            $attr_image=$request->file("image");
            $ext=$attr_image->extension();
            $image_name=$rand.'.'.$ext;
            $request->file("image")->storeAs('/public/media/product',$image_name);
            $arr['image']=$image_name;
        }
        DB::table('pro_attr')->where('id',$id)->update($arr);
        return redirect()->route('pro_attr', ['id' => $p_id]);
    }
}
