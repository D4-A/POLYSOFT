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
				<li class="active">Payements</li>
			</ol>
		</div><!--/.row--><br>
	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Payement des frais</h1>
			</div>
		</div><!--/.row-->
		<form role="form" action="{{url('payements')}}" method="post">
			@csrf
			<div class="form-group">
				<label style="padding-left:10px;">PatientID </label>
				<input class="form-control" name="patient_id" placeholder="PATIENT_ID" required><br>
				
				<label style="padding-left:10px;">Type de paiement </label>
				<select name="type_payement_id" id="type_payement_id" class="form-control" required><br>
					<option placeholder="" value="">Choisissez un Type de Paiement</option>
					
					@foreach($type_payements as $type_payement){
						<option value="{{$type_payement->id}}">{{$type_payement->name}}</option>
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
