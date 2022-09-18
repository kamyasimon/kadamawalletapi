<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RegisterKadamaResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterKadamaController extends Controller
{
    //
    public function registerkadama(Request $request):RegisterKadamaResource
    {
        
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $nin = $request->input('nin');
        $homecontact = $request->input('homecontact');
       // $workcontact = $request->input('workcontact');
        $password = $request->input('password');
        $checkuser = User::where('homecontact',$homecontact)->get();
     //   dd($checkuser);
        if($checkuser->isEmpty()){
           // dd($checkuser);
            $registerUser = User:: Create([
                'firstname'=> $firstname,
                'lastname'=> $lastname,
                'nin'=> $nin,
                'homecontact'=>$homecontact,
                'password'=>Hash::make($password),
            ]);
            return new RegisterKadamaResource( $registerUser  );
        }else

         abort(404,'User Already Exists');

         }
    }
   
