<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\LoginResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    //
    public function getuser(Request $request):LoginResource
    {

        $homecontact = $request->input('homecontact');
        $password = $request->input('password');
/////Validate Input Data
        $request->validate([
            'homecontact' => 'required',
            'password'=>'required'
        ]);
        
        $getkey=$request->only('homecontact','password');

        $kadama = User::where('homecontact',$homecontact)->get();
              //  dd(Hash::check($getkey['password'],$kadama[0]-> password));
            if( [$getkey['homecontact'],$kadama[0]-> homecontact] && Hash::check($getkey['password'],$kadama[0]-> password) ){
               Session::put('open','you are logged in');
                return new LoginResource( $kadama  );
            }else{
                abort(404, 'Wrong Credentials');
            }
    }
}
