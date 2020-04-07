<?php

namespace App\Http\Controllers\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Category;
use App\Typewood;
use App\News;
use App\Slide;
use App\Product;
use App\Comment;
use App\Contact;
use Cart;
use Hash;
use App\User;
use App\Image;
use App\Order;
use App\OrderDetail;
use App\Customer;
use Session;
class CartController extends Controller
{
    function __construct(Request $request)
	{  
		$product = Product::orderBy('created_at', 'desc')->take(24)->get();
        $rmitem = Product::where('type', '1')->get();
	    $category = Category::get();
	    $typewood= Typewood::get();
	    $news = News::orderBy('created_at', 'ASC')->take(5)->get();
	    $slide = Slide::all();
	    $keyword = '';
        // $list_news = News::paginate(4);   
	    view()->share(['product'=>$product, 'rmitem'=>$rmitem, 'category'=>$category, 'typewood'=>$typewood,
	     'news'=> $news, 'slide'=>$slide, 'keyword'=>$keyword ]);
        if(Auth::check()) {
        view()->share('nguoidung',Auth::user());
        }
	}
   
   public function addcart($id)
   {
      $productCart = Product::where('id', $id)->first();

      Cart::add(['id'=>$id, 'name'=>$productCart->name, 'qty'=>1, 'price'=>$productCart->price,
       'options'=>[ 'img'=>$productCart->images ] ]);
      $content = Cart::content();

      return redirect('trangchu');

   }

   public function cart() 
   {
   	  $content = Cart::content();
      $subtotal = Cart::subtotal();

      return view('client.pages.cart', ['content'=>$content, 'subtotal'=>$subtotal ] );
   }

   public function deletecart($id) 
   {
   	 Cart::remove($id);
   	 Session::flash('success', 'Xóa sản phẩm thành công');

   	 return redirect('giohang');
   }
   public function destroycart()
   {
     Cart::destroy();
     Session::flash('success', 'Huỷ giỏ hàng của bạn thành công');

     return redirect('giohang');
   }

   public function updatecart(Request $request, $id) 
   {
     if($request->qty >= 1) {
        foreach (Cart::content() as $item) {
        	if($item->id == $id) {
                  Cart::update($item->rowId, ['qty'=>$request->qty]);
                  break;
        	}
        	
        }
         Session::flash('success', 'Cập nhật số lượng hàng thành công.');
        } else {
            Session::flash('warning', 'Số lượng hàng phải lớn hơn 1.');
     }

     return redirect('giohang'); 
    }
}


