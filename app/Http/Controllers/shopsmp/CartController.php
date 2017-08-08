<?php

namespace App\Http\Controllers\shopsmp;
use Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
class CartController extends Controller
{
	public function index(){
		$content=Cart::content();
		$count=Cart::count();
		$total=Cart::subtotal();
		return view('shopsmp.order.cart',['content'=>$content,'total'=>$total,'count'=>$count]);
	}
    public function buying(Request $request){
        if($request->ajax()){
            $id=$request->get('id');
            $arProduct=Product::find($id);
            if($arProduct->discount>0){
            $newprice=($arProduct->price*(100-$arProduct->discount))/100;

            }else{
             $newprice=$arProduct->price;
            }
            Cart::add(array('id'=>$id,'name'=>$arProduct->pname,'qty'=>1,'price'=>$newprice,'options'=>array('picture' =>$arProduct->picture,'discount'=>$arProduct->discount)));
            $count=Cart::count();
            return $count;
        }
    	
    	
    }
        public function buyingdetail(Request $request){
        if($request->ajax()){
            $id=$request->get('id');
            $qty=$request->get('qty');
            $arProduct=Product::find($id);
            if($arProduct->discount>0){
                $newprice=($arProduct->price*(100-$arProduct->discount))/100;
            }else{
             $newprice=$arProduct->price;
            }
            Cart::add(array('id'=>$id,'name'=>$arProduct->pname,'qty'=>$qty,'price'=>$newprice,'options'=>array('picture' =>$arProduct->picture,'discount'=>$arProduct->discount)));
            $count=Cart::count();
            return $count;
        }
        
        
    }
    public function delete(Request $request){
    	if($request->ajax()){
            $rowId=$request->get('rowId');
            Cart::remove($rowId);
            $count=Cart::count();
            $subtotal=number_format(intval(str_replace(',','',Cart::subtotal()))).' VNĐ';
            return array($count,$subtotal);
        }
    }

    public function updatecart(Request $request){
        if($request->ajax()){
            $rowId=$request->get('rowId');
            $qty=$request->get('qty');
            if(Cart::update($rowId,$qty)){
                $cart_count=Cart::count();
                $arCart=Cart::content();
                $apricetotal=$arCart[$rowId]->price*$qty;
                $subtotal=Cart::subtotal();
                return array($cart_count,$apricetotal,$subtotal);

            }
            
        }
    }
}
