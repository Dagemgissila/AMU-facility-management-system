<?php

namespace App\Models;

use App\Models\Technician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    public function technicians(){
        return $this->belongsTo(Technician::class,'technician_id');
    }
}
