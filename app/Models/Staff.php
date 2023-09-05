<?php

namespace App\Models;

use App\Models\User;
use App\Models\Workorder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function workorder(){
        return $this->hasMany(Workorder::class);
    }
}
