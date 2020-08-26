@extends('templates.default_layout')
@section('title', 'AJOUTER CRENEAU')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-home"></em>
		</a></li>
		<li class="active">Creneaux</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">reservez un Creneau</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="{{url('creneaux')}}" method="post">
	    @csrf
	    <div class="form-group">
		<label>Creneau Name</label>
		<input class="form-control" name="name" placeholder="Name creneau" required>
		<label>Creneau Start at</label>
		<input type="datetime-local" class="form-control" name="start_time" placeholder="A partir de" required>
		<label>Creneau End at </label>
		<input type="datetime-local" class="form-control" name="end_time" placeholder="jusqu'a" required>
		<label class="radio-inline">
		    <input type="radio" name="ouvert" value="true" checked>Ouvert
		</label>
		<label class="radio-inline">
		    <input type="radio" name="ouvert" value="false"> Fermer
		</label>
	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>

		Enregistre un creneau</button>

	</form>
@endsection
