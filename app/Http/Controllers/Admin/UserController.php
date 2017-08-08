<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    public function index(){
    	$arUser=User::orderBy('id','ASC')->paginate(10);
    	return view('admin.user.index',['arUser'=>$arUser]);
    }
    public function create(){
    	
    	return view('admin.user.create');
    }

    public function store(UserRequest $request){
    	$arUser = array(
    		'username' =>trim($request->username), 
    		'name' =>$request->name, 
    		'level' =>$request->level, 
    		'email' =>$request->email, 
    		'address' =>$request->address, 
    		'phone' =>$request->phone, 
    		'password' =>bcrypt(trim($request->password)),
    		);
    	$avatar=$request->avatar;
    	if($avatar!=''){
    	    $file_end= $request->file('avatar')->getClientOriginalExtension();
            $avatar_name = str_slug($request->name).'_'.time().'.'.$file_end;
            $avatar = $request->file('avatar')->storeAs('avatar',$avatar_name);
            $arUser['avatar']=$avatar_name;


    	}else{
    		$arUser['avatar']='default.jpg';
    	}
    	if(User::insert($arUser)){
            $request->session()->flash('msg','User '.$request->name.' is sucessfully created');
            return redirect()->route('admin.user.index');
        }else{
            $request->session()->flash('msg','There were an error, please try again!');
            return redirect()->route('admin.user.index');
        }
    	
    }

    public function edit($id){
        $arUser=User::find($id);
        return view('admin.user.edit',['arUser'=>$arUser]);
    }
    public function update($id,UserEditRequest $request){
        $arUser=User::find($id);
        if($request->picture!=''){
            $file_end= $request->file('picture')->getClientOriginalExtension();
            $avatar_name = str_slug($request->name).'_'.time().'.'.$file_end;
            $avatar = $request->file('picture')->storeAs('avatar',$avatar_name);
            if($arUser->avatar!=''){
                Storage::delete('avatar/'.$arUser->avatar);
            }
           $arUser['avatar']=$avatar_name;
        }
        $arUser->username=$request->username;
        $arUser->name=$request->name;
        $arUser->level=$request->level;
        $arUser->email=$request->email;
        $arUser->address=$request->address;
        $arUser->phone=$request->phone;
        if($request->password!=''){
            $arUser->password=bcrypt(trim($request->password));
        }
        if($arUser->update()){
            $request->session()->flash('msg','Edit User Successfully');
            return redirect()->route('admin.user.index');
        }else{
             $request->session()->flash('msg','Edit User Unsuccessfully');
            return redirect()->route('admin.user.index');
        }

    }
 

    public function destroy($id,request $request){
    	$arUser=User::find($id);
    	$avatar=$arUser->avatar;
    	if($avatar!=''){
    		Storage::delete('avatar/'.$avatar);
    	}
    	if($arUser->delete()){
            $request->session()->flash('msg','Delete User Successfully');
            return redirect()->route('admin.user.index');
        }else{
            $request->session()->flash('msg','Delete User Unsuccessfully');
            return redirect()->route('admin.user.index');
        }
    	
    }


  
}
