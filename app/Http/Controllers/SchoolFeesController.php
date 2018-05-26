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
        'fees' => $fees,
        'years'=>$years
      ]);
    }

    public function store(Request $request){
      foreach ($request->ARRAY as $field=>$val){
          $f_key=explode(" ",$field);
          $grade_id=$f_key[0];
          $fee_id=$f_key[1];
            SchoolFees::create([
                'school_id'=>$request->school,
                'grade_id'=> $grade_id,
                'year_id'=>$request->year,
                'fee_id'=>$fee_id,
                'fee'=>$val,
            ]);
     }
     return redirect()->back()->with('alert', 'Successfully inserted!');
  }
}