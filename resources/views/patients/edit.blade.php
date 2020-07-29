@extends('templates.default_layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metalusa</title>
</head>
<body>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-home"></em>
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
		<label>Nom du Patient </label>
		<input class="form-control" name="nom" value="{{$patient->nom}}" placeholder="Nom patient">
		<label>Prenom du Patient</label>
		<input class="form-control" name="prenom" value="{{$patient->prenom}}" placeholder="prenom du patient">
		<label>Genre du Patient </label>
		<input class="form-control" name="genre" value="{{$patient->genre}}" placeholder="Genre du patient">
		<label>Age du Patient</label>
		<input class="form-control" name="age" value="{{$patient->age}}" placeholder="Age du patient">
		<label>Profession du Patient</label>
		<input class="form-control" name="profession" value="{{$patient->profession}}" placeholder="Profession du patient">
		<label>Adresse du Patient </label>
		<input class="form-control" name="adresse" value="{{$patient->adresse}}" placeholder="Adresse du patient">
		<label>Telephone du Patient</label>
		<input class="form-control" name="tel" value="{{$patient->tel}}" placeholder="Telephone du patients">
		<label>Email du Patient </label>
		<input class="form-control" name="email" value="{{$patient->email}}" placeholder="Email du patient">
		<label>CNI du Patient </label>
		<input class="form-control" name="cni" value="{{$patient->cni}}" placeholder="Cni du patient">
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Modifier</button>
		    
	</form>
</body>
</html>


@endsection
