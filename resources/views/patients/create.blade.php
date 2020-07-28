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
		<li class="active">Home</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Add Patients</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="{{url('patients')}}" method="post">
	    @csrf
	    <div class="form-group">
		<label>Nom du Patient </label>
		<input class="form-control" name="nom" placeholder="Nom patient">
		<label>Prenom du Patient</label>
		<input class="form-control" name="prenom" placeholder="Age du patient">
		<label>Genre du Patient </label>
		<input class="form-control" name="genre" placeholder="Genre du patient">
		<label>Age du Patient</label>
		<input class="form-control" name="age" placeholder="Age du patient">
		<label>Profession du Patient</label>
		<input class="form-control" name="profession" placeholder="Profession du patient">
		<label>Adresse du Patient </label>
		<input class="form-control" name="adresse" placeholder="Adresse du patient">
		<label>Telephone du Patient</label>
		<input class="form-control" name="tel" placeholder="Telephone du patients">
		<label>Email du Patient </label>
		<input class="form-control" name="email" placeholder="Email du patient">
		<label>CNI du Patient </label>
		<input class="form-control" name="cni" placeholder="Cni du patient">
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Enregistre</button>
		    
	</form>
</body>
</html>


@endsection