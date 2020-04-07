<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\News;

class NewController extends Controller
{
   
    public function index(Request $request)
    {
         $keyword = '';
        if($keyword=$request->search){
           $list=News::orderBy('id','ASC')
                   ->where(function ($query) use ($keyword){
                    $query->orwhere('title', 'like', "%$keyword%");
                                
                   })
                   ->paginate(5);
        } else {
           $list=News::orderBy( 'id', 'ASC' )
                   ->paginate(5);
        }
       
        return view('admin.new.list', ['list'=>$list,'keyword'=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.new.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new News;
        $this->validate($request,
            [
               'title'=>'required|min:6|max:300|unique:news,title',
               'content'=>'required',
               'description' => 'required'
            ]);
          $new->title= $request->title;
          $new->description = $request->description;
          $new->content=$request->content;
           if($request->hasFile('images'))
           {
              $file = $request->file('images');
              $name = $file->getClientOriginalName();
              $images = str_random(4)."_".$name;
              $file->move("uploads/news",$images);
              $new->images= $images;
           } 
           else
           {
             $new->images= "";
           }
          $new->hot_news=$request->hot_news;
          $new->save();
          Session::flash('success', 'Thêm mới tin tức thành công !!');

          return redirect('admin/new');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::find($id);

        return view('admin.new.show', ['new'=>$new] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::find($id);

        return view('admin.new.edit', ['new'=>$new]);
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
        $new = News::find($id);
        $this->validate($request,
            [
               'title'=>'required|min:6|max:300|',
               'content'=>'required',
               'description' => 'required'
            ]);
          $new->title= $request->title;
          $new->description = $request->description;
          $new->content=$request->content;
           if($request->hasFile('images'))
           {
              $file = $request->file('images');
              $name = $file->getClientOriginalName();
              $images = str_random(4)."_".$name;
              //unlink("uploads/news/".$new->images);
              $file->move("uploads/news",$images);
              $new->images= $images;
           }
          $new->hot_news=$request->hot_news;
          $new->save();
          Session::flash('success', 'Sửa  tin tức "'.$new->title.'" thành công !!');

          return redirect('admin/new');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::find($id);
        $new->delete();
        Session::flash('success', 'Xóa  tin tức "'.$new->title.'" thành công !!');

       return redirect('admin/new');
    }
}
