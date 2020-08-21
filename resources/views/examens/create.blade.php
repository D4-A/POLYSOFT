@extends('templates.default_layout')
@section('title', 'Ajout d\'un examen')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-upload"></em>
		</a></li>
		<li class="active">Examens</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Ajouter un examen</h1>
	    </div>
	</div><!--/.row-->
	@if ($message = Session::get('error'))
	    <div class="alert alert-danger">
		<p>{{ $message }}</p>
	    </div>
	@endif
	<form role="form" action="{{url('examens')}}" enctype="multipart/form-data" method="post">
	    @csrf
	    <div class="form-group">
		<label>Consulation ID</label>
		<input class="form-control" name="consultation_id" placeholder="Consultation ID" required>
		<label>Nom de l'examen</label>
		<input class="form-control" name="nom" placeholder="User examen" required>
		<label>fichiers a ajouter</label>
		<input type="file" name="files[]" id="file" required multiple>
	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>
		Enregistre</button>
	</form>

@endsection
