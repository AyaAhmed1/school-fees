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
      $school=1;
      $year=1;
      $data=SchoolFees::select('grade_id','fee_id','fee')->where('school_id',$school)->where('year_id',$year)->get();
      return view('fees.index',[
        'schools'=> $schools,
        'grades'=>$grades,
        'fees' => $fees,
        'years'=>$years,
        'data'=>$data,
        'school'=>$school,
        'year'=>$year
      ]);
    }
public function select(Request $request){
  $school=$request->school;
  $year=$request->year;
  $schools=School::all();
  $grades=Grade::all();
  $years=Year::all();
  $fees=Fee::all();
  $data=SchoolFees::select('grade_id','fee_id','fee')->where('school_id',$school)->where('year_id',$year)->get();
 return view('fees.index',[
    'schools'=> $schools,
    'grades'=>$grades,
    'fees' => $fees,
    'years'=>$years,
    'data'=>$data,
    'school'=>$school,
    'year'=>$year
  ]);
}
    public function store(Request $request){
      if ($request->type== 'insert'){
      if($request->ARRAY){
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
  else {
    foreach ($request->ARRAY as $field=>$val){
      $f_key=explode(" ",$field);
      $grade_id=$f_key[0];
      $fee_id=$f_key[1];
      SchoolFees::where('grade_id',$grade_id)
      ->where('fee_id',$fee_id)
      ->where('school_id',$request->school)
      ->where('year_id',$request->year)
      ->update( ['fee'=>$val ]);
   }
   return redirect()->back()->with('alert','Successfully Updated!');

  }
 }
}