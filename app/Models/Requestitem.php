<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Technician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requestitem extends Model
{
    use HasFactory;

    public function items(){
        return $this->belongsTo(Item::class,"item_id");
    }
    public function technician(){
        return $this->belongsTo(Technician::class,"technician_id");
    }
}
