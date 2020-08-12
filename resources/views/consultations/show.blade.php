@extends('templates.default_layout')
@section('title', 'Afficher une consulation')
@section('content')

    <!DOCTYPE html>
    <html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Polyclinique du Nord</title>
	</head>
	<body>
	    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
		    <ol class="breadcrumb">
			<li><a href="#">
			    <em class="fa fa-home"></em>
			</a></li>
			<li class="active">Consultations</li>
		    </ol>
		</div><!--/.row-->

		<div class="row">
		    <div class="col-lg-12">
			<h1 class="page-header">Consultations no: {{$consultation->id}}</h1>
		    </div>
		</div><!--/.row-->
		<div class="row justify-content-center">
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
				    Histoire maladie:
				</div>
				<div class="col-md-6">
				    <strong>{{ $consultation->historique }}</strong>
				</div>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group row">
				<div class="col-md-3">
				    Antecedent:
				</div>
				<div class="col-md-6">
				    <strong>{{ $consultation->antecedent }}</strong>
				</div>
			    </div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <div class="form-group row">
				<div class="col-md-3">
				    Examen physique:
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
				    Examen complémentaire:
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
				    Examen Fait:
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
			<div class="col-xs-12 col-sm-12 col-md-12">
			    <a class="btn btn-primary col-md-12" href="{{ url('consultations') }}">RETOUR</a>
			</div>
		    </div>

		</div>
	    </div>
	    </div>
	    </div>
	</body>
    </html>
@endsection
