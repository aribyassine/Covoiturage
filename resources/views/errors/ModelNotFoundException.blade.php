@extends('app')

@section('content')
<style>
body{
    background-color: #ffffff;
}
</style>
<div class="container">
    <div class="row">
        <div class="jumbotron text-center">
          <h1>404 !</h1>
          @if ($model == "Covoiturage")
            <h3>Adresse introuvable, ce covoiturage n'éxiste pas</h3>
          @elseif($model == "User")
            <h3>Adresse introuvable, ce profil n'éxiste pas</h3>
          @else
            <h3>Adresse introuvable, cette page n'éxiste pas</h3>
          @endif
          <a class="btn btn-primary btn-lg" href="{{redirect()->back()->getTargetUrl()}}" role="button">Retour à la page précédente</a></p>
        </div>
    </div>
</div>

@endsection