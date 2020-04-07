<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Product;
use Session;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Image::paginate(5);

        return view('admin.image.list', ['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::pluck('name', 'id');

        return view('admin.image.create', ['product'=>$product]);
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
               'images' => 'required',
               'product' =>'required'
            ]);
        $image = new Image;
       
        if($request->hasFile('images'))
        {
             $file= $request->file('images');
             $name = $file->getClientOriginalName();
               $images = str_random(4)."_".$name;
               while (file_exists("uploads/product/".$images)) {
                   $hinh = str_random(4)."_".$name;
               }
               $file->move("uploads/product",$images);
                $image->images=$images;
        }
        $image->id_product = $request->product;
        $image->save();
         Session::flash('success' , 'Thêm mới hình ảnh  sản phẩm thành công ');

         return redirect('admin/image');
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
       $product = Product::pluck('name', 'id');
       $image = Image::find($id);

       return view('admin.image.edit' ,['image'=>$image, 'product'=>$product]);
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
        $image = Image::find($id);
         $this->validate($request,
            [
               'images' => 'required',
               'product' =>'required'
            ]);
       
       
        if($request->hasFile('images'))
        {
             $file= $request->file('images');
             $name = $file->getClientOriginalName();
               $images = str_random(4)."_".$name;
               while (file_exists("uploads/product/".$images)) {
                   $hinh = str_random(4)."_".$name;
               }
                //unlink("uploads/product/".$image->images);
                $file->move("uploads/product",$images);
                $image->images=$images;
        }
        $image->id_product = $request->product;
        $image->save();
         Session::flash('success' , 
                        'Sửa  hình ảnh cho  sản phẩm "'.$image->product->name.'"thành công ');

         return redirect('admin/image');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
          Session::flash('success' , 
                        'Xóa  hình ảnh của  sản phẩm "'.$image->product->name.'"thành công ');

        return redirect('admin/image');  
    }
}
