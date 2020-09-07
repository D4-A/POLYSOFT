@extends('templates.default_layout')
@section('title', 'EDITER CONSULTATION')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
				<a href="#">
					<em class="fa fa-hospital-o"></em>
				</a>
				</li>
				<li class="active">Consultations</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
			<h1 class="page-header">Modifier une consulation</h1>
			</div>
		</div><!--/.row--><br>
		
		@if ($message = Session::get('error'))
			<div class="alert alert-danger">
			<p>{{ $message }}</p>
			</div>
		@endif

		<form role="form" action="/consultations/{{$consultation->id}}" method="post">
			<div style="padding-bottom:30px;">
				@csrf
				@method('PUT')
				<div class="form-group">
				<label style="padding-left:10px;">PatientID</label>
				<input class="form-control" name="patient_id" value="{{$consultation->patient_id}}" placeholder="PATIENT_ID" required><br>
				<label style="padding-left:10px;"> PaiementID</label>
				<input class="form-control" name="payement_id" value="{{$consultation->payement_id}}" placeholder="PAIEMENT_ID" required><br>
				<label style="padding-left:10px;"> Motif de consultation</label>
				<input class="form-control" name="motif" value="{{$consultation->motif}}" placeholder="Motif de consultation" required><br>
				<label style="padding-left:10px;">Historique de la maladie</label>
				<input class="form-control" name="historique" value="{{$consultation->historique}}" placeholder="Historique de la maladie" required><br>
				<label style="padding-left:10px;">Antécedent</label>
				<input class="form-control" name="antecedent" value="{{$consultation->antecedent}}" placeholder="Autres maladies connues" required><br>
				<label style="padding-left:10px;">Examens Physiques</label>
				<input class="form-control" name="examen_physique" value="{{$consultation->examen_physique}}" placeholder="Examens Physiques" required><br>
				<label style="padding-left:10px;">Hypothèse diagnostic </label>
				<input class="form-control" name="hypothese_dia" value="{{$consultation->hypothese_dia}}" placeholder="Hypothèse dignostic" required><br>
				<label style="padding-left:10px;">Examens complémentaires</label>
				<input class="form-control" name="examen_compl" value="{{$consultation->examen_compl}}" placeholder="Examens complémentaires" required><br>
				<label style="padding-left:10px;">Taitement </label>
				<input class="form-control" name="traitement" value="{{$consultation->traitement}}" placeholder="Traitement" required><br>
				</div>
				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-saved" style="padding-right:8px;"> </span>	Modifier
				</button>
			</div>
		</form>
	</div>
@endsection
