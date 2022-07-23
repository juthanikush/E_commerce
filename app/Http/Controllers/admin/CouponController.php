<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    
    public function view()
    {
        $res['data']=Coupon::all();
        return view('admin/coupon',$res);
    }

    
    public function add_coupon(Request $request)
    {
       
        $request->validate([
            'coupon_name'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'price'=>'required|numeric'
        ]);
        $coupon= new Coupon();
        $coupon->coupon_name=$request->post('coupon_name');
        $coupon->value=$request->post('price');
        $coupon->status=1;
        $coupon->created_at=date('Y-m-d h:i:s');
        $coupon->updated_at=date('Y-m-d h:i:s');
        $coupon->save();
        $request->session()->flash('message','Coupon Add');
        return redirect('admin/coupon');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $res=Coupon::find($id);
        $res->delete();
        $request->session()->flash('message','Coupon Delete');
        return redirect('admin/coupon');
    }
    
    public function status(Request $request,$id,$status)
    {
        
        $res=Coupon::find($id);
        $res->status=$status;
        $res->save();
        return redirect('admin/coupon');
    }

    public function edit(Request $request,$id)
    {
        $result['data']=Coupon::find($id);
        //prx($result['data']['id']);
        return view('admin.forms.edit_coupon',$result);
    }

    public function edit_coupon(Request $request)
    {
        $request->validate([
            'coupon_name'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'price'=>'requirednumeric'
        ]);
        $id=$request->post('id');
        $res=Coupon::find($id);
        $res->coupon_name=$request->post('coupon_name');
        $res->value=$request->post('price');
        $res->save();
        $request->session()->flash('message','Coupon updated');
        return redirect('admin/coupon');
    }
}
