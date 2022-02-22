<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Base;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\changePass;
use App\Models\User;
use App\Models\Multipic;

use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/', function () {
    $brands= DB::table('brands')->get();
    $about=DB::table('home_abouts')->first();
    $multiMage=DB::table('multipics')->get();
   

    return view('home',compact('brands','about','multiMage'));

});


Route::get('/about' , [Base::class,'fun'])->name('about')->middleware('age');
Route::get('/category/all' , [CategoryController::class,'AllCat'])->name('all.category');
Route::post('/category/add' , [CategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}' , [CategoryController::class,'Edit']);
Route::post('/category/update/{id}' , [CategoryController::class,'Update'])->name('update.category');
Route::get('/category/softdelete/{id}/' , [CategoryController::class,'softDelete'])->name('category.softdelete');
Route::get('/category/restore/{id}/' , [CategoryController::class,'Restore']);
Route::get('/category/pDelete/{id}/' , [CategoryController::class,'pDelete']);


//Brand Routes

Route::get('/brand/all' , [BrandController::class,'AllBrand'])->name('all.brand');
Route::post('/brand/add' , [BrandController::class,'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}' , [BrandController::class,'EditBrand'])->name('edit.brand');
Route::post('/brand/update/{id}' , [BrandController::class,'UpdateBrand'])->name('update.brand');
Route::get('/brand/delete/{id}' , [BrandController::class,'DeleteBrand'])->name('delete.brand');

// Multi Image Part

Route::get('/multi/image/' , [BrandController::class,'MultiPic'])->name('multi.image');
Route::post('/multi/save/' , [BrandController::class,'MultiSave'])->name('multi.save');





Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users= User::all();
    // by query builder way
    // $users= DB::table('users')->get();
    // return view('dashboard',compact('users'));
    return view('admin.index');
})->name('dashboard');

Route::get('/user/logout' , [BrandController::class,'Logout'])->name('user.logout');

//SLIDER
Route::get('/home/slider' , [HomeController::class,'HomeSlider'])->name('home.slider');
Route::get('/add/slider' , [HomeController::class,'AddSlide'])->name('add.slide');
Route::post('/save/slider' , [HomeController::class,'SaveSlide'])->name('store.slide');
Route::get('/edit/slider/{id}' , [HomeController::class,'EditSlide'])->name('edit.slide');
Route::post('/update/slider/{id}' , [HomeController::class,'UpdateSlide'])->name('update.slide');
Route::get('/delete/slider{id}' , [HomeController::class,'DeleteSlide'])->name('delete.slide');

//Home About

Route::get('/home/about' , [AboutController::class,'HomeAbout'])->name('home.about');
Route::get('/add/about' , [AboutController::class,'AddAbout'])->name('add.about');
Route::post('/save/about' , [AboutController::class,'SaveAbout'])->name('store.about');
Route::get('/edit/about/{id}' , [AboutController::class,'EditAbout'])->name('edit.about');
Route::post('/update/about/{id}' , [AboutController::class,'UpdateAbout'])->name('update.about');
Route::get('/delete/about/{id}' , [AboutController::class,'DeleteAbout'])->name('delete.about');


//Portofolio Route
Route::get('/portofolio' , [AboutController::class,'ViewPortfolio'])->name('view.portofolio');

//Adnmin Contact Route
Route::get('/admin/contact' , [contactController::class,'adminContact'])->name('admin.contact');
Route::get('/admin/add/contact' , [contactController::class,'AddContact'])->name('add.contact');
Route::post('/admin/save/contact' , [contactController::class,'SaveContact'])->name('store.contact');
Route::get('/admin/edit/contact/{id}' , [contactController::class,'EditContact'])->name('edit.contact');
Route::post('/admin/update/contact/{id}' , [contactController::class,'UpdateContact'])->name('update.contact');
Route::get('/admin/delete/contact/{id}' , [contactController::class,'DeleteContact'])->name('delete.contact');
Route::get('/admin/message' , [contactController::class,'viewContactMessage'])->name('contact.message');
//Home Contact
Route::get('/contact' , [contactController::class,'viewContact'])->name('view.contact');
Route::post('/contactSave' , [contactController::class,'clientContactSave'])->name('client.contactSave');

//change Password and profile 

Route::get('/user/password' , [changePass::class,'Cpassword'])->name('change.password');
Route::post('password/update' , [changePass::class,'Upassword'])->name('password.update');

//User Profile
Route::get('/user/profile' , [changePass::class,'Uprofile'])->name('profile.update');
Route::post('user/profile/update' , [changePass::class,'UpdateProfile'])->name('update.user.profile');



