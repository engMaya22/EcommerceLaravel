<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;

class AboutController extends Controller
{
    //
    public function HomeAbout(){
        $abouthome= HomeAbout::latest()->get();

        return view('admin.home.index',compact('abouthome'));
    }


    public function AddAbout(){
      

        return view('admin.home.create');
    }
    public function SaveAbout(Request $request){

        $validated = $request->validate([
            'title' => 'required|unique:home_abouts|min:4',
            'short_dis' => 'required|unique:home_abouts|min:24',
            'long_dis' => 'required|unique:home_abouts|min:44',
           
            
          
        ],
        [ 
            'title.required'=> 'Please Enter About Name',
            
            'title.min'=> ' The  Min Of About Name is 4 Chars ',
            
        ],
    
    
    );
    
    
    
            $about= new HomeAbout();
            $about->title=$request->title;
            $about->short_dis=$request->short_dis;
            $about->long_dis=$request->long_dis;
            $about->save();
            
         return redirect()->route('home.about' )->with('success','About Data addedd successfuly');

    }


    public function EditAbout($id){
        $homeAbout=HomeAbout::find($id);
        return view('admin.home.edit',compact('homeAbout'));
    }
    
    public function UpdateAbout(Request $request ,$id){

        $homeAbout=HomeAbout::find($id);
        $homeAbout->title=$request->title;
        $homeAbout->short_dis=$request->short_dis;
        $homeAbout->long_dis=$request->long_dis;
        $homeAbout->save();
        return redirect()->route('home.about' )->with('success','About Data Updated successfuly');
    }
    public function DeleteAbout($id){
        $homeAbout=HomeAbout::find($id);
        $homeAbout->delete();
        return redirect()->route('home.about' )->with('success','About Data Deleted successfuly');
    }




    public function ViewPortfolio(){
        $images=Multipic::all();
        return view('pages.portifolio',compact('images'));
    }



}
