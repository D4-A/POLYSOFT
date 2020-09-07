@extends('templates.default_layout')
@section('title', 'CONSULTATION RE-VOUS')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
		<li><a href="#">
		    <em class="fa fa-hospital-o"></em>
		</a></li>
		<li class="active">Consultations</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Enregistre une Consultation</h1>
	    </div>
	</div><!--/.row-->
	@if ($message = Session::get('error'))
	    <div class="alert alert-danger">
		<p>{{ $message }}</p>
	    </div>
	@endif
	<form role="form" action="{{url('consultations')}}" method="post">
	    @csrf
	    <div class="form-group">
		<label>Patient  </label>
		<input class="form-control" name="patient_id" value="{{$patient_id}}" placeholder="Patient Id" readonly>
		<label> Payement</label>
		<input class="form-control" name="payement_id" value="{{$payement_id}}" placeholder="Payement" readonly>
		<label> Motif</label>
		<input class="form-control" name="motif" placeholder="Motif">
		<label>Antecedent</label>
		<input class="form-control" name="antecedent" placeholder="Maladie deja infecte">
		<label>Motif de consulation </label>
		<input class="form-control" name="motif" placeholder="Motif de consultation">
		<label>Historique de la maladie</label>
		<input class="form-control" name="historique" placeholder="Historique de la maladie">
		<label>Examen Physique</label>
		<input class="form-control" name="examen_physique" placeholder="Examen Physique">
		<label>Hypothese diagnostic </label>
		<input class="form-control" name="hypothese_dia" placeholder="Hypothese dignostic">
		<label>Examen complentaire</label>
		<input class="form-control" name="examen_compl" placeholder="Examen complentaire">
		<label>Taitement </label>
		<input class="form-control" name="traitement" placeholder="Traitement">
		<input type="hidden" name="rendezvous_id" value="{{$rendezvous_id}}">
	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>

		Enregistre</button>

	</form>
@endsection
