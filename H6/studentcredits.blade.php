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
      <th scope="col">Kurssi</th>
      <th scope="col">ECTS-pisteet</th>
      <th scope="col">Luontipvm</th>
    </tr>
  </thead>
  <tbody>

@foreach ($studentcredits as $studentcredit)

    <tr class="bg-success">
      <th scope="row">{{ $studentcredit->id }}</th>
      <td>{{ $studentcredit->Sukunimi }}</td>
      <td>{{ $studentcredit->Etunimi }}</td>
      <td>{{ $studentcredit->Kurssi }}</td>
      <td>{{ $studentcredit->credits }}</td>
	  <td>{{ $studentcredit->created_at }}</td>
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