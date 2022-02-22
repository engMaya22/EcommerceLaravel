<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use HasFactory;
    use SoftDeletes;//it will add  deleted_at

    protected $fillable = [
        'user_id',
        'category_name',
      
    ];

    public function user(){
        //هك بقدر اصل من جدول الصنف الى جدول المستخدم وواصفاته عبر التابع user
return $this->hasOne(User::class,'id' , 'user_id');


    }
}
