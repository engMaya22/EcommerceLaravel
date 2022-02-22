<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Auth;

class HomeController extends Controller
{
    //
public function HomeSlider(){
    $sliders=Slider::latest()->get();
    return view('admin.slider.index',compact('sliders'));
}

public function AddSlide(){
   
    return view('admin.slider.add');
}

public function SaveSlide(Request $request){

    $validated = $request->validate([
        'title' => 'required|unique:sliders|min:4',
        'image'=>'required|mimes:jpg,jpeg,png',
        
      
    ],
    [ 
        'title.required'=> 'Please Enter Slide Name',
        
        'title.min'=> ' The  Min Of Brand Name is 4 Chars ',
        
    ],


);

         $image= $request->file('image');
          $name_gen=hexdec(uniqid());
          $img_ext= strtolower($image->getClientOriginalExtension());
          $img_name=$name_gen.'.'.$img_ext;
          $up_location='image/slider/';
          $lastImg=$up_location.$img_name;
          $image->move($up_location,$img_name);


        $slider= new Slider();
        $slider->title=$request->title;
        $slider->description=$request->description;
        $slider->image=$lastImg;
        $slider->save();
        $sliders=Slider::latest()->get();

    return redirect()->route('home.slider' )->with('success','Slider addedd successfuly');
}


public function EditSlide( $id){

    $slider=Slider::find($id);

    return view('admin.slider.edit',compact('slider'));


}
 public function UpdateSlide(Request $request , $id){


 
 $slide_image= $request->file('image');

    if( $slide_image){
        $name_gen=hexdec(uniqid());
        $img_ext= strtolower($slide_image->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='image/slider/';
        $lastImg=$up_location.$img_name;
        $slide_image->move($up_location,$img_name);
        $slider=Slider::find($id);
        $slider->title=$request->title;
        $slider->image=$lastImg;
        $slider->description=$request->description;
        $slider->save();

        return redirect()->back()->with('success', 'The Slider Successfully Updated');
    }
    else{
      
        $slider=Slider::find($id);
        $slider->title=$request->title;
        $slider->description=$request->description;
        $slider->save();
        return redirect()->route('home.slider' )->with('success', 'The  Slider Successfully Updated');




 }

 }
public function DeleteSlide($id) {
    $slider=Slider::find($id);
    $slider->delete();
    return redirect()->back()->with('success',' slider deleted  successfully  ');

}

}
