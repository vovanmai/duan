<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    public function index(){
    	$arCat=Category::orderBy('id','ASC')->paginate(5);
    	return view('admin.category.index',['arCat'=>$arCat]);
    }
    public function create(){
    	return view('admin.category.create');
    }
    public function store(CategoryRequest $request){
        $cat_name=$request->name;
    	$cat_desc=$request->desc;
        $arCat = array(
            'cat_name' =>$cat_name, 
            'cat_desc' =>$cat_desc
            );
        if(Category::insert($arCat)){
            $request->session()->flash('msg','Category '.$cat_name.' is sucessfully created');
            return redirect()->route('admin.category.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.category.index');
        }
    }
    public function edit($id){
        $arCat=Category::find($id);
        return view('admin.category.edit',['arCat'=>$arCat]);
    }
    public function update($id,CategoryRequest $request){
        $arCat=Category::find($id);
        $arCat->cat_name=$request->name;
        $arCat->cat_desc=$request->desc;
        if($arCat->update()){
            $request->session()->flash('msg','Edit Category Successfully');
            return redirect()->route('admin.category.index');
        }else{
            $request->session()->flash('msg','Edit Category Unsuccessfully');
            return redirect()->route('admin.category.index');
        }   
    }
    public function destroy($id,request $request){
       $arCat=Category::find($id);
        if($arCat->delete()){
            $request->session()->flash('msg','Delete Brand Successfully');
            return redirect()->route('admin.category.index');
        }else{
            $request->session()->flash('msg','Delete Brand Unsuccessfully');
            return redirect()->route('admin.category.index');
        }
    }
}
