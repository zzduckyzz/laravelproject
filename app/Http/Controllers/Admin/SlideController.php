<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slide;
use Session;
class SlideController extends Controller
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
           $list=Slide::orderBy('id','ASC')
                   ->where(function ($query) use ($keyword){
                    $query->orwhere('title', 'like', "%$keyword%");
                                
                   })
                   ->paginate(5);
        } else {
           $list=Slide::orderBy( 'id', 'ASC' )
                   ->paginate(5);
        }
       
        return view('admin.slide.list', ['list'=>$list, 'keyword'=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
               'title' => 'required|min:3|max:100|unique:slides,title'
           
            ]);
        $slide = new Slide;
        $slide->title = $request->title;
        if($request->hasFile('images'))
        {
             $file= $request->file('images');
             $name = $file->getClientOriginalName();
               $images = str_random(4)."_".$name;
               while (file_exists("uploads/slidershow/".$images)) {
                   $images = str_random(4)."_".$name;
               }
               $file->move("uploads/slidershow",$images);
               $slide->image=$images;
        }
        $slide->link = $request->link;
        $slide->save();
        Session::flash('success', 'Thêm mới slide thành công !!!');

        return redirect('admin/slide');
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
        $slide =Slide::find($id);

        return view('admin.slide.edit', ['slide'=>$slide] );
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
         $slide =Slide::find($id);
         $this->validate($request,
            [
               'title' => 'required|min:3|max:100|unique:slides,title'
           
            ]);
       
        $slide->title = $request->title;
        if($request->hasFile('images'))
        {
             $file= $request->file('images');
             $name = $file->getClientOriginalName();
               $images = str_random(4)."_".$name;
               while (file_exists("uploads/slidershow/".$images)) {
                   $images = str_random(4)."_".$name;
               }
               unlink("uploads/slidershow/".$slide->image);
               $file->move("uploads/slidershow",$images);
               $slide->image=$images;
        }
        $slide->link = $request->link;
        $slide->save();
        Session::flash('success', 'Sửa  slide  "'.$slide->title.'" thành công !!!');

        return redirect('admin/slide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide =Slide::find($id);
        $slide->delete();
        Session::flash('success', 'Xóa  slide  "'.$slide->title.'" thành công !!!');

        return redirect('admin/slide');
    }
}
