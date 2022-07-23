<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendoerManageMentControler extends Controller
{
    public function view(Request $request)
    {
        $res['data']=DB::table('users')->rightjoin('vendore_details','vendore_details.u_id','=','users.id')->get();
        return view('admin/vandero_management_view',$res);
    }
    public function vendor_details(Request $request,$id)
    {
        $res['data']=DB::table('vendore_details')->where('u_id',$id)->get();
        return view('admin/vandero_management',$res);
    }
    
    public function details(Request $request,$id)
    {
        $res['data']=DB::table('product')->where('u_id',$id)->get();
        $res['uid']=$id;
        
        return view('admin/vendor_product_view',$res);
    }
    public function status(Request $request,$id,$uid,$status)
    {
        
        $p_id=$request->session()->get('VENDOR_ID');
        DB::table('product')
        ->where(['id'=>$id])
        ->update(['status'=>$status]);
        $request->session()->flash('message','product Status Update');
        
        return redirect()->route('details', ['id' => $uid]);
    }
    public function vendor_attr(Request $request,$id)
    {
        $res['data']=DB::table('pro_attr')->where('id',$id)->get();
        $res['uid']=$id;
        
        return view('admin/pro_attr_vendor',$res);
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
}
