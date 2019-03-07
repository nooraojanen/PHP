@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-4">



            <div class="panel panel-default">
                <div class="panel-heading">Ilmoita harjoituspisteet</div>

                <div class="panel-body">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Valitse</th>
      <th scope="col">Viimeinen palautuspvm</th>
    </tr>
  </thead>
  <tbody>

@foreach ($harkat as $harkka)
    <tr class="bg-success">
      <td><a href="/addscoreform?id={{ $harkka->nro }} ">{{ $harkka->kuvaus }}</a></td>
      <td>{{ $harkka->palautuspvm }}</td>
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