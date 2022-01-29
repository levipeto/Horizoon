<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCart extends Model
{
    use HasFactory;

    protected $fillable = ['quantity','price','title'];

    public function usercart(){
        return $this->belongsTo(User::class,'user_id');
    }
}
