<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDiagnosleHistory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function Patient_History()
    {
        return $this->belongsTo(PatientHistory::class , 'patient_history_id' , 'id')->with('patient','doctor');
    }
    public function HospitalDiagnosleList()
    {
        return $this->belongsTo(HospitalDiag::class , 'hospital_diag_id' , 'id');
    }
}
