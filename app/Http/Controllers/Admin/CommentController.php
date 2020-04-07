<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Product;
class CommentController extends Controller
{
    public function postcomment(Request $request,$id)
    {
      $id_product=$id;
      $product=Product::find($id);
      $comment = new Comment;
      $comment->id_product=$id_product;
      $comment->id_user= Auth::user()->id;
      $comment->content = $request->content;
      $comment->save();
      return redirect("chitietsanpham/$id".$product->name.".html");
    }
}
