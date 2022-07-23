<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\admin\Tax;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class VendorTaxController extends Controller
{
    public function view(Request $request)
    {
    
        $id=$request->session()->get('VENDOR_ID');
        
        $res['data']=DB::Table('taxes')->where('u_id',$id)->get();
        return view('front/vendore/tax',$res);
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
            $id=$request->session()->get('VENDOR_ID');
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
        return redirect('vendor/tax');
    }

   
    public function edit(Request $request,$id)
    {
        $result['data']=Tax::find($id);
        //prx($result['data']['id']);
        return view('front.vendore.forms.edit_tax',$result);
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
        return redirect('vendor/tax');
    }    
}
