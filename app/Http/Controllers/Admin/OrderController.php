<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Order_Detail;
class OrderController extends Controller
{
    public function index(){
    	$arOrder=Order::orderBy('id','DESC')->paginate(5);
    	return view('admin.order.index',['arOrder'=>$arOrder]);
    }
    public function changestatus(Request $request){
    	if($request->ajax()){
    		$id=$request->get('id');
    		$arOrder=Order::find($id);
    		if($arOrder->status==0){
    			$arOrder->status=1;
    			$arOrder->update();
    			return '<img src="'.url("resources/assets/templates/admin/assets/images/active.gif").'" />';
    		}else{
    			$arOrder->status=0;
    			$arOrder->update();
    			return '<img src="'.url("resources/assets/templates/admin/assets/images/deactive.gif").'" />';
    		}
    		
    	}
 
    }
    public function show($id){
        $arOrder=Order::find($id);
        $arJoin=DB::table('products')
                ->join('order_details','products.id','=','order_details.product_id')
                ->where('order_id','=',$id)
                ->select('products.*','order_details.*')->get();
    	return view('admin.order.show',['arOrder'=>$arOrder,'arJoin'=>$arJoin]);
    }
    public function destroy(Request $request){
        if($request->ajax()){
            $id=$request->get('id');
            $arOrder_Detail=Order_Detail::where('order_id','=',$id)->get();
             foreach($arOrder_Detail as $item){
                $item->delete();
             }
            $arOrder=Order::find($id);
            $arOrder->delete();
            return "OK";
        }
    }
 
}
