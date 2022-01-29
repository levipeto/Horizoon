<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['cart'];

    public function usercart(){
        return $this->belongsTo(User::class,'user_id');
    }
}
