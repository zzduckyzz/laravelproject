<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use Session;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = '';
        if($keyword=$request->search){
           $list=Category::orderBy('id','ASC')
                   ->where(function ($query) use ($keyword){
                    $query->orwhere('name','like',"%$keyword%");
                                
                   })
                   ->paginate(5);
        } else {
           $list=Category::orderBy( 'id', 'ASC' )
                   ->paginate(5);
        }
       
        return view('admin.category.list',['list'=>$list,'keyword'=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Thêm mới danh mục thành công ');

        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $this->validate($request, [
            'name'     => 'required',
        ]);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Cập nhật  danh mục "' .$category->name. '"  thành công ');

        return redirect('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Session::flash('success', 'Xóa  danh mục "' .$category->name. '"  thành công ');

        return redirect('admin/category');
    }
}
