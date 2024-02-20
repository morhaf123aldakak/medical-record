<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Doctor;
use App\Models\HospitalDep;
use App\Models\HospitalDiag;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function login(Request $request)
    {
        $data = $request->only('email' , 'password');

        if(Auth::attempt($data)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user,
            ]);
        }

        else{
            return response()->json('user not found' , 401);
        }
    }
    public function register_User( DoctorRequest $request)
    {

        $data = $request->validated();
        $user = User::create($data);
        if($request->type=='doctor' ){
            // $doc['hospital_dep_id']        = $request->hospital_dep_id;
            $doc['user_id']                = $user->id;
            $doc['visit_price']            = $request->visit_price;
            $doc['followup_price']         = $request->followup_price;
            $doc['inpatient_visit_price']  = $request->inpatient_visit_price;
            $doc['note']                   = $request->note;
            $doc['signature']              = $request->signature->store($request->first_name . '_image' , 'public');

            $doctor =Doctor::create($doc);
            return response()->json([$data , $doctor]);
        }
        if($request->type == 'secretary')
        {

            return response()->json($user);
        }
        if($request->type == 'specialest')
        {

            return response()->json($user);
        }
    }
    public function delete_secrtery($id)
    {
        $data=User::find($id);
        $data->delete();
        return response()->json('secrtery delete');
    }
    public function show_one_secr($id)
    {
        $data= User::where('id',$id)->first();
        return response()->json($data);
    }
    public function get_all_secr()
    {
        $data= User::where('type','secretary')->get();
        return response()->json($data);
    }

    public function get_all_specialest()
    {
        $data= User::where('type','specialest')->get();
        return response()->json($data);
    }

    public function numbers()
    {
        $dep=HospitalDep::count();
        $doctor=User::where('type','doctor')->count();
        $secr=User::where('type','secretary')->count();
        $lap=HospitalDiag::count();
        $spec=User::where('type','specialest')->count();
        return response()->json([$dep,$doctor,$secr,$lap,$spec]);
    }
    public function update_secr(Request $request,$id)
    {
        $data=User::where('id',$id)->first();
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
        return response()->json($data);
    }


}
