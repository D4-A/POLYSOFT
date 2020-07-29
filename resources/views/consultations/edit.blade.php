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
		<h1 class="page-header">Modifier Service</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="/consultations/{{$consultation->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>User </label>
		<input class="form-control" name="user_id" value="{{$consultation->user_id}}" readonly placeholder="User qui fait la consulation">
		<label>Patient  </label>
		<input class="form-control" name="patient_id" value="{{$consultation->patient_id}}" placeholder="Patient Id">
		<label> Payement</label>
		<input class="form-control" name="payement_id" value="{{$consultation->payement_id}}" placeholder="Payement">
		<label> Motif</label>
		<input class="form-control" name="motif" value="{{$consultation->motif}}" placeholder="Motif">
		<label>Antecedent</label>
		<input class="form-control" name="antecedent" value="{{$consultation->antecedent}}" placeholder="Maladie deja infecte">
		<label>Motif de consulation </label>
		<input class="form-control" name="motif" value="{{$consultation->motif}}" placeholder="Motif de consultation">
		<label>Historique de la maladie</label>
		<input class="form-control" name="historique" value="{{$consultation->historique}}" placeholder="Historique de la maladie">
		<label>Examen Physique</label>
		<input class="form-control" name="examen_physique" value="{{$consultation->examen_physique}}" placeholder="Examen Physique">
		<label>Hypothese diagnostic </label>
		<input class="form-control" name="hypothese_dia" value="{{$consultation->hypothese_dia}}" placeholder="Hypothese dignostic">
		<label>Examen complentaire</label>
		<input class="form-control" name="examen_compl" value="{{$consultation->examen_compl}}" placeholder="Examen complentaire">
		<label>Taitement </label>
		<input class="form-control" name="traitement" value="{{$consultation->traitement}}" placeholder="Traitement">
	    </div>
	    
	    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Modifier</button>
		    
	</form>
</body>
</html>


@endsection
