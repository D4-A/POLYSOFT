@extends('templates.default_layout')
@section('title', 'AJOUT EXAMEN')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-upload"></em>
					</a>
				</li>
				<li class="active">Examens</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ajouter un Examen</h1>
			</div>
		</div><!--/.row--><br>
		@if ($message = Session::get('error'))
			<div class="alert alert-danger">
			<p>{{ $message }}</p>
			</div>
		@endif
		<form role="form" action="{{url('examens')}}" enctype="multipart/form-data" method="post">
			<div style="padding-bottom:30px;">
				@csrf
				<div class="form-group">
					<label style="padding-left:10px;">Nom Examen</label>
					<input class="form-control" name="nom" placeholder="Nom de l'examen" required><br>
					<label style="padding-left:10px;">ConsulationID</label>
					<input class="form-control" name="consultation_id" placeholder="Consultation_ID" required><br>
					<label style="padding-left:10px;">PaiementID</label>
					<input class="form-control" name="payment_id" placeholder="Paiement_ID" required><br>
					<label style="padding-left:10px;">Fichiers à ajouter</label>
					<input type="file" name="files[]" id="file" required multiple><br>
				</div>

				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-save" style="padding-right:8px;"> </span>Enregistrer
				</button>
			</div>
		</form>
	</div>
@endsection
