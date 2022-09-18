<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ExpendituresResource;
use App\Models\Expenditures;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ExpendituresController extends Controller
{
    //
    public function buyyaka (Request $request):ExpendituresResource
    {
        $request->validate([
            'service' => 'required',
            'servicecard' => 'required',
            'transactionamount'=>'required',
            'recepientcontact'=>'required',
            'fkuserid'=>'required'
        ]);

        $createbill = Expenditures::Create([
            'service' => $request->input('service'),
            'servicecard' => $request->input('servicecard'),
            'transactionamount'=> $request->input('transactionamount'),
            'recepientcontact'=> $request->input('recepientcontact'),
            'fkuser'=> $request->input('fkuserid')
        ]);

            if($createbill->isEmpty){
                return new ExpendituresResource(['FAILED']);
            }else{
                return new ExpendituresResource(['SUCCESS']);
            }

       
      
    }
}
