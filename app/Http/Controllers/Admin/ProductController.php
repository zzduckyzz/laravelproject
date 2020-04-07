<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Session;
use App\Category;
use App\Typewood;
use App\Comment;

class ProductController extends Controller
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
           $list=Product::orderBy('id','ASC')
                   ->where(function ($query) use ($keyword){
                    $query->orwhere('name', 'like', "%$keyword%")
                          ->orwhere('price', 'like', "%$keyword%");
                                
                   })
                   ->paginate(5);
        } else {
           $list=Product::orderBy( 'id', 'ASC' )
                   ->paginate(5);
        }
       
        return view('admin.product.list', ['list'=>$list,'keyword'=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category  = Category::pluck('name', 'id');
       $typewood  = Typewood::pluck('name', 'id');

       return view('admin.product.create', ['category'=>$category,
                                           'typewood'=>$typewood]);
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
               'name' => 'required|min:3|max:100|unique:product,name',
               'price'=>'required',
               'category'=>'required',
               'typewood'=>'required',
               'quantity'=>'required'
            ]);
         $product = new Product;
         $product->name= $request->name;
         $product->price= $request->price;
           if($request->hasFile('images')) {
                   $file = $request->file('images');
                   $lastfile= $file->getClientOriginalExtension();
                   if($lastfile !='jpg' && $lastfile !='png' && $lastfile !='jpeg')
                   {
                      Session::flash('error' , 'Bạn chỉ được nhập file ảnh jpg,png,jpeg');
                      redirect('admin/product');
                   }
                   $name = $file->getClientOriginalName();
                   $images= str_random(4)."_".$name;
                   while (file_exists("uploads/product/".$images)) {
                     $images= str_random(4)."_".$name;
                   }
                   $file->move("uploads/product",$images);
                   $product->images=$images;
            } else {   
              $product->images="";
            }
         $product->category_id =$request->category;
         $product->Type_of_wood_id =$request->typewood;
         $product->description = $request->description;
         $product->quantity =$request->quantity;
         $product->hot_product = $request->hot;
         $product->save();
         Session::flash('success' , 'Thêm mới sản phẩm thành công ');

         return redirect('admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        $comment = Comment::where('id_product', $id)
                 ->first();  

        return view('admin.product.show',
                    ['product' =>$product, 'comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::pluck('name', 'id');
        $typewood = Typewood::pluck('name', 'id');


        return view('admin.product.edit' ,['product'=>$product, 
                    'category'=>$category, 'typewood'=> $typewood]);
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
         $product =Product::find($id);
         $this->validate($request,
            [
               'name' => 'required|min:3|max:100|',
               'price'=>'required',
               'category'=>'required',
               'typewood'=>'required',
               'quantity'=>'required'
            ]);
        
         $product->name= $request->name;
         $product->price= $request->price;
           if($request->hasFile('images')) {
                   $file = $request->file('images');
                   $lastfile= $file->getClientOriginalExtension();
                   if($lastfile !='jpg' && $lastfile !='png' && $lastfile !='jpeg')
                   {
                      Session::flash('error' , 'Bạn chỉ được nhập file ảnh jpg,png,jpeg');
                      redirect('admin/product');
                   }
                   $name = $file->getClientOriginalName();
                   $images= str_random(4)."_".$name;
                   while (file_exists("uploads/product/".$images)) {
                     $images= str_random(4)."_".$name;
                   }
                   //unlink("uploads/product/".$product->images);
                   $file->move("uploads/product",$images);
                   $product->images=$images;
            }
         $product->category_id =$request->category;
         $product->Type_of_wood_id =$request->typewood;
         $product->description = $request->description;
         $product->quantity =$request->quantity;
         $product->hot_product = $request->hot;
         $product->save();
         Session::flash('success' , 
                        'Cập nhật sản phẩm "'.$product->name.'" thành công ');

         return redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Session::flash('success', 'Xóa sản phẩm  "'.$product->name.'"  thành công ');
 
        return redirect('admin/product');
    }
}
