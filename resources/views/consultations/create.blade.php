@extends('templates.default_layout')
@section('title', 'AJOUTER CONSULTATION')
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
			<h1 class="page-header">Enregistrer une consultation</h1>
			</div>
		</div><!--/.row--><br>
		
		@if ($message = Session::get('error'))
			<div class="alert alert-danger">
			<p>{{ $message }}</p>
			</div>
		@endif
		<form role="form" action="{{url('consultations')}}" method="post">
			<div style="padding-bottom:30px;">
				@csrf
				<div class="form-group">
					<label style="padding-left:10px;">PatientID</label>
					<input class="form-control" name="patient_id" placeholder="PATIENT_ID" required><br>
					<label style="padding-left:10px;"> PaiementID</label>
					<input class="form-control" name="paiement_id" placeholder="PAIEMENT_ID" required><br>
					<label style="padding-left:10px;">Motif de consulation </label>
					<textarea class="form-control" name="motif" cols="20" rows="5" placeholder="Motif de consultation" required></textarea><br>
					<label style="padding-left:10px;">Historique de la maladie</label>
					<textarea class="form-control" name="historique" cols="20" rows="5" placeholder="Historique de la maladie" required></textarea><br>
					<label style="padding-left:10px;">Antécedent</label>
					<input class="form-control" name="antecedent" placeholder="Autres maladies connues" required><br>
					<label style="padding-left:10px;">Examens Physiques</label>
					<textarea class="form-control" name="examen_physique" cols="20" rows="5" placeholder="Examens Physiques" required></textarea><br>
					<label style="padding-left:10px;">Hypothèse diagnostic </label>
					<input class="form-control" name="hypothese_dia" placeholder="Hypothèse dignostic" required><br>
					<label style="padding-left:10px;">Examens complémentaires</label>
					<textarea class="form-control" name="examen_compl" cols="20" rows="5" placeholder="Examens complémentaires" required></textarea><br>
					<label style="padding-left:10px;">Taitement</label>
					<textarea class="form-control" name="traitement" cols="20" rows="5" placeholder="Traitement" required></textarea><br>
				</div>

				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-save" style="padding-right:8px;"> </span> Enregistrer
				</button>
			</div>
		</form>
	</div>

@endsection
