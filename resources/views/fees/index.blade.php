@extends('layouts.master')
@section('content')


@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

<div class='container'>
<div align='center'>

<h1> School Fees </h1>
</div>
<form method="post" id="school-form" action="/" >
{{csrf_field()}}
<div class="form-group">
<input type='hidden' name='year' value='{{ $year }}'>
<label> School </label>
<select class="form-control" name="school" id="school" onchange="document.getElementById('school-form').submit()">
    @foreach ($schools as $schol)
      <option value="{{$schol->id}}" @if( $schol->id == $school) selected @endif >{{ $schol->type }}</option>
@endforeach
    </select>
    </div>
</form>

<form method="post" id="year-form" action="/" >
{{csrf_field()}}
<div class="form-group">
<input type='hidden' name='school' value='{{ $school }}'>

<label>Year </label>
<select class="form-control" name="year" id="year" onchange="document.getElementById('year-form').submit()">
    @foreach ($years as $yer)
      <option value="{{$yer->id}}" @if( $yer->id == $year) selected @endif >{{ $yer->year }}</option>
@endforeach
    </select>
   </div> 
</form>
<form method="post" action="/save">
{{csrf_field()}}
<input type='hidden' name='school' value='{{ $school }}'>
<input type='hidden' name='year' value='{{ $year }}'>
<table class="table">
<thead class="thead-dark">
<tr>
  <th > Grade </th>
@foreach ($fees as $fee)
  
  <th> {{$fee->type}} </th>
  @endforeach
</tr>
</thead>

@foreach ($grades as $grade)
  <tr>
  <th class="thead-dark"> {{ $grade->grade }} </th>
    @foreach($fees as $fee)
    @if (count ($data)==0)
    <input type='hidden' name='type' value='insert'>
  <td> <input type="number" min="0" value="0" step="0.01" name="ARRAY[{{$grade->id}} {{$fee->id}}]" > </td>
  @else
  <input type='hidden' name='type' value='update'>
@foreach($data as $val)
  @if(($val->grade_id == $grade->id)&&($val->fee_id == $fee->id ))
  <td> <input type="number" min="0" value="{{$val->fee}}" step="0.01" name="ARRAY[{{$grade->id}} {{$fee->id}}]" > </td>
  @endif
  @endforeach
  @endif
  @endforeach
</tr>
@endforeach


</table>
<div align='center'>
<input type="submit" value="Save" class="btn btn-success">
<input type="reset" value="Reset" class="btn btn-danger">
</div>
</form>
</div>
@endsection