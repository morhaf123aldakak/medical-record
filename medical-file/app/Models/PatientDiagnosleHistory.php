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
        return $this->belongsTo(PatientHistory::class, 'patient_history_id', 'id')->with('patient', 'doctor');
    }
    public function HospitalDiagnosleList()
    {
        return $this->belongsTo(HospitalDiag::class, 'hospital_diag_id', 'id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id')->with('user');
    }
    public function adms()
    {
        return $this->belongsTo(PatientAdmn::class, 'patient_admn_id', 'id')->with('wardd', 'bedd');
    }
}
