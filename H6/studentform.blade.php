@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
        <h2 id="uploadhead">Uuden opiskelijan lisääminen</h2>
        <p>Kirjoita tiedot huolellisesti</p>
        <hr/>
            <form role="form" data-toggle="validator" method="POST" action="/storestudent">
                <div class="form-group row">
                    <div class="row">
                        <div class="form-group col-md-6 col-md-offset-1">
                        <input id="firstname" type="text" class="form-control" name="firstname" placeholder="Etunimi" required autofocus>
                        <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Sukunimi" required autofocus>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5 col-md-offset-1">
                        <button type="submit" class="btn btn-primary">
                            Tallenna
                        </button>
                    </div>
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection