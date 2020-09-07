@extends('templates.default_layout')
@section('title', 'EDITER RE-VOUS')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-calendar"></em>
					</a>
				</li>
				<li class="active">Rendez-vous</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
			<h1 class="page-header">Modifier Rendez-Vous</h1>
			</div>
		</div><!--/.row-->
		@if ($message = Session::get('error'))
			<div class="alert alert-danger">
			<p>{{ $message }}</p>
			</div>
		@endif
		<form role="form" action="/rendezVous/{{$rendezvous->id}}" method="post">
		<div class="col-md-12" style="padding-bottom:30px;">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label style="padding-left:10px;">Patient ID</label>
				<input class="form-control" name="patient_id" value="{{$rendezvous->patient_id}}" placeholder="Patient_ID" required><br>
				<label style="padding-left:10px;">Paiement ID</label>
				<input class="form-control" name="payement_id" value="{{$rendezvous->payement_id}}" placeholder="Paiement_ID" required><br>

				<label style="padding-left:10px;">Créneau ID</label>
				<input class="form-control" name="creneau_id" value="{{$rendezvous->creneau_id}}" placeholder="Créneau_ID" required><br>
				<label style="padding-left:10px;">Description</label>
				<input class="form-control" name="description" value="{{$rendezvous->description}}" placeholder="Description_R-V"><br>
				<label style="padding-left:10px;">Etat </label>
				<select name="etat" id="etat" class="form-control">
					<option {{ old('etat',$rendezvous->etat) == "" ? 'selected':'' }}  value="">Choisissez un Etat</option>
					<option {{ old('etat',$rendezvous->etat) == "pending" ? 'selected':'' }}  value="pending">pending</option>
					<option {{ old('etat',$rendezvous->etat) == "closed" ? 'selected':'' }}  value="closed">closed</option>
				</select>
			</div><br>

			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-saved" style="padding-right:8px;"> </span>Modifier
			</button>
			</div>
		</form>
	</div>
@endsection
