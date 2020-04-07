<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Typewood;
use App\News;
use App\Slide;
use App\Product;
use App\Comment;
use App\Contact;
use Hash;
use Cart;
use App\User;
use App\Image;
use App\Order;
use App\OrderDetail;
use App\Customer;
use Session;
class ClientController extends Controller
{
    function __construct(Request $request)
	{  
	  	$product = Product::orderBy('created_at', 'desc')->take(6)->get();
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

   public function home(Request $request)
   {  
        $keyword = '';
        if($request->has('keyword')) {
           $keyword=$request->get('keyword');
           $product=Product::orderBy('created_at', 'desc')
                   ->where(function ($query) use ($keyword){
                    $query->orwhere('name', 'like', "%$keyword%")
                          ->orwhere('price', 'like', "%$keyword%");      
                   })
                   ->paginate(5);
        } else {
           $product=Product::orderBy( 'created_at', 'desc' )->take(6)
                   ->get();
        }

    return view('client.pages.home', ['product'=>$product, 'keyword'=>$keyword]);
   }

   public function category($id) 
   {
   	$cate = Category::find($id);
    $category1 = Product::where('category_id', $id)->paginate(6);

    return view('client.pages.category', [ 'category1'=>$category1, 'cate'=>$cate ]);
   }

   public function typewood($id) 
   {
   	$type = Typewood::find($id); 
   	$typewood1 = Product::where('type_of_wood_id', $id)->paginate(6);

    return view('client.pages.typewood', [ 'typewood1'=>$typewood1, 'type'=>$type ]);
   }

   public function productdetail(Request $request, $id) 
   {
   	   $rmitem = Product::where('type', '1')->get();
       $product1 = Product::find($id); 
       $product2 = Product::where('category_id', $product1->category_id)
                                 ->where('id', '<>', $id)->orderBy('created_at', 'desc')
                                 ->take(4)->get();
       $comment =Comment::where('id_product','=',$id)->get();
       $image    = Image::where('id_product', $id)
                  ->orderBy('created_at', 'desc')->take(3)->get();

       return view('client.pages.productdetail', [ 'product1'=> $product1, 
     	         'product2'=>$product2 , 'image'=>$image, 'rmitem'=>$rmitem, 'comment'=>$comment ] );
   }

   
   public function news()
   {
   	  $new = News::orderBy('created_at', 'DESC')->paginate(3);

   	  return view('client.pages.news', [ 'new'=>$new ]);
   }

   public function detailnew($id)
   {
   	  $detailnew = News::find($id);

   	  return view('client.pages.detailnew', [ 'detailnew'=>$detailnew  ]);
   }

   public function getcontact()
   {
   	 return view('client.pages.contact');
   }
   public function postcontact(Request $request)
   {
     $contact = new Contact;
        $this->validate($request,
          [
           'name' =>'required',
           'phone_number' =>'required|min:10|max:11|unique:contact,phone_number',
           'email' =>'required',
           'address' =>'required',
           'content' =>'required',
          ]);
      $contact->fullname=$request->name;
      $contact->phone_number=$request->phone_number;
      $contact->email=$request->email;
      $contact->address=$request->address;
      $contact->content=$request->content;
      $contact->save();
      Session::flash('success', 
                    'Bạn đã liên hệ thành công chúng tôi sẽ sớm phản hồi liên hệ của bạn. Xin Cảm ơn ');

      return redirect('lienhe');;
   }

   public function getlogin()
   {
   	  return view('client.pages.login');
   }
   public function postlogin(Request $request)
   {
   	  $this->validate($request,
            [
              'email' =>'required|min:4|max:32',
              'password'=>'required|min:4|max:32'
            ]);
         if (Auth::attempt(['email'=>$request->email ,'password'=>$request->password, 'is_active'=>0 ])) {
                 return redirect('trangchu'); 
         }
         elseif ( ['is_active'=>1] ) {

             Session::flash('error', 'Tai khoản của bạn đã bị khóa hãy gửi mail đến admin@gmail.com để mở tài khoản  !!!');
              return redirect('dangnhap');
         }
         else
         {
           Session::flash('error', 'Đăng nhập không thành công!!!!!!');

           return redirect('dangnhap');
         }
   }

   public function getlogout()
   {
   	   Auth::logout();

   	   return redirect('dangnhap');
   }

   public function getregister()
   {
   	  return view('client.pages.register');
   }

   public function postregister(Request $request)
   {
      $this->validate($request, [
            'name'     => 'required',
            'address' => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|same:password_confirmation',
            'birthday' => 'required',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone =  $request->phone;
        $user->address =  $request->address;
        $user->gender =  $request->gender;
        $user->birthday =  $request->birthday; 
        $user->level =  0;
        $user->save();
        Session::flash('success', 'Bạn đã đăng ký tài khoản thành công thành công ');
        
        return redirect('trangchu');
   }

   public function getuser() 
   {
   	  $user = Auth::user();

   	  return view('client.pages.user',  [ 'user'=>$user ]);
   }

   public function postuser(Request $request)
   {
   	    $user = Auth::user();
        $this->validate($request, [
            'name'     => 'required',
            'address' => 'required',
            'email'    => 'required|email|'
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->checkpassword == "on") {
             $this->validate($request, [
            'password' => 'same:password_confirmation'
             ]);
             $user->password = Hash::make($request->password) ;
          
        } 
        $user->phone =  $request->phone;
        $user->address =  $request->address;
        $user->gender =  $request->gender;
        $user->birthday =  $request->birthday; 
        $user->level =  0;
        $user->save();
        Session::flash('success', 'Cập nhật người dùng  "'.$user->name.'" Thành công');

        return redirect('nguoidung');
   }
   public function getorder()
   {
    return view('client.pages.cart');
   }
   
   public function postorder(Request $request)
   {
      
      $content = Cart::content();

      if( Auth::user() ) {
         $order = new Order();
         $order->id_user = Auth::user()->id;
         $order->save();

         $total = 0;
         $content = Cart::content();
         foreach ($content as $index => $item) {
           $orderDetail = new OrderDetail();
           $orderDetail->order_id = $order->id;
           $orderDetail->product_id = $item->id;
           $orderDetail->quantity = $item->qty;
           $orderDetail->price = $item->price;
           $orderDetail->total_price = $item->price * $item->qty;
           $orderDetail->save();

           $total += $item->price * $item->qty;
         }
        $order->total_price = $total; 
        $order->save();
      } else {
       
        $this->validate($request, [
              'fullname' =>'required',
              'phone_number' =>'required|min:10|max:11|unique:order,phone_number',
              'address' =>'required',
          ]);
        $order = new Order();
        $order->fullname = $request->fullname;
        $order->email = $request->email;
        $order->phone = $request->phone_number;
        $order->address = $request->address;
        $order->save();

        $total = 0;
         $content = Cart::content();
         foreach ($content as $index => $item) {
           $orderDetail = new OrderDetail();
           $orderDetail->order_id = $order->id;
           $orderDetail->product_id = $item->id;
           $orderDetail->quantity = $item->qty;
           $orderDetail->price = $item->price;
           $orderDetail->total_price = $item->price * $item->qty;
           $orderDetail->save();

           $total += $item->price * $item->qty;
         }
        $order->total_price = $total; 
        $order->save();  
      }
      Cart::destroy();
      Session::flash('success', 'Bạn đã đặt hàng thành công , Chúng tôi sẽ sớm giao hàng cho bạn. Cảm ơn bạn.');

      return redirect('giohang');
   }

   public function check($id)
   {
       $order = Order::where('id_user', $id)->get();
     
       return view('client.pages.check', [ 'order'=> $order ]);
   }

  public function checkout($id)
   {
       $orderdetail = OrderDetail::where('order_id', $id)->get();

       return view('client.pages.checkout', [ 'orderdetail' => $orderdetail]);
   }
}
