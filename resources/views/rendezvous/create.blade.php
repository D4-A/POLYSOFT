@extends('templates.default_layout')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-calendar"></em>
		</a></li>
		<li class="active">Rendez-vous</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Prendre un Rendez-vous</h1>
	    </div>
	</div><!--/.row-->
	@if ($message = Session::get('error'))
	    <div class="alert alert-danger">
		<p>{{ $message }}</p>
	    </div>
	@endif
	<form role="form" action="{{url('rendezVous')}}" method="post">
	    @csrf
	    <div class="form-group">
		<label>Patient ID</label>
		<input class="form-control" name="patient_id" placeholder="Patient ID">
		<label>Payement ID</label>
		<input class="form-control" name="payement_id" placeholder="Payement ID">
		
		<label>Creneau ID</label>
		<input class="form-control" name="creneau_id" placeholder="Creneau ID">
		<label>Title</label>
		<input class="form-control" name="title" placeholder="Title">
		<label>Description</label>
		<input class="form-control" name="description" placeholder="Creneau ID">
	    </div>
	    
	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>
		
		Enregistre un rendez-vous</button>
	</form>
@endsection
