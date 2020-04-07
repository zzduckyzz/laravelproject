<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Typewood;

class TypewoodController extends Controller
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
           $list=Typewood::orderBy('id','ASC')
                   ->where(function ($query) use ($keyword){
                    $query->orwhere('name','like',"%$keyword%");
                                
                   })
                   ->paginate(5);
        } else {
           $list=Typewood::orderBy( 'id', 'ASC' )
                   ->paginate(5);
        }
       
        return view('admin.typewood.list', ['list'=>$list,'keyword'=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.typewood.create');
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
        $typewood = new Typewood;
        $typewood->name = $request->name;
        $typewood->save();
        Session::flash('success', 'Thêm mới loại gỗ thành công ');

        return redirect('admin/typewood');
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
        $typewood = Typewood::find($id);

        return view('admin.typewood.edit', ['typewood' => $typewood]);
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
        $typewood = Typewood::find($id);
        $this->validate($request, [
            'name'     => 'required',
        ]);
        $typewood->name = $request->name;
        $typewood->save();
        Session::flash('success', 'Cập nhật loại gỗ "' .$typewood->name. '"  thành công ');

        return redirect('admin/typewood');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typewood = Typewood::find($id);
        $typewood->delete();

        Session::flash('success', 'Xóa  loại gỗ "' .$typewood->name. '"  thành công ');

        return redirect('admin/typewood');
    }
}
