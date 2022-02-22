<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //to redirect guest to login  :
    public function __construct(){
        $this->middleware('auth');
    }
    public function AllCat(){
        // $categories=Category::all();
        //to show th newwer first in table :
        // $categories=Category::latest()->get();
        $categories=Category::latest()->paginate(4);
        $trashCat=Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index',compact('categories','trashCat'));
        
    }
    public function AddCat( Request $request){
        // dd($request);
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
          
        ],
        // to customize error  message:
         [ 
    'category_name.required'=> 'Please Enter Category Name',
    
    'category_name.max'=> ' The  Max Of Category Name is 255 Chars ',
    
],
    
    );
    //after validation the data which entered

    Category::insert([
'category_name'=>$request->category_name,
'user_id'=>Auth::user()->id,
'created_at'=>Carbon::now()


   ]);
// onther way to insert data
// $category=new Category();
// $category->category_name=$request->category_name;
// $category->user_id=Auth::user()->id;
//notice in these way created_at will creat automaticaly
// $category->save();


// if we want to insert data without need to model by query biuider:
    // $data=array();
    // $data['category_name']=$request->category_name;
    // $data['user_id']=Auth::user()->id;
    // DB::table('categories')->insert($data);

        return redirect()->back()->with('success' , 'The Category was added Successfully');
        
    
    }
public function Edit($id){

$category= Category::find($id);
return view('admin.category.edit',compact('category'));

}

public function Update( Request $request, $id ){
// dd($request);
    $category= Category::find($id);
    $category->category_name=$request->category_name;
    //كل مستخدم يحدث منتجاتو
    $category->user_id=Auth::user()->id;
    $category->save();
    // all.category route will take me  to all cat funcion to display all categories
    return redirect()->route('all.category')->with('success' ,'updated successfully');
   
    
    }
    public function softDelete($id){
     
        $delete=Category::find($id);
        $delete->delete();
       
        return redirect()->back()->with('success' ,' soft deleted  successfully');

    }
    public function Restore($id){
        $restore=Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success' ,' restore category   successfully');




    }
    public function pDelete($id){
        $restore=Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success' ,' category   Permanently Deleted successfully');




    }


}
