@extends('templates.default_layout')
@section('title', 'Editer un examen')
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
		<h1 class="page-header">Modifier Examen</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="/examens/{{$examen->id}}"  enctype="multipart/form-data" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>User ID</label>
		<input class="form-control" name="user_id" value="{{$examen->consultation_id}}" placeholder="User examen" required>
		<label>Consulation ID</label>
		<input class="form-control" name="consultation_id" value="{{$examen->user_id}}" placeholder="Consultation ID" required>
		<label>Nom</label>
		<input class="form-control" name="nom" value="{{$examen->nom_examen}}" placeholder="User examen" required>
		<label>files to upload </label>
		<input type="file" name="files[]" id="file" required multiple>

	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>

		Modifier</button>

	</form>
@endsection
