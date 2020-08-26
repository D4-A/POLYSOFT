@extends('templates.default_layout')
@section('title', 'EDITER PATIENT')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-users"></em>
		</a></li>
		<li class="active">Patients</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Modifier Patients</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="/patients/{{$patient->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>Nom  </label>
		<input class="form-control" name="nom" value="{{$patient->nom}}" placeholder="Nom patient" required>
		<label>Prenom </label>
		<input class="form-control" name="prenom" value="{{$patient->prenom}}" placeholder="prenom du patient" required>
		<label>Genre  </label>
		<input class="form-control" name="genre" value="{{$patient->genre}}" placeholder="Genre du patient" required>
	<label>Annee de naissance </label>
		<input class="form-control" name="ans_naiss" value="{{$patient->ans_naiss}}" placeholder="Annee de naissance du patient" required>
		<label>Profession </label>
		<input class="form-control" name="profession" value="{{$patient->profession}}" placeholder="Profession du patient" required>
		<label>Adresse  </label>
		<input class="form-control" name="adresse" value="{{$patient->adresse}}" placeholder="Adresse du patient" required>
		<label>Telephone </label>
		<input class="form-control" name="tel" value="{{$patient->tel}}" placeholder="Telephone du patients" required>
		<label>Email  </label>
		<input class="form-control" name="email" value="{{$patient->email}}" placeholder="Email du patient" required>
		<label>CNI  </label>
		<input class="form-control" name="cni" value="{{$patient->cni}}" placeholder="Cni du patient" required>
	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>

		Modifier</button>

	</form>

@endsection
