<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;
use App\Models\Requestitem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technician extends Model
{
    use HasFactory;
    public function userr()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function workorderT(){
        return $this->hasMany(WorkTechnician::class);
    }

    public function requestItemm(){
        return $this->hasMany(Requestitem::class);
    }
}
