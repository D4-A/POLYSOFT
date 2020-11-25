@extends('templates.default_layout')
@section('title', 'EDITER PAIEMENT')
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
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Modifier un paiement</h1>
			</div>
		</div><!--/.row--><br>
		
		<form role="form" action="/paiements/{{$paiement->id}}" method="post">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label style="padding-left:10px;">PatientID</label>
				<input class="form-control" name="patient_id" value="{{$paiement->patient_id}}" placeholder="PATIENT_ID" required><br>

				<label style="padding-left:10px;">Type de paiement</label>
				<select name="type_paiement_id" id="type_paiement_id" class="form-control" required><br>
				    @foreach($type_paiements as $type_paiement){
					@if($type_paiement->id === $paiement->type_paiement_id)
					    <option value="{{$type_paiement->id}}" selected>{{$type_paiement->name}}</option>
					@else
					    <option value="{{$type_paiement->id}}">{{$type_paiement->name}}</option>
					@endif
					}
				    @endforeach
				</select><br>
			</div>

			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-saved" style="padding-right:8px;"> </span>Modifier
			</button>
		</form>
	</div>

@endsection
