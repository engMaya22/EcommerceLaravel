<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class changePass extends Controller
{
    //
    public function Cpassword(){
        return view('admin.body.change_password');
    }
    public function Upassword(Request $request){

        $validateData = $request->validate([
            'old_password' => 'required',
            'password'=>'required|confirmed',
            
          
        ]);

         $hashedPassword= Auth::user()->password;
         if(Hash::check($request->old_password ,$hashedPassword )){
             $user = User::find(Auth::id());
             $user->password= Hash::make($request->password);
             $user->save();
             Auth::logout();
             return redirect()->route('login')->with('success','Password is Cahaged Sucessfully');
         }
         else 
                {
                    return redirect()->back()->with('error','Current Password Is Invalid');
                }


    }

    public  function Uprofile(){

      if(Auth::user()){
          $user= User::find(Auth::user()->id);
              if($user){
            return view('admin.body.update_profile' ,compact('user'));
                         }
      }

    }
    public function UpdateProfile(Request $request){
        $user=User::find(Auth::user()->id);
        if($user){
            $user->name= $request['name'];
            $user->email=$request['email'];
            $user->save();
            return redirect()->back()->with('success','User Profile Updated Successfully');
        }
        else{
            return redirect()->back();
        }
       
        

    }
}
