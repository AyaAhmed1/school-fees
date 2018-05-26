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
<form method="post" action="/">
{{csrf_field()}}

<div class="form-group">
<label> School </label>
<select class="form-control" name="school">
    @foreach ($schools as $school)
      <option value="{{$school->id}}" >{{ $school->type }}</option>
@endforeach
    </select>
    </div>

<div class="form-group">
<label>Year </label>
<select class="form-control" name="year">
    @foreach ($years as $year)
      <option value="{{$year->id}}" >{{ $year->year }}</option>
@endforeach
    </select>
   </div> 


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
  <td> <input type="number" min="0" value="0" step="0.5" name="ARRAY[{{$grade->id}} {{$fee->id}}]" > </td>
  @endforeach
</tr>
@endforeach


</table>
<input type="submit" value="Save" class="btn btn-success">
<input type="reset" value="Reset" class="btn btn-danger">

</form>
</div>
@endsection