<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    // here we will declare the name of table
    protected $table="offers";
    //white box that can we add valus in database
    // photo cannot take value
    protected $fillable=['name_ar','name_en','price','details_ar','details_en','created_at','updated_at'];
    //when we select all from table only fillable can return
    //without hidden 
    protected $hidden=['created_at','updated_at'];
    // if we will make timestamps false
    public $timestamps=true;

}
