<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function view(Request $request)
    {
        $res['data']=DB::table('users')->get();
        return view('admin/user',$res);
    }

    public function address(Request $request,$id)
    {
        $res['data']=DB::table('user_address')->where('u_id',$id)->get();
        return view('admin/addres',$res);
    }

    public function delete(Request $request,$id)
    {
        DB::table('users')->where('id',$id)->delete();
        DB::table('user_address')->where('u_id',$id)->delete();
        $request->session()->flash('message','User Delete');
        return redirect('admin/user');
    }

    public function status(Request $request,$id,$status)
    {
        DB::table('users')
        ->where(['id'=>$id])
        ->update(['status'=>$status]);
        $request->session()->flash('message','Status Updated');
        return redirect('admin/user');
    }

}
