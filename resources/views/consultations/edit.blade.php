@extends('templates.default_layout')
@section('title', 'EDITER CONSULTATION')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-hospital-o"></em>
		</a></li>
		<li class="active">Consultations</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Modifier une Consulation</h1>
	    </div>
	</div><!--/.row-->
	@if ($message = Session::get('error'))
	    <div class="alert alert-danger">
		<p>{{ $message }}</p>
	    </div>
	@endif
	<form role="form" action="/consultations/{{$consultation->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>Patient  </label>
		<input class="form-control" name="patient_id" value="{{$consultation->patient_id}}" placeholder="Patient Id" required>
		<label> Payement</label>
		<input class="form-control" name="payement_id" value="{{$consultation->payement_id}}" placeholder="Payement" required>
		<label> Motif</label>
		<input class="form-control" name="motif" value="{{$consultation->motif}}" placeholder="Motif" required>
		<label>Antecedent</label>
		<input class="form-control" name="antecedent" value="{{$consultation->antecedent}}" placeholder="Maladie connue" required>
		<label>Motif de consulation </label>
		<input class="form-control" name="motif" value="{{$consultation->motif}}" placeholder="Motif de consultation" required>
		<label>Historique de la maladie</label>
		<input class="form-control" name="historique" value="{{$consultation->historique}}" placeholder="Historique de la maladie" required>
		<label>Examen Physique</label>
		<input class="form-control" name="examen_physique" value="{{$consultation->examen_physique}}" placeholder="Examen Physique" required>
		<label>Hypothese diagnostic </label>
		<input class="form-control" name="hypothese_dia" value="{{$consultation->hypothese_dia}}" placeholder="Hypothese dignostic" required>
		<label>Examen complentaire</label>
		<input class="form-control" name="examen_compl" value="{{$consultation->examen_compl}}" placeholder="Examen complentaire" required>
		<label>Taitement </label>
		<input class="form-control" name="traitement" value="{{$consultation->traitement}}" placeholder="Traitement" required>
	    </div>
	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>
		Modifier</button>
	</form>

@endsection
