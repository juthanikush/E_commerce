<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class BrandController extends Controller
{
    public function view()
    {
        $res['data']=brand::all();
        return view('admin/brands',$res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_brands(Request $request)
    {
        $request->validate([
            'image'=>'required'
        ]);
        $rand=rand(11111,99999);
        $image=$request->file('image');
        $ext=$image->extension();
        $image_name=$rand.'.'.$ext;
        $image->storeAs('/public/media/brand',$image_name);
        $size= new brand();
        $size->image=$image_name;
        $size->status=1;
        $size->created_at=date('Y-m-d h:i:s');
        $size->updated_at=date('Y-m-d h:i:s');
        $size->save();
        $request->session()->flash('message','Brand Add');
        return redirect('admin/brands');
    }

    public function delete(Request $request,$id)
    {

        $res=brand::find($id);
        if($id>0)
        {
            $arrImage=DB::table('brands')->where(['id'=>$id])->get();
            if(Storage::exists('/public/media/brand/'.$arrImage[0]->image) ){
                Storage::delete('/public/media/brand/'.$arrImage[0]->image);
            }
        }
        $res->delete();
        $request->session()->flash('message','Brands Delete');
        return redirect('admin/brands');
    }
    
    public function status(Request $request,$id,$status)
    {
        
        $res=brand::find($id);
        $res->status=$status;
        $res->save();
        return redirect('admin/brands');
    }

    public function edit(Request $request,$id)
    {
        $result['data']=brand::find($id);
        //prx($result['data']['id']);
        return view('admin.forms.edit_brand',$result);
    }

    public function edit_brand(Request $request)
    {
        $request->validate([
            'image'=>'required'
        ]);
        $id=$request->post('id');
        if($request->post('id')>0)
        {
            $arrImage=DB::table('brands')->where(['id'=>$request->post('id')])->get();
            if(Storage::exists('/public/media/brand/'.$arrImage[0]->image) ){
                Storage::delete('/public/media/brand/'.$arrImage[0]->image);
            }
        }
        $rand=rand(11111,99999);
        $image=$request->file('image');
        $ext=$image->extension();
        $image_name=$rand.'.'.$ext;
        $image->storeAs('/public/media/brand',$image_name);
        
        $res=brand::find($id);
        $res->image=$image_name;
        $res->save();
        $request->session()->flash('message','Brand updated');
        return redirect('admin/brands');
    }
}
