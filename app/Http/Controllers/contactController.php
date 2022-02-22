<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Models\ContactForm;


class contactController extends Controller
{
    //

    public function adminContact(){

        $contacts=Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function AddContact(){

        
        return view('admin.contact.create');
    }
    public function SaveContact(Request $request){
        $contact=new Contact();
        $contact->email=$request->email;
        $contact->address=$request->address;
        $contact->phone=$request->phone;
        $contact->save();
        return redirect()->route('admin.contact' )->with('success',' Contact Data addedd successfuly');
    }
    public function EditContact($id){
        $contact=Contact::find($id);
        return view('admin.contact.edit',compact('contact'));
    }
    public function UpdateContact(Request $request ,$id){

        $contact=Contact::find($id);
        $contact->email=$request->email;
        $contact->address=$request->address;
        $contact->phone=$request->phone;
        $contact->save();
        return redirect()->route('admin.contact' )->with('success','Contact Data Updated successfuly');
    }
    public function DeleteContact($id){
        $contact=Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact' )->with('success','Contact Data Deleted successfuly');
    }




   public function viewContact(){
    $contacts=DB::table('contacts')->first();
    return view('pages.contact',compact('contacts'));
   }

   public function clientContactSave(Request $request){
       $form =new ContactForm();
       $form->name=$request->name;
      $form->email=$request->email;
       $form->subject=$request->subject;
       $form->message=$request->message;
       $form->save();
       return redirect()->route('view.contact')->with('success', 'Your Message Is sent Successfuly');
      


   }
  public function viewContactMessage(){
      $messages=DB::table('contact_forms')->get();
      return  view('admin.contact.message',compact('messages'));
  }


}
