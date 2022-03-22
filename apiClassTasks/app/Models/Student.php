<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Student extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function departments(){
        return $this->belongsTo(Department::class,'dept_id');
    }
}
