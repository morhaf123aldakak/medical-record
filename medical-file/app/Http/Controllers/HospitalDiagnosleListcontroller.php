<?php

namespace App\Http\Controllers;

use App\Http\Requests\HospitalDiagnosleList;
use App\Models\HospitalDep;
use App\Models\HospitalDiag;
use App\Models\PatientDiagnosleHistory;
use App\Models\User;
use Illuminate\Http\Request;

class HospitalDiagnosleListcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index_lab()
    {

       $data=HospitalDiag::with('lap')->get();
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
    public function store_lab(HospitalDiagnosleList $request)
    {
        $data=$request->validated();
        HospitalDiag::create($data);
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
    public function update_diagnosl(Request $request, string $id)
    {
        $data=HospitalDiag::where('id',$id)->first();
        $data->update([
        'lap_address'=>$request->lap_address ?? $data->lap_address,
        'lap_phone'=>$request->lap_phone??$data->lap_phone,
        'lap_mobile'=>$request->lap_mobile??$data->lap_mobile,
        'lap_email'=>$request->lap_email??$data->lap_email,
        'note'=>$request->note??$data->note,
        'hospital_dep_id'=>$request->hospital_dep_id??$data->hospital_dep_id,

        ]);
        return response()->json($data);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function number_diagnols(){
        $data=PatientDiagnosleHistory::count();
        return response()->json($data);
    }
    public function show_test()
    {
        $data = User::where('id' , auth()->user()->id)->first();
        $lap = HospitalDiag::where('hospital_dep_id' ,$data->hospital_dep_id )->pluck('id');
        $tests = PatientDiagnosleHistory::whereIn('hospital_diag_id' , $lap)->get();

    return response()->json($tests);
    }
    public function store_test(request $request)
    {
        $data ['doctor_id']= $request->doctor_id;
        $data ['patient_id']= $request->patient_id;
        $data ['date']= $request->date ;
        $data ['hospital_diag_id']= $request->hospital_diag_id ;
        $data['patient_history_id']=$request->patient_history_id ;
        $user = PatientDiagnosleHistory::create($data);
        return response()->json($data);
    }
    public function ubdet_test(request $request ,$id)
    {
        $data=PatientDiagnosleHistory:: where('id',$id)->first();
        $data->update([
            'lap_note'=>$request->lap_note??$data->note,
            'diag_price'=>$request->diag_price??$data->diag_price,
        ]);
        return response()->json($data);
    }

    public function get_test($id)
    {
        $data = PatientDiagnosleHistory::where('id' , $id)->first();
        return response()->json($data);
    }

}
