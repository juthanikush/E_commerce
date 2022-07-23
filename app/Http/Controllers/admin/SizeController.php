<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $res['data']=size::all();
        return view('admin/size',$res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_size(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $id=0;
        }
        else{
            $id=$request->session()->get('USER_ID');
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
        return redirect('admin/size');
    }

    public function delete(Request $request,$id)
    {
        $res=size::find($id);
        $res->delete();
        $request->session()->flash('message','Size Delete');
        return redirect('admin/size');
    }
    
    public function status(Request $request,$id,$status)
    {
        
        $res=size::find($id);
        $res->status=$status;
        $res->save();
        return redirect('admin/size');
    }

    public function edit(Request $request,$id)
    {
        $result['data']=size::find($id);
        //prx($result['data']['id']);
        return view('admin.forms.edit_size',$result);
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
        return redirect('admin/size');
    }
}
