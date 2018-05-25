<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Grade;
use App\Fee;
use App\Year;
use App\SchoolFees;

class SchoolFeesController extends Controller
{
    public function  index(){
      $schools=School::all();
      $grades=Grade::all();
      $years=Year::all();
      $fees=Fee::all();
      return view('fees.index',[
        'schools'=> $schools,
        'grades'=>$grades,
        '$years'=>$years,
        'fees' => $fees
      ]);
    }
}
