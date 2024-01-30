<?php

namespace App\Http\Controllers;

use App\Models\Bed;
use App\Models\Patient;
use App\Models\PatientAdmn;
use App\Models\Ward;
use Illuminate\Http\Request;

class WardBedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ward_index()
    {

        $data=Ward::all();
        return response()->json($data);
    }

    public function bed_index()
    {
        $data=Ward::with('bed')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */



    /**
     * Store a newly created resource in storage.
     */
    public function ward_store(Request $request)
{
    $data['number'] = $request->number;
    $data['status'] = $request->status;
    $ward = Ward::create($data);

    for ($i = 0; $i < count($request->bed); $i++) {
        $bed = [
            'ward_id' => $ward->id,
            'number' => $request->bed[$i]['bed_number'], // Fixed indexing here
            'status' => $request->bed[$i]['bed_status'], // Fixed indexing here
        ];
        Bed::create($bed);
    }

    return response()->json($data);
}



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update_ward(Request $request,$id)
    {
        $data=Ward::where('id',$id)->first();
        $data->update([
            'number'=>$request->ward_number??$data->number,
            'status'=>$request->ward_status??$data->status,

        ]);

        return response()->json($data);
    }
    public function update_bed(request$request,$id)
    {
        $data=Bed::where('id',$id)->first();
        $data->update([
            'number'=>$request->number??$data->number,
            'status'=>$request->status??$data->status,

        ]);

        return response()->json($data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete_bed($id)
    {
        $data=Bed::find($id);
        $data->delete();
        return response()->json('bed bed');
    }
    public function numbers_patient_ward_admn()
    {
        $patient=Patient::count();
        $ward=Ward::count();
        $Addm=PatientAdmn::count();
        return response()->json([$Addm,$patient,$ward]);
    }
}
