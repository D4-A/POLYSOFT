@extends('templates.default_layout')
@section('title', 'AFFICHER CONSULTATION')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
		    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
			<li><a href="#">
			    <em class="fa fa-home"></em>
			</a></li>
			<li class="active">Consultations</li>
		    </ol>
		</div><!--/.row-->

		<div class="row">
		    <div class="col-lg-12">
			<h1 class="page-header">Consultation - <strong>CONS {{$consultation->id}}</strong></h1>
		    </div>
		</div><!--/.row--><br>

		<div class="row" style="padding-left:50px;padding-top:20px;">
		    <div class="card-body">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group row">
						<div class="col-md-3">
							Motif:
						</div>
						<div class="col-md-3">
							<strong>{{ $consultation->motif }}</strong>
						</div>
					</div>
				</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group row">
					<div class="col-md-3">
						Historique maladie:
					</div>
					<div class="col-md-6">
						<strong>{{ $consultation->historique }}</strong>
					</div>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group row">
					<div class="col-md-3">
						Antécedents:
					</div>
					<div class="col-md-6">
						<strong>{{ $consultation->antecedent }}</strong>
					</div>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group row">
					<div class="col-md-3">
						Examens physiques:
					</div>
					<div class="col-md-6">
						<strong>{{ $consultation->examen_physique }}</strong>
					</div>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group row">
					<div class="col-md-3">
						Diagnostic:
					</div>
					<div class="col-md-6">
						<strong>{{ $consultation->hypothese_dia }}</strong>
					</div>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group row">
					<div class="col-md-3">
						Examens complémentaires:
					</div>
					<div class="col-md-6">
						<strong>{{ $consultation->examen_compl }}</strong>
					</div>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group row">
					<div class="col-md-3">
						Traitement:
					</div>
					<div class="col-md-6">
						<strong>{{ $consultation->traitement }}</strong>
					</div>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group row">
					<div class="col-md-3">
						Examens Faits:
					</div>
					<div class="col-md-6">
						@if($files === null)
						<strong> Aucun Examen Ajouter</strong>
						@else
						@foreach($files as $file)
							<strong>
							<a href='{{url('download/' . $file)}}'> {{basename($file)}}</a>
							</strong></br>
						@endforeach
						@endif
					</div>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12" style="padding-top:20px;">
			    <a class="btn btn-primary" href="{{ url('consultations') }}">
					<span class="glyphicon glyphicon-remove" style="padding-right:8px;"> </span>RETOUR
				</a>
			</div>
		</div>

	</div>
@endsection
