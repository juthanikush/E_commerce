<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function view()
    {
        $res['user']=DB::table('users')->get();
        /*$res['user1']=$res['user']->groupBy('payment_request_id');
        prx($res['user1']);*/
        return view('admin/order',$res);
    }

    public function total_order_of_user(Request $request,$id)
    {
       
        $oreder=DB::table('orders')->leftjoin('pro_attr','pro_attr.id','=','orders.product_attr_id')->select('orders.id','pro_attr.mrp','orders.p_id','orders.product_attr_id','orders.qty','orders.payment_request_id','orders.date')->where(['u_id'=>$id])->get();
        $res['groupde']=$oreder->groupBy('date');
        //prx($res['groupde']);
        return view('admin/order_view',$res);
    }
   
    public function order_view(Request $request,$oid)
    {
        $payment_id=DB::table('orders')->where('id',$oid)->get('payment_request_id');
        
        $res['oreders']=DB::table('orders')->leftJoin('pro_attr','pro_attr.id','=','orders.product_attr_id')->leftJoin('product','product.id','=','orders.p_id')->select('orders.qty','product.name','pro_attr.mrp','pro_attr.image')->where(['payment_request_id'=>$payment_id[0]->payment_request_id])->get();
        return view('admin/order_detail_view',$res);
    }
}
