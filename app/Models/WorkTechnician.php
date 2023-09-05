<?php

namespace App\Models;

use App\Models\Workorder;
use App\Models\Technician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkTechnician extends Model
{
    use HasFactory;
    public function technician()
    {
        return $this->belongsTo(Technician::class, 'technician_id');
    }

    public function workorders()
    {
        return $this->belongsTo(Workorder::class, 'work_id');
    }
}
