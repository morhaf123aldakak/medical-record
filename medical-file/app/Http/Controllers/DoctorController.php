<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_all_doctor()
    {
        $data= User::with('doctor')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show_one_doctor($id)
    {
        $data= Doctor::with('user')->where('id',$id)->first();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_doctor(Request $request,$id)
    {
        $data=User::with('doctor')->where('id',$id)->first();
        $data->update([
            'first_name'=>$request->first_name ?? $data->first_name,
            'last_name'=>$request->last_name ??$data->last_name,
            'email'=>$request->email ?? $data->email,
            'password'=>$request->password ??$data->password,
            'dob'=>$request->dob ?? $data->dob,
            'gender'=>$request->gender ??$data->gender,
            'address'=>$request->address??$data->address,
            'mobile'=>$request->mobile??$data->mobile,
            'phone_num'=>$request->phone_num??$data->phone_num,

        ]);
        $data->doctor->update([
            'visit_price'=>$request->visit_price??$data->doctor->visit_price,
            'followup_price'=>$request->followup_price??$data->doctor->followup_price,
            'inpatient_visit_price'=>$request->inpatient_visit_price??$data->doctor->inpatient_visit_price,
            'note'=>$request->note??$data->doctor->note,
        ]);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_doctor( $id)
    {
        $data=Doctor::find($id);
        $data->delete();
        return response()->json('doctor delete');
    }
}
