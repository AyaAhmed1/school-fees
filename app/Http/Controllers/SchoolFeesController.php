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
       return ($request);
       // $arr=$request->ARRAY.split(" ");
       // return $arr;
        
         foreach ($request->ARRAY as $field){
           //  dd($field->key);
             /*
            SchoolFees::create([
                'school_id'=>$request->school,
                'grade_id'=> 1,
                'year_id'=>$request->year,
                'fee_id'=>1,
                'fee'=>$field,
            ]);
            */
     }
     
     
  }

  public function find(){
      $show=SchoolFees::find(1);
      //return ($show->school->type);
      return view('fees.aya',[
          'data'=>$show
      ]);
  }
}