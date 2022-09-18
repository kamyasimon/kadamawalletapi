<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditures extends Model
{
    protected $table = "expenditures";
    protected $fillable = [
            'service',
            'servicecard',
            'transactionamount',
            'recepientcontact',
            'fkuser'
    ];
}