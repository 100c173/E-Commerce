<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance_user extends Model
{
    use HasFactory;

    protected $fillable = ['user_id' , 'balance'] ; 

    public function user(){
        return $this->belongsTo(User::class);
    }
}