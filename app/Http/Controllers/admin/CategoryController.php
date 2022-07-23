<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $result['data']=category::all();
        return view('admin/index',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_category(Request $request)
    {
        $request->validate([
            'category_name'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'category_sluge'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
        ]);
        $category= new category();
        $category->category_name=$request->post('category_name');
        $category->category_slug=$request->post('category_sluge');
        $category->status=1;
        $category->created_at=date('Y-m-d h:i:s');
        $category->updated_at=date('Y-m-d h:i:s');

        $category->save();
        $request->session()->flash('message','Category Add');
        return redirect('admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request,$id)
    {
        $res=category ::find($id);
        $res->delete();
        $request->session()->flash('message','Category Delete');
        return redirect('admin');
    }

    public function status(Request $request,$id,$status)
    {
        
        $res=category::find($id);
        $res->status=$status;
        $res->save();
        return redirect('admin');
    }

    public function edit(Request $request,$id)
    {
        $result['data']=category::find($id);
        //prx($result['data']['id']);
        return view('admin.forms.edit_category',$result);
    }

    public function edit_category(Request $request)
    {
        $request->validate([
            'category_name'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            'category_sluge'=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/']
        ]);
        $id=$request->post('id');
        $res=category::find($id);
        $res->category_name=$request->post('category_name');
        $res->category_slug=$request->post('category_sluge');
        $res->save();
        $request->session()->flash('message','Category updated');
        return redirect('admin');
    }
}
