<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function index(){
    	$arBrands=Brand::orderBy('id','ASC')->paginate(5);
    	return view('admin.brand.index',['arBrands'=>$arBrands]);
    }
    public function create(){
    	return view('admin.brand.create');
    }
    public function store(BrandRequest $request){
        $brand_name=$request->name;
    	$brand_desc=$request->desc;
        $arBrand = array(
            'brand_name' =>$brand_name, 
            'brand_desc' =>$brand_desc
            );
        if(Brand::insert($arBrand)){
            $request->session()->flash('msg','Brand '.$brand_name.' is sucessfully created');
            return redirect()->route('admin.brand.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.brand.index');
        }
    }
    public function destroy($id,request $request){
       $arBrand=Brand::find($id);
        if($arBrand->delete()){
            $request->session()->flash('msg','Delete Brand Successfully');
            return redirect()->route('admin.brand.index');
        }else{
            $request->session()->flash('msg','Delete Brand Unsuccessfully');
            return redirect()->route('admin.brand.index');
        }
    }
    public function edit($id){
        $arBrand=Brand::find($id);
        return view('admin.brand.edit',['arBrand'=>$arBrand]);
    }
    public function update($id,BrandRequest $request){
        $arBrand=Brand::find($id);
        $arBrand->brand_name=$request->name;
        $arBrand->brand_desc=$request->desc;
        if($arBrand->update()){
            $request->session()->flash('msg','Edit Brand Successfully');
            return redirect()->route('admin.brand.index');
        }else{
            $request->session()->flash('msg','Edit Brand Unsuccessfully');
            return redirect()->route('admin.brand.index');
        }   
    }
}
