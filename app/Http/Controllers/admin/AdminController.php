<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\admin\Cookie;
class AdminController extends Controller
{

    public function create_admin(Request $request)
    {
        $res=DB::table('admin_login')->get();
        //prx($res);
        if(isset($res[0]))
        {
            return view('admin.login');
        }else{
            return view('admin.create_admin');
        }
    }

    public function login(Request $request)
    {
        return view('admin.login');
    }
    public function auth(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'username'=>'required',
            'password'=>'required',
            'sc_code'=>'required'
        ]);
        $email=$request->post('email');
        $username=$request->post('username');
        $password=$request->post('password');
        $security_code=$request->post('sc_code');
        $pwd=Hash::make($password);
        $sc_code=Hash::make($security_code);
        DB::table('admin_login')->insert(array('username'=>$username,'password'=>$pwd,'email'=>$email,'security_code'=>$sc_code));
        return redirect('login');
    }
    public function admin_login(Request $request)
    {
        //prx($request->post('remember'));
        $un=$request->post('username');
        $pwd=$request->post('password');
        $res=DB::table('admin_login')->where('username',$un)->get();
        //prx($res[0]->password);
        if(isset($res[0]))
        {
            if(Hash::check($pwd,$res[0]->password))
            {
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$res[0]->id);
                if($request->post('remember')=='on')
                {
                    $request->session()->put('username',$un,500);
                    $request->session()->put('password',$pwd,500);
                    
                }
                
                return redirect('admin');
            }
            else
            {
                $request->session()->flash('message','Password is Wrong');
                return redirect('login');
            }
        }
        else
        {
            $request->session()->flash('message','Username or Password is wrong');
            return redirect('login');
        }
    }
    public function forpass(Request $request)
    {
        $request->validate([
            'email'=>'required|email'
        ]);
        $email=$request->post('email');
        $sc=$request->post('sc_code');
        $em=DB::table('admin_login')->where('email',$email)->get();
        //prx($em);
        if(isset($em[0]))
        {
            if(Hash::check($sc,$em[0]->security_code))
            {
                $request->session()->flash('message','Check your Email');
                $data=['rand_id'=>$em[0]->id];
                $user['to']=$email;
                Mail::send('admin/forgot_email',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Forgot Password');
                });
                return redirect('admin/forpass');
            }
            else
            {
                $request->session()->flash('message','Security Code is Wrong');
                return redirect('admin/forpass');
            }
        }
        else
        {
            $request->session()->flash('message','Both are Wrong !!');
            return redirect('admin/forpass');
        }
    }
    public function new_pass(Request $request)
    {
        $id=$request->post('id');
        $pas=$request->post('password');
        $pwd=Hash::make($pas);
        DB::table('admin_login')->where('id',$id)->update(['password'=>$pwd]);
        $request->session()->flash('message','Password is changed');
        return redirect('login');
    }
    public function forgot_password_change(Request $request,$id)
    {
        $request->session()->put('FORGOT_PASSWORD_USER_ID',$id);
        return view('admin/new_password');
    }
}
