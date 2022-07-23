<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\admin\size;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class VendorSizeController extends Controller
{
    public function index(Request $request)
    {
        $id=$request->session()->get('VENDOR_ID');
        
        $res['data']=DB::Table('sizes')->where('u_id',$id)->get();
        return view('front/vendore/size',$res);
    }
    public function add_size(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $id=0;
        }
        else{
            $id=$request->session()->get('VENDOR_ID');
        }
        $request->validate([
            'size'=>['required']
        ]);
        $size= new size();
        $size->size=$request->post('size');
        $size->status=1;
        $size->u_id=$id;
        $size->created_at=date('Y-m-d h:i:s');
        $size->updated_at=date('Y-m-d h:i:s');

        $size->save();
        $request->session()->flash('message','Size Add');
        return redirect('vendor/size');
    }

    public function delete(Request $request,$id)
    {
        $res=size::find($id);
        $res->delete();
        $request->session()->flash('message','Size Delete');
        return redirect('vendor/size');
    }
    
    public function status(Request $request,$id,$status)
    {
        
        $res=size::find($id);
        $res->status=$status;
        $res->save();
        return redirect('vendor/size');
    }

    public function edit(Request $request,$id)
    {
        $result['data']=size::find($id);
        //prx($result['data']['id']);
        return view('front.vendore.forms.edit_size',$result);
    }

    public function edit_size(Request $request)
    {
        $request->validate([
            'size'=>['required']
        ]);
        $id=$request->post('id');
        
        $res=size::find($id);
        $res->size=$request->post('size');
        $res->save();
        $request->session()->flash('message','size updated');
        return redirect('vendor/size');
    }
}
