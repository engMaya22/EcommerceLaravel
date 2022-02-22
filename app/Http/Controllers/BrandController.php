<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
// use Image;
use Auth;
class BrandController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function AllBrand(){

        $brands=Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function AddBrand(Request $request){
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image'=>'required|mimes:jpg,jpeg,png',
            
          
        ],
        [ 
            'brand_name.required'=> 'Please Enter Brand Name',
            
            'category_name.min'=> ' The  Min Of Brand Name is 4 Chars ',
            
        ],
    
    
    );

             $brand_image= $request->file('brand_image');
              $name_gen=hexdec(uniqid());
              $img_ext= strtolower($brand_image->getClientOriginalExtension());
              $img_name=$name_gen.'.'.$img_ext;
              $up_location='image/brand/';
              $lastImg=$up_location.$img_name;
              $brand_image->move($up_location,$img_name);

            //for intervention package image

            // $name_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
          
            // Image::make($brand_image)->resize(300, 300)->save('image/brand'.$name_gen);
            // //after resizing and sive the edit i put it in $lastImg to view it
            // $lastImg='image/brand'.$name_gen;


        $brand= new Brand();
        $brand->brand_name=$request->brand_name;
        $brand->brand_image=$lastImg;
        $brand->save();
     
                         
                             
        return redirect()->back()->with('message' , 'Brand is Added Successfuly');
    }

    
    public function EditBrand($id){
        
        $brand=Brand::find($id);
        return view('admin.brand.edit',compact('brand'))->with('message' , 'Brand is Edited Successfuly');

    }
    public function UpdateBrand( Request $request , $id){
        $validated = $request->validate([
            'brand_name' => 'required|:brands|min:4',
            
            
          
        ],
        [ 
            'brand_name.required'=> 'Please Enter Brand Name',
            
            'category_name.min'=> ' The  Min Of Brand Name is 4 Chars ',
            
        ],
    
    
    );

    $old_image=$request->old_image;
  
    
    $brand_image= $request->file('brand_image');

    if( $brand_image){
        $name_gen=hexdec(uniqid());
        $img_ext= strtolower($brand_image->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='image/brand/';
        $lastImg=$up_location.$img_name;
        $brand_image->move($up_location,$img_name);
        $brand= Brand::find($id);
        $brand->brand_name=$request->brand_name;
        $brand->brand_image=$lastImg;
        $brand->save();
      
         return redirect()->back()->with('message' , 'Brand is Updated Successfuly');

       
    }
    else{
      

        $brand= Brand::find($id);
        $brand->brand_name=$request->brand_name;
       
        $brand->save();

    
         return redirect()->back()->with('message' , 'Brand is Updated Successfuly');


    }
             




  //delete file in local path
    // unlink($old_image);

        
    }
    public function DeleteBrand($id){
        $image=Brand::find($id);
        $old_image=$image->brand_image;
        unlink($old_image);
         Brand::find($id)->delete();
         
          return redirect()->back()->with('warning' , 'Brand is Deleted Successfuly');
    }


    public function MultiPic(){
        $images=Multipic::all();

return view('admin.multipic.index',compact('images'));


    }
    public function MultiSave(Request $request){
    
     $images= $request->file('image');
      
        
        foreach($images as $item){

        $name_gen=hexdec(uniqid());
        $img_ext= strtolower($item->getClientOriginalExtension());
        $img_name=$name_gen.'.'.$img_ext;
        $up_location='image/multi/';
        $lastImg=$up_location.$img_name;
        $item->move($up_location,$img_name);

        $brand= new Multipic();
      
        $brand->image=$lastImg;
        $brand->save();

        }
     //end for where multi images selected in request which named image
             
        return redirect()->back()->with('message', 'The Brand Successfully  Inserted');





    }
    public function Logout(){
        Auth::logout();
        return redirect()->route('login')->with('success' , 'User Logout');
    }

}
