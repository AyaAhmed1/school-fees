<form method="post" action="/">
{{csrf_field()}}
School:
<select name="school">
    @foreach ($schools as $school)
      <option value="{{$school->id}}" >{{ $school->type }}</option>
@endforeach
    </select>

<br/>
Year:
<select name="year">
    @foreach ($years as $year)
      <option value="{{$year->id}}" >{{ $year->year }}</option>
@endforeach
    </select>
<table border="ipx solid black">
<tr>
  <th> Grade </th>
@foreach ($fees as $fee)
  
  <th> {{$fee->type}} </th>
  @endforeach
</tr>

@foreach ($grades as $grade)
  <tr>
  <td> {{ $grade->grade }} </td>
    @foreach($fees as $fee)
  <td> <input type="number" min="0" value="0" name="ARRAY[{{$grade->id}} {{$fee->id}}]" > </td>
  @endforeach
</tr>
@endforeach


</table>
<input type="submit" value="save">

</form>
