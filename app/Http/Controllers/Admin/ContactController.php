<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contact;
class ContactController extends Controller
{
   public function index(){
   		$arContact=Contact::orderBy('id','DESC')->paginate(5);
   		return view('admin.contact.index',['arContact'=>$arContact]);
   }
   public function destroy($id,Request $request){
   		$arContact=Contact::find($id);
        if($arContact->delete()){
            $request->session()->flash('msg','Delete Contact Successfully');
            return redirect()->route('admin.contact.index');
        }else{
            $request->session()->flash('msg','Delete Contact Unsuccessfully');
            return redirect()->route('admin.contact.index');
        }
   }
}
