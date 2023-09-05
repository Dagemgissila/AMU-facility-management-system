<?php

namespace App\Models;

use App\Models\Staff;
use App\Models\WorkTechnician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workorder extends Model
{
    use HasFactory;
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function workorderW(){
        return $this->hasMany(WorkTechnician::class,'work_id');
    }
}
