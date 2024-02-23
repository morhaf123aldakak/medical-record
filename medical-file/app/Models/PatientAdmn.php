<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAdmn extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function ward (){
        return $this->belongsTo(Ward::class)->with('bed');
    }

    public function wardd (){
        return $this->belongsTo(Ward::class,'ward_id','id');
    }

    public function bedd (){
        return $this->hasOne(Bed::class ,'id','bed_id');
    }
    public function his (){
        return $this->hasMany(PatientHistory::class);
    }





}
