@extends('templates.default_layout')
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
		<h1 class="page-header">Upload an Examen</h1>
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
		<input class="form-control" name="consultation_id" placeholder="Consultation ID">
		<label>Nom</label>
		<input class="form-control" name="nom" placeholder="User examen">
		<label>files to upload </label>
		<input type="file" name="files[]" id="file" required multiple>

	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>

		Enregistre</button>

	</form>

@endsection
