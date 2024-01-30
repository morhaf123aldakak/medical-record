<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function get_all_patient()
    {
        $data= Patient::all();
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
    public function add_patient(PatientRequest $request)
    {
        $data = $request->validated();
        $user = Patient::create($data);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show_one_patient($id)
    {
        $data= Patient::where('id',$id)->first();
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
    public function update_patient(Request $request,$id)
    {


            $data=Patient::where('id',$id)->first();
            $data->update([
                'first_name'=>$request->first_name ?? $data->first_name,
                'last_name'=>$request->last_name ??$data->last_name,
                'email'=>$request->email ?? $data->email,
                'city'=>$request->city ??$data->city,
                'dob'=>$request->dob ?? $data->dob,
                'gender'=>$request->gender ??$data->gender,
                'address'=>$request->address??$data->address,
                'mobile'=>$request->mobile??$data->mobile,
                'country'=>$request->country??$data->country,
                'zipcode'=>$request->zipcode??$data->zipcode,
            ]);
            return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_patient($id)
    {
        $data= Patient::find($id);
        $data->delete();
        return response()->json($data);
    }
}
