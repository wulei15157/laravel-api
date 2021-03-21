<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
      use HasFactory;

//赋值许可
      protected $fillable = ['url','ip','country','updated_at','created_at','thisurl'];

}
