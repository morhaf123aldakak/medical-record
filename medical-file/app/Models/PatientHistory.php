<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHistory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function patient_histories()
    {
        return $this->belongsTo(Patient::class);

    }



    public function patient(){
        return $this->belongsTo(Patient::class , 'patient_id' , 'id');
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id','id')->with('user');
    }
    public function adms(){
        return $this->belongsTo(PatientAdmn::class ,'patient_admn_id','id')->with('wardd' , 'bedd');
    }
    public function hestory(){
        return $this->hasMany(PatientDiagnosleHistory::class);
    }
    public function old_hestory()
    {
        return $this->hasMany(PatientOldHistory::class ,'patient_id','patient_id');
    }

    public function dsess(){
        return $this->hasOne(Disease::class);
    }

}
