<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class FrontController extends Controller
{
    public function index(Request $request)
    {
        $id=$request->session()->get('USER_id');
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$id)->select('product.name','add_to_cart.p_id as pid','pro_attr.*','add_to_cart.id','add_to_cart.qty as q','colors.color')->get();
        $res['brands']=DB::table('brands')->where('status',1)->get();
        $res['baner']=DB::table('baners')->where('status',1)->get();
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['product']=DB::table('product')->where('status',1)->get();
        $res['pro_attr']=DB::table('pro_attr')->where('status',1)->get();
        $res['color']=DB::table('colors')->where('status',1)->get();
        
        //prx($res['cart']);
        // foreach($res['cart'] as $list)
        // {
        //     $res['product1'][$list->id]=DB::table('product')->where('id',$list->p_id)->get();
        //     $res['pro_attr1'][$list->id]=DB::table('pro_attr')->where(['id'=>$list->pro_attr_id])->get();
        // }
       //prx($res['pro_attr1']);
        return view('front/index',$res);
    }

    public function registrashion_view(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$uid)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.qty as q','add_to_cart.p_id as pid','colors.color')->get();
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        return view('front/registration',$res);
    }

    public function user_register(Request $request)
    {
        $request->validate([
            'first_name'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'last_name'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'email'=>'required|email|unique:users,email',
            'password'=>['required']
        ]);
        $arr=[];
        $arr['first_name']=$request->post('first_name');
        $arr['last_name']=$request->post('last_name');
        $arr['email']=$request->post('email');
        $password=$request->post('password');
        $arr['password']=Hash::make($password);
        $arr['status']=1;
        $arr['email_verified_at']=0;
        $arr['created_at']=date('Y-m-d h:i:s');
        $arr['updated_at']=date('Y-m-d h:i:s');
        $name=$request->post('first_name').$request->post('last_name');
        $query=DB::table('users')->insertGetId($arr);
        if($query){
            $data=['name'=>$name,'rand_id'=>$query];
            $user['to']=$request->post('email');
            Mail::send('front/email_varificaton',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('Email id Varification ');
            });
            $request->session()->flash('message','Registration Successfully Pleace Check your Email id for Varification');
            return redirect('user_login');
        }

    }
    public function verification(Request $request,$id)
    {
        DB::table('users')->where('id',$id)->update(array('email_verified_at'=>1,));
        $request->session()->flash('message','your Email id is Varified');
        return redirect('user_login');
    }

    public function userlogin_view(Request $request)
    {
        $id=$request->session()->get('USER_id');
        $res['cart']=DB::table('add_to_cart')->where('u_id',$id)->get();
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        return view('front/login',$res);
    }
    public function user_login(Request $request)
    {
        
        $email=$request->post('email');
        $password=$request->post('password');
        $query=DB::table('users')->where('email',$email)->get();
        
        if(isset($query[0]))
        {
            if(Hash::check($password,$query[0]->password))
            {
                $request->session()->put('USER_LOGIN',true);
                $request->session()->put('USER_id',$query[0]->id);
                return redirect('/');
            }
            else{
                $request->session()->flash('message','PassWord is  Wrong !!');
                return redirect('user_login');
            }
        }
        else{
            $request->session()->flash('message','Both are Wrong !!');
            return redirect('user_login');
        }
    }
    public function forgot_password_view()
    {
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        return view('front/forgot_password',$res);
    }
    public function user_forgot_password(Request $request)
    {
        $email=$request->post('email');
        $query=DB::table('users')->where('email',$email)->get();
        if(isset($query[0]))
        {
            $data=['name'=>$query[0]->first_name,'rand_id'=>$query[0]->id];
            $user['to']=$request->post('email');
            Mail::send('front/forgot_password_email',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('Forgot Password');
            });
            $request->session()->flash('message','Check Your Email');
            return redirect('forget_password');
        }
        else{
            $request->session()->flash('message','Email is not Registed');
            return redirect('forget_password');
        }
    }
    public function forgotpassword_form_view(Request $request,$id)
    {
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['id']=$id;
        return view('front/forgot_password_form',$res);
    }

    public function user_new_password(Request $request)
    {
        $id=$request->post('id');
        $password=$request->post('password');
        $psw=Hash::make($password);
        DB::table('users')->where('id',$id)->update(array('password'=>$psw));
        $request->session()->flash('message','your Password is updated');
        return redirect('user_login');

    }

    public function profile_view(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$uid)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $id=$request->session()->get('USER_id');
        $res['user_address']=DB::table('user_address')->where('u_id',$id)->get();
        return view('front/Profile',$res);
    }

    public function address_form(Request $request)
    {
        
        $uid=$request->session()->get('USER_id');
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$uid)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        return view('front/add_address',$res);
    }

    public function add_address(Request $request)
    {
        $arr=[];
        $arr['name']=$request->post('name');
        $arr['address']=$request->post('address');
        $arr['city']=$request->post('city');
        $arr['pincode']=$request->post('pincode');
        $arr['u_id']=$request->session()->get('USER_id');

        DB::table('user_address')->insert($arr);
        return redirect('user/profile');
    }

    public function delete_addres(Request $request,$id)
    {
        DB::table('user_address')->where('id',$id)->delete();
        return redirect('user/profile');
    }
    public function edit_addres(Request $request,$id)
    {
        $res['add']=DB::table('user_address')->where('id',$id)->get();
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        return view('front/edit_address',$res);
    }
    public function edit_address(Request $request)
    {
        $name=$request->post('name');
        $address=$request->post('address');
        $city=$request->post('city');
        $pincode=$request->post('pincode');
        $id=$request->post('id');
        DB::table('user_address')->where('id',$id)->update(array('name'=>$name,'address'=>$address,'city'=>$city,'pincode'=>$pincode));
        return redirect('user/profile');
    }
    //quick view not supported
    public function quick_view(Request $request,$id)
    {
        $id = $_GET['id'];
        $res=DB::table('product')->where('id',$id)->get();
        //prx($res);
        //$pro_price=DB::table('pro_attr')->where('p_id',$id)->select('price');
        //prx($pro_price);
        foreach($res as $list)
        {
            $html='
            <div class="modal fade quick-view-popup" id="content_quickview">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="ProductSection-product-template" class="product-template__container prstyle1">
                            <div class="product-single">
                                <a href="javascript:void()" data-dismiss="modal" class="model-close-btn pull-right" title="close">
                                <span class="icon icon anm anm-times-l"></span>
                                </a>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="product-details-img">
                                            <div class="pl-20">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="product-single__meta">
                                            <h2 class="product-single__title">Product Quick View Popup</h2>
                                            <div class="prInfoRow">
                                                <div class="product-stock"> 
                                                    <span class="instock ">In Stock</span> 
                                                    <span class="outstock hide">Unavailable</span> 
                                                </div>
                                                <div class="product-sku">SKU: 
                                                    <span class="variant-sku">19115-rdxs</span>
                                                </div>
                                            </div>
                                                <p class="product-single__price product-single__price-product-template">
                                                    <span class="visually-hidden">Regular price</span><span id="ComparePrice-product-template">
                                                        <span class="money">$600.00</span>
                                                    </span>
                                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                                        <span id="ProductPrice-product-template">
                                                            <span class="money">$500.00</span>
                                                        </span>
                                                    </span>
                                                </p>
                                                <div class="product-single__description rte"> 
                                                     Belle    Multipurpose Bootstrap 4 Html Template that will give you and your customers a smooth shopping experience which can be used for various kinds of stores such as fashion,...
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ';
        }

        
        echo($html);
        die();
        return $html;
    }

    public function product_details(Request $request,$id)
    {
        $uid=$request->session()->get('USER_id');
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$uid)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.p_id as pid','add_to_cart.u_id','add_to_cart.pro_attr_id as pid1','add_to_cart.qty as q','colors.color')->get();
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['product']=DB::table('product')->where('id',$id)->where('status',1)->get();        
        $res['pro_attr']=DB::table('pro_attr')->where('p_id',$id)->get();
        //prx($res['product']);
        return view('front/product_details',$res);

    }
    public function add_to_cart(Request $request)
    {
        $arr=[];
        $arr['u_id']=$request->session()->get('USER_id');
        $arr['p_id']=$request->post('product_id');
        $arr['qty']=$request->post('qty');
        $arr['pro_attr_id']=$request->post('color_id');
        $result=DB::table('add_to_cart')->insert($arr);
        return response()->json(['data'=>$result]);
    }

    public function remove_add_to_cart(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        $id=$request->post('add_id');
        DB::table('add_to_cart')->where(['id'=>$id])->delete();
        $msg="success";
        $res=DB::table('add_to_cart')->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')->select('pro_attr.mrp','add_to_cart.*')->where(['u_id'=>$uid])->get();
        
        $mrp=0;
        foreach($res as $list)
        {
            $price=0;
            $price=$list->mrp*$list->qty;
            $mrp+=$price;
        }
        $total=count($res);
    
        return response()->json(['msg'=>$msg,'total'=>$total,'mrp'=>$mrp]);
    }

    public function minus_add_to_cart(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        $id=$request->post('minus_id');
        $qty=DB::table('add_to_cart')->where(['id'=>$id])->get();
        $p=DB::table('pro_attr')->where(['p_id'=>$qty[0]->p_id])->get();
        $qty=$qty[0]->qty-1;
        if($qty==0)
        {
            DB::table('add_to_cart')->where(['id'=>$id])->delete();
            $msg="success1";
          
            $res=DB::table('add_to_cart')->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')->select('pro_attr.mrp','add_to_cart.*')->where(['u_id'=>$uid])->get();
            
            $mrp=0;
            foreach($res as $list)
            {
                $price=0;
                $price=$list->mrp*$list->qty;
                $mrp+=$price;
            }
            $total=count($res);
            return response()->json(['msg'=>$msg,'mrp'=>$mrp,'total'=>$total]);
        }
        DB::table('add_to_cart')->where(['id'=>$id])->update(array('qty'=>$qty));
        $msg="success";
        $res=DB::table('add_to_cart')->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')->select('pro_attr.mrp','add_to_cart.*')->where(['u_id'=>$uid])->get();
        
        $mrp=0;
        foreach($res as $list)
        {
            $price=0;
            $price=$list->mrp*$list->qty;
            $mrp+=$price;
        }
        $price=$qty*$p[0]->mrp;
        return response()->json(['msg'=>$msg,'mrp'=>$mrp,'price'=>$price]);
    }
    public function plus_add_to_cart(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        $id=$request->post('plus_id');
        $qty=DB::table('add_to_cart')->where(['id'=>$id])->get();
        $p=DB::table('pro_attr')->where(['p_id'=>$qty[0]->p_id])->get();
        $qty=$qty[0]->qty+1;
        DB::table('add_to_cart')->where(['id'=>$id])->update(array('qty'=>$qty));
        $msg="success";
        $res=DB::table('add_to_cart')->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')->select('pro_attr.mrp','add_to_cart.*')->where(['u_id'=>$uid])->get();
        
        $mrp=0;
        foreach($res as $list)
        {
            $price=0;
            $price=$list->mrp*$list->qty;
            $mrp+=$price;
        }
        $price=$qty*$p[0]->mrp;
        return response()->json(['msg'=>$msg,'mrp'=>$mrp,'price'=>$price]);
    }

    public function add_add_to_cart(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        $res=DB::table('add_to_cart')->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')->select('pro_attr.mrp','add_to_cart.*')->where(['u_id'=>$uid])->get();
        //prx($res);
        $mrp=0;
        foreach($res as $list)
        {
          
            $price=0;
            $price=$list->mrp*$list->qty;
            $mrp+=$price;
        }
        $msg="success";
        $total=count($res);
        $pid=$request->post('add_add_id');
        $res1=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.p_id',$pid)->select('product.name','pro_attr.image','pro_attr.mrp as price','add_to_cart.id','add_to_cart.qty as q')->get();
        $add_to_cart_id=$res1[0]->id;
        $image=$res1[0]->image;
        $name=$res1[0]->name;
        $qty=$res1[0]->q;
        $price=$res1[0]->price;
        return response()->json(['msg'=>$msg,'total'=>$total,'mrp'=>$mrp,'id'=>$add_to_cart_id,'image'=>$image,'name'=>$name,'qty'=>$qty,'price'=>$price]);
    }

    public function cart(Request $request)
    {
        $res['tax_value']=DB::table('taxes')->get();
        $uid=$request->session()->get('USER_id');
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$uid)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.p_id as pid','add_to_cart.u_id','add_to_cart.qty as q','colors.color')->get();
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
       
        //prx($res['product']);
        return view('front/cart',$res);
    }

    public function clear_cart(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        DB::table('add_to_cart')->where('u_id',$uid)->delete();
        return redirect('user/cart');
    }

    public function coupon_code(Request $request)
    {
        $coupon=$request->post('coupon_code');
        $res1=DB::table('coupons')->where('coupon_name',$coupon)->get();
        if(isset($res1[0]))
        {
            $uid=$request->session()->get('USER_id');
           
            $res=DB::table('add_to_cart')->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')->select('pro_attr.mrp','add_to_cart.*')->where(['u_id'=>$uid])->get();
            
            $mrp=0;
            foreach($res as $list)
            {
                $price=0;
                $price=$list->mrp*$list->qty;
                $mrp+=$price;
            }
            $mrp=$mrp-$res1[0]->value;
            if($mrp<1)
            {
                $msg="error";
                return response()->json(['msg'=>$msg]);
            }
            $tax_value=DB::table('taxes')->get();
            $tax=($mrp*$tax_value[0]->Tax)/100;
            $gt=$tax+$mrp;
            $msg="success";
            $request->session()->put('COUPON_CODE',$res1[0]->value);
            return response()->json(['msg'=>$msg,'mrp'=>$mrp,'tax'=>$tax,'grand_total'=>$gt]);
        }
        else
        {
            $msg="fail";
            return response()->json(['msg'=>$msg]);
        }

    }
    public function checkout(Request $request)
    {
        $res['tax_value']=DB::table('taxes')->get();
        $uid=$request->session()->get('USER_id');
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$uid)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.p_id as pid','add_to_cart.u_id','add_to_cart.qty as q','colors.color')->get();
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $id=$request->session()->get('USER_id');
        $res['user_address']=DB::table('user_address')->where('u_id',$id)->get();
        //prx($res['product']);
        return view('front/checkout',$res);
    }

    public function place_order(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        $user=DB::table('users')->where('id',$uid)->get();
        $coupon=$request->post('coupon_code');
        $address=$request->post('address');
        $res=DB::table('add_to_cart')->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')->select('pro_attr.mrp','add_to_cart.*')->where(['u_id'=>$uid])->get();
      
        //prx($res);
        $mrp=0;
        foreach($res as $list)
        {
          
            $price=0;
            $price=$list->mrp*$list->qty;
            $mrp+=$price;
        }
        $tax_value=DB::table('taxes')->get();
        $add=DB::table('add_to_cart')->where('u_id',$uid)->get();
        $mrp-=$coupon;
        $tax=($mrp*$tax_value[0]->Tax)/100;
        $mrp+=$tax;
        $un=$user[0]->first_name;
        $email=$user[0]->email;
        $mobile='1234567895';


        

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("key",
                        "Token"));
        $payload = Array(
            'purpose' => 'Buy Product',
            'amount' => $mrp,
            'phone' => $mobile,
            'buyer_name' => $un,
            'redirect_url' => 'http://127.0.0.1:8000/thankyou',
            'send_email' => true,
            'send_sms' => true,
            'email' => $email,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        $response=json_decode($response);
        if(isset($response->payment_request->id)){
            $txn_id=$response->payment_request->id;
            foreach($add as $list)
            {
                $arr=[];
                $arr['u_id']=$uid;
                $arr['p_id']=$list->p_id;
                $arr['product_attr_id']=$list->pro_attr_id;
                $arr['qty']=$list->qty;
                $arr['user_address_id']=$address;
                $arr['coupon_code_value']=$coupon;
                $arr['status']="Not success";
                $arr['payment_request_id']=$txn_id;
                $arr['date']=date("Y-m-d");
                DB::table('orders')->insert($arr);
            }

            DB::table('add_to_cart')
            ->where(['u_id'=>$uid])
            ->delete();
            $payment_url=$response->payment_request->longurl;
            session()->forget('COUPON_CODE');
            return redirect($payment_url);
            
           // return view('front/thankyou');
        }else{
            $msg="";
            foreach($response->message as $key=>$val){
                $msg.=$key.":".$val[0].'<br>';
            }
            return response()->json(['status'=>'error','msg'=>$msg,'payment_url'=>'']);
        }
        
    }
    public function thankyou(Request $request)
    {
        $id=$request->session()->get('USER_id');
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$id)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.u_id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
       
       
        if($_GET['payment_status']=="Credit")
        {
            $status="Success";
        }
        else
        {
            $status="Not Success";
        }
        DB::table('orders')->where('payment_request_id',$_GET['payment_request_id'])->update(array('status'=>$status,"payment_id"=>$_GET['payment_id']));
        $re=DB::table('orders')->where('payment_request_id',$_GET['payment_request_id'])->get();
        foreach($re as $list)
        {
            $p_arr=$list->product_attr_id;
            $qty=DB::table('pro_attr')->where('id',$p_arr)->get();
            $tqty=$qty[0]->qty-$list->qty;
            $qty=DB::table('pro_attr')->update(array('qty'=>$tqty));

        }
        return view('front/thankyou',$res);
    }

    public function blog(Request $request)
    {
        $id=$request->session()->get('USER_id');
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$id)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.u_id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        return view('front/blog',$res);
    }

    public function wishlist(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        $p_id=$request->post('wishilist_id');
        $arr=[];
        $arr['u_id']=$uid;
        $arr['p_id']=$p_id;
        DB::table('wishilist')->insert($arr);
        return response()->json(['status'=>'success']);
    }

    public function view_wishilist(Request $request)
    {
        $id=$request->session()->get('USER_id');
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$id)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.u_id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        $res['wishilist']=DB::table('wishilist')->leftJoin('product','product.id','=','wishilist.p_id')->where(['wishilist.u_id'=>$id])->select('product.*','wishilist.id as wid')->get();
        return view('front/wishlist',$res);
    }

    public function removewishlist(Request $request)
    {
        $uid=$request->session()->get('USER_id');
        $p_id=$request->post('removewishlist');
        DB::table('wishilist')->where('u_id',$uid)->where('p_id',$p_id)->delete();
        return response()->json(['status'=>'success']);
    }

    public function ordered(Request $request)
    {
        $id=$request->session()->get('USER_id');
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$id)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.u_id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        $oreder=DB::table('orders')->leftjoin('pro_attr','pro_attr.id','=','orders.product_attr_id')->select('orders.id','pro_attr.mrp','orders.p_id','orders.product_attr_id','orders.qty','orders.payment_request_id','orders.date')->where(['u_id'=>$id])->get();
        $res['groupde']=$oreder->groupBy('date');
        //prx($res['groupde']);
        return view('front/oredred',$res);
    }

    public function order_view(Request $request,$oid)
    {
        $id=$request->session()->get('USER_id');
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$id)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.u_id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        $payment_id=DB::table('orders')->where('id',$oid)->get('payment_request_id');
        
        $res['oreders']=DB::table('orders')->leftJoin('pro_attr','pro_attr.id','=','orders.product_attr_id')->leftJoin('product','product.id','=','orders.p_id')->select('orders.qty','product.name','pro_attr.mrp','pro_attr.image')->where(['payment_request_id'=>$payment_id[0]->payment_request_id])->get();
        //prx($res['oreders']);
        return view('front/ordered_view',$res);
    }
    public function vendoer_login(Request $request)
    {
        $id=$request->session()->get('USER_id');
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$id)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.u_id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        return view('front/vendore/login',$res);
    }

    public function vendoer_reigistrashion(Request $request)
    {
        $id=$request->session()->get('USER_id');
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$id)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.u_id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        return view('front/vendore/registration',$res);
    }

    public function vendor_regi(Request $request)
    {
        $em=$request->post('email');
        $re=DB::table('users')->where('email',$em)->get();
        if($re[0]->id>0)
        {
           
            $id=$request->session()->get('USER_id');
            $r=DB::table('vendore_details')->where('u_id',$id)->get();
            if(isset($r[0]->id))
            {
                $request->session()->flash('message','You Have account. Pleace login!');
                return redirect('vendoer_login');
            }
            $arr=[];
            $arr['u_id']=$id;
            $password=$request->post('password');
            $arr['password']=Hash::make($password);
            $arr['business_name']=$request->post('business_name');
            $arr['GST_NO']=$request->post('GST_NO');
            $arr['athara_cart_no']=$request->post('NO');
            $arr['status']=1;
            $res=DB::table('vendore_details')->insert($arr);
            $request->session()->flash('message','Registrashion is successfull Waiting for Admin Approval!!');
            return redirect('vendoer_login');
        }
        else
        {
            $request->session()->flash('message','Email is Not valid');
            return redirect('vendoer_reigistrashion');
        }
    }

    public function vendor_login1(Request $request)
    {
        $em=$request->post('email');
        $res=DB::table('users')->where('email',$em)->get();
        if($res[0]->id>0)
        {
            $id=$request->session()->get('USER_id');
            $query=DB::table('vendore_details')->where('u_id',$id)->get();
            if($query[0]->status==1)
            {
                $pass=$request->post('password');
                if(Hash::check($pass,$query[0]->password))
                {
                    $request->session()->put('VENDOR_LOGIN',true);
                    $request->session()->put('VENDOR_NAME',$res[0]->first_name);
                    $request->session()->put('VENDOR_ID',$query[0]->id);
                    return redirect('vendor_index');
                }
                else{
                    $request->session()->flash('message','PassWord is  Wrong !!');
                    return redirect('vendoer_login');
                }
            }
            else{
                $request->session()->flash('message','Your Account Is not Activ By Admin');
                return redirect('vendoer_login');
            }
        }
        else
        {
            $request->session()->flash('message','Pleace Enter Correct Login Details!!');
            return redirect('vendoer_login');
        }
    }

    public function vendor_index(Request $request)
    {
        return view('front/vendore/index');
    }

    public function category(Request $request,$id)
    {
        $uid=$request->session()->get('USER_id');
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$uid)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.u_id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        $res['data']=DB::table('product')->where('cate_id',$id)->get();
        $res['product']=DB::table('product')->where('status',1)->where('cate_id',$id)->get();
        $res['pro_attr']=DB::table('pro_attr')->where('status',1)->get();
        $res['color']=DB::table('colors')->where('status',1)->get();
        return view('front/category',$res);
    }

    public function sub_category(Request $request,$id)
    {
        $uid=$request->session()->get('USER_id');
        $res['category']=DB::table('categories')->where('status',1)->get();
        $res['sub_category']=DB::table('sub_categories')->where('status',1)->get();
        $res['cart']=DB::table('add_to_cart')
        ->leftJoin('product','product.id','=','add_to_cart.p_id')
        ->leftJoin('pro_attr','pro_attr.id','=','add_to_cart.pro_attr_id')
        ->leftJoin('colors','colors.id','=','pro_attr.color_id')->where('add_to_cart.u_id',$uid)->select('product.name','pro_attr.*','add_to_cart.id','add_to_cart.u_id','add_to_cart.p_id as pid','add_to_cart.qty as q','colors.color')->get();
        
        $res['product']=DB::table('product')->where('status',1)->where('sub_id',$id)->get();
        $res['pro_attr']=DB::table('pro_attr')->where('status',1)->get();
        $res['color']=DB::table('colors')->where('status',1)->get();
        return view('front/category',$res);
    }
    public function test(Request $request)
    {
        $qty=DB::table('add_to_cart')->where(['id'=>35])->get('qty');
        prx($qty[0]->qty);
    }
}
