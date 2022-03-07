<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User_type;
use App\Models\Login_history;

class All_user extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function user_types(){
        return $this->belongsTo(User_type::class,);
    }

    public function login_history(){
        return $this->hasMany(Login_history::class,'username','username');
    }

}
