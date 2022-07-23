<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Tax;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function view(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $id=0;
        }
        else{
            $id=$request->session()->get('USER_ID');
        }
        $res['data']=DB::table('taxes')->where('u_id',$id)->get();
        return view('admin/tax',$res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_tax(Request $request)
    { 
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $id=0;
        }
        else{
            $id=$request->session()->get('USER_ID');
        }
        $request->validate([
            'tax'=>'required'
        ]);
        $size= new Tax();
        $size->tax=$request->post('tax');
        $size->u_id=$id;
        $size->created_at=date('Y-m-d h:i:s');
        $size->updated_at=date('Y-m-d h:i:s');

        $size->save();
        $request->session()->flash('message','Tax Add');
        return redirect('admin/tax');
    }

   
    public function edit(Request $request,$id)
    {
        $result['data']=Tax::find($id);
        //prx($result['data']['id']);
        return view('admin.forms.edit_tax',$result);
    }

    public function edit_tax(Request $request)
    {
        $request->validate([
            'tax'=>'required|numeric'
        ]);
        $id=$request->post('id');
        
        $res=Tax::find($id);
        $res->tax=$request->post('tax');
        $res->save();
        $request->session()->flash('message','Tax updated');
        return redirect('admin/tax');
    }    
}
