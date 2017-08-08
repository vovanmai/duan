<?php

namespace App\Http\Controllers\shopsmp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use Session;
use Illuminate\Support\Facades\DB;
use Cart;
use App\Model\Order;
use App\Model\Order_Detail;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    public function getStep1(){
        if(!Auth::check()){
            return redirect()->route('auth.register');
        }
    	return view('shopsmp.order.step1');
    }
    public function postStep1(OrderRequest $request){
    	Session::put('result',$request->toArray());
    	return redirect()->route('shopsmp.order.step2');
    }
    public function getStep2(){
    	if(Session::has('result')){
    		 $result = (object)Session::get('result');
    		 
    	}else{
    		return redirect()->route('shopsmp.index.index');
    	}
    	return view('shopsmp.order.step2',['result'=>$result]);
    }
    public function store(Request $request){
        $result=(object)Session::get('result');
        if(Auth::check()){
            $username=Auth::user()->username;
        }
        $arOrder = array(
            'username' => $username, 
            'useraddress' => $result->address, 
            'userphone' => $result->phone, 
            'fullname' => $result->name, 
            'useremail' => $result->email,
            'payment_id'=>1, 
            'moreinfo' => $result->detail,
            'status' =>0,
            'price_total' =>intval(str_replace(',','',Cart::subtotal())),
            );
        $order=Order::insert($arOrder);
        if($order){
            $request->session()->flash('popupmsg','Your Order is sent, we will contact with you later !');
            $idmax=DB::table('orders')->max('id');
            Session::forget('result');
            foreach(Cart::content() as $item){
                $arOrder_Detail = array(
                    'product_id' => $item->id,
                    'order_id'   => $idmax,
                    'quantity'   => $item->qty
                    );
                Order_Detail::insert($arOrder_Detail);
            }
            Cart::destroy(); 
            return redirect()->route('shopsmp.index.index');
        }else{
            $request->session()->flash('popupmsg','Your Order is sent, we will contact with you later !');
            return redirect()->route('shopsmp.index.index');
        }
    }
}
