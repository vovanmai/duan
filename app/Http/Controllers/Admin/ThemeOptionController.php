<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests\ThemeOptionRequest;
use App\Http\Requests\ThemeOptionEdit;
use App\Http\Controllers\Controller;
use App\Model\ThemeOption;
use Illuminate\Support\Facades\Storage;
class ThemeOptionController extends Controller
{
    public function index(){
    	$arThemeOption=ThemeOption::all();
    	return view('admin.themeoption.index',['arThemeOption'=>$arThemeOption]);
    }
    public function create(){
    
    	return view('admin.themeoption.create');
    }

    public function store(ThemeOptionRequest $request){
    	$title=$request->title;
    	$desc=$request->desc;
        $picture=$request->picture;
    	$link=$request->link;
    	$pathUpload=$request->file('picture')->store('slide');
        $tmp=explode('/',$pathUpload);
        $picture=end($tmp);
        
        $arThemeOption = array(
            'title' =>$title, 
            'desc' =>$desc,
            'picture' =>$picture,
            'link' =>$link,
            );
        if(ThemeOption::insert($arThemeOption)){
            $request->session()->flash('msg','Category '.$title.' is sucessfully created');
            return redirect()->route('admin.themeoption.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.themeoption.index');
        }
    	
    }
    public function edit($id){
        $arThemeOption=ThemeOption::find($id);
        return view('admin.themeoption.edit',['arThemeOption'=>$arThemeOption]);
    }

    public function update($id,ThemeOptionEdit $request){
        $arThemeOption=ThemeOption::find($id);
        $arThemeOption->title=$request->title;
        $arThemeOption->desc=$request->desc;
        $arThemeOption->link=$request->link;
        if($request->picture!=''){
            $file_end= $request->file('picture')->getClientOriginalExtension();
            $picture_name = str_slug($request->title).'_'.time().'.'.$file_end;
            $move = $request->file('picture')->storeAs('slide',$picture_name);
            if($arThemeOption->picture!=''){
                Storage::delete('avatar/'.$arThemeOption->picture);
            }
           $arThemeOption['picture']=$picture_name;
        }
        
        if($arThemeOption->update()){
            $request->session()->flash('msg','Edit Theme Successfully');
            return redirect()->route('admin.themeoption.index');
        }else{
             $request->session()->flash('msg','Edit Them Unsuccessfully');
            return redirect()->route('admin.themeoption.index');
        }
        

    }

    public function destroy($id,request $request){
      $arThemeOption=ThemeOption::find($id);
       $picture=$arThemeOption->picture;
       if($picture!=''){
            Storage::delete('slide/'.$picture);
       }
       if($arThemeOption->delete()){
            $request->session()->flash('msg','Delete ThemeOption Successfully');
            return redirect()->route('admin.themeoption.index');
        }else{
            $request->session()->flash('msg','Delete ThemeOption Unsuccessfully');
            return redirect()->route('admin.themeoption.index');
        }
    }
}
