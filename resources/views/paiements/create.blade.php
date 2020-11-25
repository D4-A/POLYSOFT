@extends('templates.default_layout')
@section('title', 'AJOUTER PAIEMENT')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-money"></em>
					</a>
				</li>
				<li class="active">Paiements</li>
			</ol>
		</div><!--/.row--><br>
	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Paiement des frais</h1>
			</div>
		</div><!--/.row-->
		@if ($message = Session::get('error'))
			        <div class="alert alert-danger">
			            <p>{{ $message }}</p>
			        </div>
		@endif
		<form role="form" action="{{url('paiements')}}" method="post">
			@csrf
			<div class="form-group">
				<label style="padding-left:10px;">PatientID </label>
				<input class="form-control" name="patient_id" placeholder="PATIENT_ID" required><br>
				<label style="padding-left:10px;">Type de paiement </label>
				<select name="type_paiement_id" id="type_paiement_id" class="form-control" required><br>
					<option placeholder="" value="">Choisissez un Type de Paiement</option>
					
					@foreach($type_paiements as $type_paiement){
						<option value="{{$type_paiement->id}}">{{$type_paiement->name}}</option>
					}
					@endforeach
				</select><br>
			</div>
				
			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-save" style="padding-right:8px;"> </span>Enregistrer
			</button>	
		</form>
	</div>

@endsection
