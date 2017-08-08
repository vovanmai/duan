<?php

namespace App\Http\Controllers\shopsmp;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Brand;
class ProductController extends Controller
{
    public function detail($slugcat,$slug,$id){
        $slug2=$slugcat;
    	$arProduct=Product::find($id);
    	$view_count=$arProduct->view_count;
    	$view_count=$view_count+1;
    	$arProduct->view_count=$view_count;
    	$arProduct->update();
    	$title=$arProduct->pname;
    	return view('shopsmp.product.detail',['arProduct'=>$arProduct,'title'=>$title,'slug2'=>$slug2]);
    }
    public function cat($slug,$id){

    	$slug1 =str_replace('-',' ',$slug);
    	$arCat =Category::where('cat_name','=',$slug1)->first();
    	$arBrand =Brand::where('brand_name','=',$slug1)->first();
    	$arProduct=Product::where('cat_id','=',$id)->orderBy('id','DESC')->paginate(6);
    	if($arCat!=null){
    		$title=$arCat->cat_name;
    	}
    	if($arBrand!=null){
    		$title=$arBrand->brand_name;
    	}
        $slug2=$slug;
    	return view('shopsmp.product.cat',['arProduct'=>$arProduct,'arCat'=>$arCat,'arBrand'=>$arBrand,'title'=>$title,'slug2'=>$slug2]);
    }


}
