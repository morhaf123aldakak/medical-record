<?php

namespace App\Http\Controllers;

use App\Http\Requests\Diseases;
use App\Models\Disease;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PatientDiagnosleHistory;
use App\Models\PatientFollowup;
use App\Models\PatientHistory;
use App\Models\PatientOldHistory;
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
        $data = User::with('doctor', 'dep')->get();
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
        $data = Doctor::with('user')->where('id', $id)->first();
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
    public function update_doctor(Request $request, $id)
    {
        $data = User::with('doctor')->where('id', $id)->first();
        $data->update([
            'first_name' => $request->first_name ?? $data->first_name,
            'last_name' => $request->last_name ?? $data->last_name,
            'email' => $request->email ?? $data->email,
            'password' => $request->password ?? $data->password,
            'dob' => $request->dob ?? $data->dob,
            'gender' => $request->gender ?? $data->gender,
            'address' => $request->address ?? $data->address,
            'mobile' => $request->mobile ?? $data->mobile,
            'phone_num' => $request->phone_num ?? $data->phone_num,

        ]);
        $data->doctor->update([
            'visit_price' => $request->visit_price ?? $data->doctor->visit_price,
            'followup_price' => $request->followup_price ?? $data->doctor->followup_price,
            'inpatient_visit_price' => $request->inpatient_visit_price ?? $data->doctor->inpatient_visit_price,
            'note' => $request->note ?? $data->doctor->note,
        ]);
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_doctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        return response()->json('doctor delete');
    }
    public function nember_patient()
    {
        $user = auth()->user()->id;
        $doc = Doctor::where('user_id', $user)->first();
        $data = PatientHistory::where('doctor_id',  $doc->id)->count();
        return response()->json($data);
    }
    public function get_all_hestory()
    {
        $doctor_id = Doctor::where('user_id', auth()->user()->id)->first();

        $data = PatientHistory::with('patient', 'adms')->where('doctor_id', $doctor_id->id)->get();
        return response()->json($data);
    }
    public function data_doctor($id)
    {
        $data = PatientHistory::with('patient', 'adms', 'hestory', 'dsess','old_hestory')->where('id', $id)->get();
        return response()->json($data);
    }
    public function data(Request $request, $id)
    {
        //  $data= Patient::with('old','patient_histories')->where('id',$id)->first();

        $data = PatientHistory::where('patient_id', $id)->first();
        $data->update([
            'date' => $request->date ?? $data->date,
            'note' => $request->note ?? $data->note,
        ]);

        if ($request->chronic == 'true') {
            $old['old_disease']                 = $request->name;
            $old['old_medicines']            = $request->medicines;
            $old['patient_id']            = $id;
            PatientOldHistory::create($old);
        }

        $diss['name']                 = $request->name;
        $diss['symp']                = $request->symp;
        $diss['Feeling_sick_date']    = $request->Feeling_sick_date;
        $diss['medicines']            = $request->medicines;
        $diss['patient_history_id']   = $request->patient_history_id;
        Disease::create($diss);
        if ($request->follow == 'true') {
            $follow['date']                   = $request->date;
            $follow['note']                   = $request->note;
            $follow['total_price']            = $request->total_price;
            $follow['patient_history_id']    = $request->patient_history_id;
            PatientFollowup::create($follow);
        }
        return response()->json($diss);
    }
    public function ubdet_diagnosle(Request $request, $id)
    {
        $data = PatientDiagnosleHistory::first();
        $data->update([
            'date' => $request->date ?? $data->date,
            'note' => $request->note ?? $data->note,
            'hospital_diag_id' => $request->hospital_diag_id  ?? $data->hospital_diag_id,
        ]);
        return response()->json($data);
    }
    public function get_diagnoss($id)
    {
        $data = PatientDiagnosleHistory::find($id);
        return response()->json($data);
    }
    public function add_diagnoss(Request $request)
    {
        $data['date'] = $request->date;
        $data['note'] = $request->note;
        $data['hospital_diag_id'] = $request->hospital_diag_id;
        $data['patient_history_id'] = $request->patient_history_id;
        return response()->json($data);
    }
}
