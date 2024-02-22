<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function patient_histories()
    {
        return $this->hasOne(PatientHistory::class)->with('adms','hestory','dsess');
    }
    public function old()
    {
        return $this->hasMany(PatientOldHistory::class);
    }

}
