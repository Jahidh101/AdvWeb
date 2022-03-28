<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Medicine_type;


class Medicine extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function medicine_types(){
        return $this->belongsTo(Medicine_type::class, 'type');
    }

}
