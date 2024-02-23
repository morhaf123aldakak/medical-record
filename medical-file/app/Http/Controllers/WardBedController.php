<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdmissionRequest;
use App\Models\Bed;
use App\Models\Patient;
use App\Models\PatientAdmn;
use App\Models\PatientHistory;
use App\Models\Ward;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WardBedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ward_index()
    {

        $data = Ward::all();
        return response()->json($data);
    }

    public function bed_index()
    {
        $data = Ward::with('bed')->get();
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
    public function add_bed(Request $request)
    {

        $data['ward_id'] = $request->ward_id;
        $data['status'] = $request->status;
        $data['number'] = $request->number;
        $data = Bed::create($data);
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
    public function update_ward(Request $request, $id)
    {
        $data = Ward::where('id', $id)->first();
        $data->update([
            'number' => $request->ward_number ?? $data->number,
            'status' => $request->ward_status ?? $data->status,

        ]);

        return response()->json($data);
    }
    public function update_bed(request $request, $id)
    {
        $data = Bed::where('id', $id)->first();
        $data->update([
            'number' => $request->number ?? $data->number,
            'status' => $request->status ?? $data->status,

        ]);

        return response()->json($data);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete_bed($id)
    {
        $data = Bed::find($id);
        $data->delete();
        return response()->json('bed bed');
    }
    public function numbers_patient_ward_admn()
    {
        $patient = Patient::count();
        $ward = Ward::count();
        $Addm = PatientAdmn::count();
        return response()->json([$Addm, $patient, $ward]);
    }
    public function add_admission(request $request)
    {
        $data['admission_data'] = $request->admission_data;
        // $data['discharge_data']=$request->discharge_data;
        $data['bed_id'] = $request->bed_id;
        $data['ward_id'] = $request->ward_id;
        // $data['total_cost ']=$request->total_cost ;
        $data['note'] = $request->note;

        $user = PatientAdmn::create($data);
        $his['patient_id'] = $request->patient_id;
        $his['doctor_id'] = $request->doctor_id;
        $his['date'] = $request->admission_data;
        $his['note'] = $request->note;
        $his['patient_admn_id'] = $user->id;
        PatientHistory::create($his);
        return response()->json([$data, $his]);
    }
    public function update_admission(request $request, $id)
    {
        $data = PatientAdmn::where('id', $id)->first();
        $data->update([
            'admission_data' => $request->admission_data ?? $data->admission_data,
            'discharge_data' => $request->discharge_data ?? $data->discharge_data,
            'bed_id' => $request->bed_id ?? $data->bed_id,
            'ward_id' => $request->ward_id ?? $data->ward_id,
            'total_cost' => $request->total_cost ?? $data->total_cost,
            'note' => $request->note ?? $data->note,
        ]);
        return response()->json($data);
    }
    public function get_admissions()
    {
        $data = PatientHistory::with('patient', 'doctor', 'adms')->get();
        return response()->json($data);
    }
    public function show_one_ward($id)
    {
        $data = Ward::with('bed')->where('id', $id)->first();
        return response()->json($data);
    }
    public function show_one_admission($id)
    {
        $data = PatientAdmn::with('his')->where('id', $id)->get();
        return response()->json($data);
    }
}
