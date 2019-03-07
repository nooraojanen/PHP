@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">



            <div class="panel panel-default">
                <div class="panel-heading">
		<h3>My ScoreBoard</h3>
<blockquote>
<b>
@isset(Auth::user()->name)
{{ Auth::user()->name }}
@endisset
</b>
<br>
Kokonaispisteet: {{ $sumscorelist[0]->fpoints + 0 }} / {{ $totalsumscorelist[0]->maxpoints + 0 }} p.<br>

@if (floor((0.4 * ($totalsumscorelist[0]->maxpoints + 0)) - ($sumscorelist[0]->fpoints + 0) + 1) > 0)
	Opintojakson hyväksymiseen vaaditaan vielä: {{ floor((0.4 * ($totalsumscorelist[0]->maxpoints + 0)) - ($sumscorelist[0]->fpoints + 0) + 1)}} p.<br>
@else
    Opintojaksosi on hyväksytty! Lisäpisteet vaikuttavat arvosanaan!<br>
@endif

Harjoitustehtäväarvosana:   {{ number_format(($sumscorelist[0]->fpoints + 0) / ($totalsumscorelist[0]->maxpoints + 0) * 5, 2, '.', ' ') }}<br>



</blockquote>


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Tilanne nyt</th>
      <th scope="col">Kokonaistilanne</th>
    </tr>
  </thead>
<tbody>

  <tr class="bg-success">
      <th>Opettaja tarkistanut<span class="spnTooltip">Opettaja on tarkistanut ja hyväksynyt tämän verran pisteitä</span></th>
      <td>{{ $sumscorelist[0]->fpoints + 0 }} / {{ $sumscorelist[0]->mpoints + 0 }} </td>
      <td>{{ $sumscorelist[0]->fpoints + 0 }} / {{ $totalsumscorelist[0]->maxpoints + 0 }}</td>
  </tr>

  <tr class="bg-success">
      <th>Kaikki palautetut</th>
      <td>{{ number_format($pendingsumscorelist[0]->ipoints + $sumscorelist[0]->ipoints + 0, 0, '.', ' ') }} / {{ $pendingsumscorelist[0]->mpoints + $sumscorelist[0]->mpoints + 0 }}</td>
      <td>{{ $pendingsumscorelist[0]->mpoints + $sumscorelist[0]->mpoints + 0 }} / {{ $totalsumscorelist[0]->maxpoints + 0 }}</td>
  </tr>

  <tr class="bg-success">
      <th>Arviointia odottaa</th>
      <td>{{ number_format($pendingsumscorelist[0]->ipoints + 0, 0, '.', ' ') }} / {{ $pendingsumscorelist[0]->mpoints + 0 }}</td>
      <td>{{ $pendingsumscorelist[0]->mpoints + 0 }} / {{ $totalsumscorelist[0]->maxpoints + 0 }}</td>
  </tr>









  </tbody>
</table>



<h4>Yksittäiset tehtävät</h4>

         </div>
                <div class="panel-body">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nimi</th>
      <th scope="col">Harj/Teht</th>
      <th scope="col">URL</th>
      <th scope="col">Ehdotettu</th>
      <th scope="col">Kirjattu</th>
      <th scope="col">Max</th>
    </tr>
  </thead>
  <tbody>

@foreach ($allscorelist as $sc)

    <tr class="bg-success">
      <th>{{ $sc->name }}</th>
      <td>H{{ $sc->hnro }}&nbsp;&nbsp;&nbsp; T{{ $sc->tnro }}</td>
      <td><a href="{{ $sc->url }}">Ratkaisu</a></td>


      @if($sc->initpoints == $sc->finalpoints OR ($sc->finalpoints === null) )
      <td>{{ $sc->initpoints }}</td>
      @else
        <td class="alert alert-danger" role="alert">{{ $sc->initpoints }}
        	<span class="spnTooltip">{{ $sc->kommentti }}</span>
        </td>
      @endif





      @if($sc->initpoints == $sc->finalpoints  OR ($sc->finalpoints === null))

	      @if($sc->finalpoints === null)
		      <td>Processing...</td>
	      @else
		      <td>{{ $sc->finalpoints }}
                                @if($sc->kommentti != null) <span class="spnTooltip">{{ $sc->kommentti }}</span>@endif
			</td>
	      @endif
      @else
        <td class="alert alert-danger" role="alert">{{ $sc->finalpoints }}
                <span class="spnTooltip">{{ $sc->kommentti }}</span>
        </td>
      @endif
      <td>{{ $sc->maxpist }}</td>



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