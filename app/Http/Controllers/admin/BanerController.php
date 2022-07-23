<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Baner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
class BanerController extends Controller
{
    public function view()
    {
        $res['data']=Baner::all();
        return view('admin/baner',$res);
    }

    public function add_baner(Request $request)
    {
        $request->validate([
            'image'=>'required',
        ]);
        $rand=rand(11111,99999);
        $image=$request->file('image');
        $ext=$image->extension();
        $image_name=$rand.'.'.$ext;
        $image->storeAs('/public/media/baner',$image_name);


        $Baner= new Baner();
        $Baner->image=$image_name;
        $Baner->btn_txt=$request->post('btn_txt');
        $Baner->btn_link=$request->post('btn_link');
        $Baner->heading=$request->post('heading');
        $Baner->status=1;
        $Baner->created_at=date('Y-m-d h:i:s');
        $Baner->updated_at=date('Y-m-d h:i:s');
        $Baner->save();
        $request->session()->flash('message','Baner Add');
        return redirect('admin/baner');
    }

    public function delete(Request $request,$id)
    {
        $res=Baner::find($id);
        if($id>0)
        {
            $arrImage=DB::table('baners')->where(['id'=>$id])->get();
            if(Storage::exists('/public/media/baner/'.$arrImage[0]->image) ){
                Storage::delete('/public/media/baner/'.$arrImage[0]->image);
            }
        }
        $res->delete();
        $request->session()->flash('message','Baner Delete');
        return redirect('admin/baner');
    }
    
    public function status(Request $request,$id,$status)
    {
        
        $res=Baner::find($id);
        $res->status=$status;
        $res->save();
        return redirect('admin/baner');
    }

    public function edit(Request $request,$id)
    {
        $result['data']=Baner::find($id);
        //prx($result['data']['id']);
        return view('admin.forms.edit_baner',$result);
    }

    public function edit_baner(Request $request)
    {
            
        

        
        $id=$request->post('id');
        $Baner=Baner::find($id);
        if($request->hasfile('image'))
        {

            if($request->post('id')>0)
            {
                $arrImage=DB::table('baners')->where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/media/baner/'.$arrImage[0]->image) ){
                    Storage::delete('/public/media/baner/'.$arrImage[0]->image);
                }
            }


            $rand=rand(11111,99999);
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=$rand.'.'.$ext;
            $image->storeAs('/public/media/baner',$image_name);
            $Baner->image=$image_name;
        }
       
        
        
        
       
        $Baner->btn_txt=$request->post('btn_txt');
        $Baner->btn_link=$request->post('btn_link');
        $Baner->heading=$request->post('heading');
        $Baner->save();
        $request->session()->flash('message','Baner updated');
        return redirect('admin/baner');
    }
}
