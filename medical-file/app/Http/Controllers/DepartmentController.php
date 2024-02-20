<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use App\Models\HospitalDep;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dept_index()
    {

        $data= HospitalDep::all();
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
    public function Dept_store(DepartmentRequest $request)
    {
        $data=$request->validated();
        HospitalDep::create($data);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show_one_dept(string $id)
    {
        $data=HospitalDep::where('id',$id)->first();
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
    public function update_depa(Request $request,$id)
    {
        $data=HospitalDep::where('id',$id)->first();
        $data->update([
        'name'=>$request->name ?? $data->name,
        'phone'=>$request->phone??$data->phone,
        'email'=>$request->email??$data->email,
        'address'=>$request->address??$data->address,
        'note'=>$request->note??$data->note,

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
}
