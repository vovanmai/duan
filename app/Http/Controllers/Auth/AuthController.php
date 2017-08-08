<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUserRequest;
use Cart;
class AuthController extends Controller
{
    public function getRegister(){
    	$title="Register - SMP Shop";
		return view('auth.register',['title'=>$title]);
	}
	public function postRegister(UserRequest $request){
    	$newUser = array(
    		'username' =>trim($request->username), 
    		'name' =>$request->name, 
    		'level' =>3, 
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
            $newUser['avatar']=$avatar_name;
    	}else{
    		$newUser['avatar']='default.jpg';
    	}
    	 if(User::insert($newUser)){
            $request->session()->flash('popupmsg','Welcome '.$request->username.'! You registered successfully!');
            if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])||Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                if(Cart::count()!=0){
                return redirect()->route('shopsmp.order.step1');
                }   
            }
            return redirect()->route('shopsmp.index.index');
        }else{
            $request->session()->flash('popupmsg','There were an error, please try again!');
            return redirect()->route('shopsmp.index.index');
        }
		
	}

	public function getLogin(){
         $title="Login - SMP Shop";
    	return view('auth.login',['title'=>$title]);
    }
    public function postLogin(LoginUserRequest $request){
        $username=trim($request->username);
        $password=trim($request->password);
        if(Auth::attempt(['username'=>$username,'password'=>$password])||Auth::attempt(['email'=>$username,'password'=>$password])){
            $request->session()->flash('popupmsg','You login in successfully');   
            return redirect()->route('shopsmp.index.index');  
        }else{
            $request->session()->flash('msg','Username and password are incorrect !');   
            return redirect()->route('auth.login');
        }
        
    }
    public function getLoginAdmin(){
         if(Auth::user()!=null){
            return redirect()->route('admin.index.index');
        }
        return view('auth.loginadmin');
    }
    public function postLoginAdmin(Request $request){
        $username=trim($request->username);
        $password=trim($request->password);
        if(Auth::attempt(['username'=>$username,'password'=>$password])){
            $arUser=Auth::user();
            if($arUser->level==1||$arUser->level==2){
                return redirect()->route('admin.index.index');
            }else{
                $request->session()->flash('popupmsg','You can'."'".'t acsess this admin page !');   
                return redirect()->route('shopsmp.index.index'); 
            }
        }else{
                $request->session()->flash('msg','Username and password are incorrect !');   
                return redirect()->route('auth.loginadmin');
        }
        
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('auth.loginadmin');
    }
    public function logoutPublic(){
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
