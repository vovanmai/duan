<?php

namespace App\Http\Controllers\shopsmp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ThemeOption;
use App\Model\Contact;
use App\Http\Requests\ContactFormRequest;
class IndexController extends Controller
{
    public function index(){
        $title="Home";
    	$arThemeOption=ThemeOption::all();
    	$ar10sales=Product::all()->sortByDesc('discount')->slice(0,10);
    	$ar12hot=Product::orderBy('view_count','DESC')->paginate(12);
    	return view('shopsmp.index.index',['ar10sales'=>$ar10sales,'ar12hot'=>$ar12hot,'arThemeOption'=>$arThemeOption,'title'=>$title]);
    }
    public function about(){
        $title="About us";
    	return view('shopsmp.index.about',['title'=>$title]);
    }
    public function contact(){
        $title="Contact us";
    	return view('shopsmp.index.contact',['title'=>$title]);
    }
    public function postContact(ContactFormRequest $request){
        $arContact = array(
            'contact_name' => $request->contact_name, 
            'contact_email' => $request->contact_email, 
            'contact_phone' => $request->contact_phone, 
            'contact_title' => $request->contact_title, 
            'contact_detail' => $request->contact_detail, 
            );
        if(Contact::insert($arContact)){
            $request->session()->flash('popupmsg','Your contact is sent, we will reply you');
            return redirect()->route('shopsmp.index.index');
        }else{
            $request->session()->flash('popupmsg','Please try again');
            return redirect()->route('shopsmp.index.contact');
        }
    }
    public function search(Request $request){
        $keyword=$request->search;
         $title='Results found For '.'"'.$keyword.'"';
        if($keyword==''){
            $request->session()->flash('popupmsg','Please enter some keywords');
            return redirect()->route('shopsmp.index.index');
        }
        $arProduct=Product::where('pname','LIKE','%'.$keyword.'%')->orderBy('view_count','DESC')->paginate(12);
        
        return view('shopsmp.index.search',['arProduct'=>$arProduct,'title'=>$title,'keyword'=>$keyword]);
    }
    
}
