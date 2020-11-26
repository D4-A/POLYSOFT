@extends('templates.default_layout')
@section('title', 'AJOUTER RE-VOUS')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
		<li>
		    <a href="#">
			<em class="fa fa-calendar"></em>
		    </a>
		</li>
		<li class="active">Rendez-Vous</li>
	    </ol>
	</div><!--/.row--><br>
	<form action="{{url('/rendezVous')}}" method="post">
	    @csrf
	    <div class="col-md-12" style="padding-bottom:30px;padding-top:20px;">	
		<script>
		 function getComboA() {
		     var med = document.getElementById('medecin');
		     var link = '/rendezVous/refresh/' + med.value;
		     document.getElementById("linkre").setAttribute("href", link);
		 }
		</script>
		<div class="col-lg-3">
		    <select class="form-control" name="medecin" id="medecin">
			<option value="">Choisir le Docteur</option>
			@foreach($users as $user)
			    <option value="{{$user->id}}"> {{$user->name}} {{$user->prenom}}</option>
			@endforeach
		    </select>
		</div>
		<div class="col-lg-2">
		    <a href="#" id="linkre">
			<button type="button"  onclick="getComboA()" class="btn btn-info">
			    <span class="glyphicon glyphicon-refresh" style="padding-right:8px;"> </span>Actualiser
			</button>
		    </a>
		</div>
	    </div>
	</form>
    </div>
@endsection
