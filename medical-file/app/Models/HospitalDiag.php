<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalDiag extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function lap(){
    return $this->belongsTo(HospitalDep::class ,'hospital_dep_id', 'id');
    }
}
