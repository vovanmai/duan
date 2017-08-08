<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

use App\Model\Brand;
use App\Model\Category;
class ProductControllerAdmin extends Controller
{
    public function index(){
    	$arProduct=Product::orderBy('id','ASC')->paginate(10);
    	return view('admin.product.index',['arProduct'=>$arProduct]);
    }
    public function create(){
    	$arBrand=Brand::all();
    	$arCat=Category::all();
    	return view('admin.product.create',['arBrand'=>$arBrand,'arCat'=>$arCat]);
    }

    public function store(ProductRequest $request){
    	$arProduct = array(
    		'pname' => $request->name, 
    		'preview' => $request->preview, 
    		'detail' => $request->detail, 
    		'view_count' =>0,
            'price' => $request->price, 
    		'discount' => $request->discount, 
    		'brand_id' => $request->brand, 
    		'cat_id' => $request->category 
    		);
        $picture=$request->picture;
        if($picture!=''){
            $pathUpload=$request->file('picture')->store('imagefiles');
            $tmp=explode('/',$pathUpload);
            $picture=end($tmp);
            $arItem['arProduct']=$picture;
        }else{
            $arProduct['picture']='';
        }
        if(Product::insert($arProduct)){
            $request->session()->flash('msg','Product '.$request->name.' is sucessfully created');
            return redirect()->route('admin.product.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.product.index');
        }
    	
    }
    public function edit($id){
       
        $arBrand=Brand::all();
        $arCat=Category::all();
        $arProduct=Product::find($id);
        return view('admin.product.edit',['arProduct'=>$arProduct,'arBrand'=>$arBrand,'arCat'=>$arCat]);
    }
    public function update(ProductRequest $request,$id){
        $arProduct=Product::find($id);
        $picture=$request->picture;
        if($picture!=''){
            $pathUpload=$request->file('picture')->store('imagefiles');
            $tmp=explode('/',$pathUpload);
            $picture=end($tmp);
            $oldPic=$arProduct->picture;
            if($oldPic!=''){
                 Storage::delete('imagefiles/'.$oldPic);
            }
            $arProduct->picture=$picture;
        }
            $arProduct->pname=$request->name;
            $arProduct->price=$request->price;
            $arProduct->discount=$request->discount;
            $arProduct->brand_id=$request->brand;
            $arProduct->cat_id=$request->category;
            $arProduct->preview=$request->preview;
            $arProduct->detail=$request->detail;
        if($arProduct->update()){
            $request->session()->flash('msg','Edit Product Successfully');
            return redirect()->route('admin.product.index');
        }else{
             $request->session()->flash('msg','Edit Product Unsuccessfully');
            return redirect()->route('admin.product.index');
        }
        
    }
    public function destroy($id,request $request){
       $arProduct=Product::find($id);
       $picture=$arProduct->picture;
       if($picture!=''){
            Storage::delete('imagefiles/'.$picture);
       }
       if($arProduct->delete()){
            $request->session()->flash('msg','Delete Product Successfully');
            return redirect()->route('admin.product.index');
        }else{
            $request->session()->flash('msg','Delete Product Unsuccessfully');
            return redirect()->route('admin.product.index');
        }
    }
  
}
