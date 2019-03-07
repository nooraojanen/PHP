@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Kaikki opiskelijat</div>


<div class="panel-body">

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Sukunimi</th>
      <th scope="col">Etunimi</th>
      <th scope="col">Luontipvm</th>
    </tr>
  </thead>
  <tbody>

@foreach ($courses as $course)

    <tr class="bg-success">
      <th scope="row">{{ $course->id }}</th>
      <td>{{ $course->name }}</td>
      <td>{{ $course->credits }}</td>
	  <td>{{ $course->created_at }}</td>
    </tr>

@endforeach

  </tbody>
</table>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection