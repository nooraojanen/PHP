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
      <th scope="col">Sukunimi Etunimi</th>
      <th scope="col">Luontipvm</th>
    </tr>
  </thead>
  <tbody> 

@foreach ($students as $student)

    <tr class="bg-success">
      <th scope="row">{{ $student->id }}</th>
      <td><a href="/studentcredits?id={{ $student->id }}">{{ $student->lastname }} {{ $student->firstname }}</a></td>
	  <td>{{ $student->created_at }}</td>
    </tr>

@endforeach

  </tbody>
</table>
{{$students -> links()}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection