<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function view()
    {
        $res['data']=Color::all();
        return view('admin/color',$res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_color(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN'))
        {
            $id=0;
        }
        else{
            $id=$request->session()->get('USER_ID');
        }
        $request->validate([
            'color'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
        ]);
        $size= new Color();
        $size->color=$request->post('color');
        $size->status=1;
        $size->u_id=$id;
        $size->created_at=date('Y-m-d h:i:s');
        $size->updated_at=date('Y-m-d h:i:s');

        $size->save();
        $request->session()->flash('message','Color Add');
        return redirect('admin/color');
    }

    public function delete(Request $request,$id)
    {
        $res=Color::find($id);
        $res->delete();
        $request->session()->flash('message','Color Delete');
        return redirect('admin/color');
    }
    
    public function status(Request $request,$id,$status)
    {
        
        $res=Color::find($id);
        $res->status=$status;
        $res->save();
        return redirect('admin/color');
    }

    public function edit(Request $request,$id)
    {
        $result['data']=Color::find($id);
        //prx($result['data']['id']);
        return view('admin.forms.edit_color',$result);
    }

    public function edit_color(Request $request)
    {
        $request->validate([
            'color'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
        ]);
        $id=$request->post('id');
        
        $res=Color::find($id);
        $res->color=$request->post('color');
        $res->save();
        $request->session()->flash('message','Color updated');
        return redirect('admin/color');
    }
}
