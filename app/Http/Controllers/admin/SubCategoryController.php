<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\admin\sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        
        $result['data']=DB::table('sub_categories')
        ->leftjoin('categories','categories.id','=','sub_categories.category_id')
        ->select('sub_categories.*','categories.category_name')
        ->get();
        return view('admin/sub_category',$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_sub_category(Request $request)
    {
        $result['data']=DB::table('categories')->get();
        return view('admin/forms/add_sub_category',$result);
    }

    public function add_sub_category(Request $request)
    {
        $request->validate([
            "sub_category_name"=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            "category_id"=>'required'
        ]);
        $res=new sub_category();
        $res->sub_category_name=$request->post('sub_category_name');
        $res->category_id=$request->post('category_id');
        $res->status=1;
        $res->created_at=date('Y-m-d h:i:s');
        $res->updated_at=date('Y-m-d h:i:s');
        $res->save();
        $request->session()->flash('message','Sub Category Add');
        return redirect('admin/sub_category');
    }

    public function delete(Request $request,$id)
    {
        $res=sub_category::find($id);
        $res->delete();
        $res=DB::table('product')->where('sub_id',$id)->delete();
        $request->session()->flash('message','Sub Category Delete');
        return redirect('admin/sub_category');
    }

    public function status(Request $request,$id,$status)
    {
        DB::table('sub_categories')
        ->where(['id'=>$id])
        ->update(['status'=>$status]);
        return redirect('admin/sub_category');
    }

    public function edit(Request $request,$id)
    {
        $result['data']=DB::table('categories')->get();
        $result['data1']=sub_category::find($id);
        return view('admin.forms.edit_sub_category',$result);
    }
    public function edit_sub_category(Request $request)
    {
        $request->validate([
            "sub_category_name"=>['required', 'regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/'],
            "category_id"=>'required'
        ]);
        $id=$request->post('id');
        $res=sub_category::find($id);
        $res->sub_category_name=$request->post('sub_category_name');
        $res->category_id=$request->post('category_id');
        $res->save();
        $request->session()->flash('message','Sub Category updated');
        return redirect('admin/sub_category');
    }
}
