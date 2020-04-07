<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\User;
use App\Order;
use App\Contact;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Product;
use Cart;
use App\OrderDetail;

class OrderController extends Controller
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
           $list=Order::orderBy('id','DESC')
                   ->where(function ($query) use ($keyword){
                    $query->orwhere('fullname', 'like', "%$keyword%")
                          ->orwhere('created_at', 'like', "%$keyword%");
                                
                   })
                   ->paginate(5);
        } else {
           $list=Order::orderBy( 'id', 'ASC' )
                   ->paginate(5);
        }
       
        return view('admin.order.list', ['list'=>$list,'keyword'=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = OrderDetail::where('order_id', $id)->paginate(10);

        return view('admin.order.show', ['list'=>$list]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
    {
        $order = Order::find($id);

        return view('admin.order.edit', ['order'=> $order] );
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
         $order = Order::find($id);
         $order->status = $request->status;
         $order->save();
         Session::flash('success',
                        'Cập nhật hóa đơn "'.$order->created_at.'"  thành công');
 
         return redirect('admin/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function Dashboard()
    {
        $list = Order::orderBy('created_at', 'DESC')->take(10)->get();
        
        $contact = Contact::count();
        $order1 = Order::count();
        $sum = Order::sum('total_price');
        $user = User::count();
        $product = Product::count();

       
        $now=Carbon::now();
        
        $co =Order::where('created_at','>=',$now->toDateString()." ".'00:00:00')
        ->where('created_at','<=',$now->toDateString()." ".'23:59:59')->count(); 

        $ytd=Carbon::yesterday();

        $ytd11= $ytd->toDateString();
        $co1 =Order::where('created_at','>=',$ytd->toDateString()." ".'00:00:00')
        ->where('created_at','<=',$ytd->toDateString()." ".'23:59:59')->count(); 

        $ytd1=$ytd->subDays(1);
        $ytd12 = $ytd1->toDateString();
        $co2=Order::where('created_at','>=',$ytd1->toDateString()." ".'00:00:00')
         ->where('created_at','<=',$ytd1->toDateString()." ".'23:59:59')->count(); 
           
        $ytd2=$ytd1->subDays(1);
        $ytd13 =$ytd2->toDateString();
        $co3=Order::where('created_at','>=',$ytd2->toDateString()." ".'00:00:00')
        ->where('created_at','<=',$ytd2->toDateString()." ".'23:59:59')->count(); 
     
        $ytd3=$ytd2->subDays(1);
        $ytd14=$ytd3->toDateString();
        $co4=Order::where('created_at','>=',$ytd3->toDateString()." ".'00:00:00')
        ->where('created_at','<=',$ytd3->toDateString()." ".'23:59:59')->count(); 
             
        $ytd4=$ytd3->subDays(1);
        $ytd15=$ytd4->toDateString();
        $co5=Order::where('created_at','>=',$ytd4->toDateString()." ".'00:00:00')
        ->where('created_at','<=',$ytd4->toDateString()." ".'23:59:59')->count(); 
        $ytd5=$ytd4->subDays(1);
        $ytd16=$ytd5->toDateString();
        $co6=Order::where('created_at','>=',$ytd5->toDateString()." ".'00:00:00')
         ->where('created_at','<=',$ytd5->toDateString()." ".'23:59:59')->count(); 
             
        return view('admin.dashboard.home', [ 'list'=>$list , 'contact'=>$contact, 'order1'=>$order1, 'product'=>$product, 'sum'=>$sum, 'now'=>$now, 'co'=>$co , 'ytd11'=>$ytd11, 'co1'=>$co1 , 'ytd12'=>$ytd12 , 'co2'=>$co2 , 'ytd13'=>$ytd13, 'co3'=>$co3, 'ytd14'=>$ytd14, 'co4'=>$co4, 'ytd15'=>$ytd15, 
            'co5'=> $co5 , 'ytd16'=>$ytd16, 'co6'=>$co6, 'user'=>$user]);
    }
}
