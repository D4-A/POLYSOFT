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
		<label>Etat </label>
		<select name="etat" id="etat" class="form-control">
                    <option value="">Choisissez un Etat</option>
		    <option value="pending">pending</option>
		    <option value="closed">close</option>
		</select>
	    </div>
	    
	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>
		
		Enregistre un rendez-vous</button>
	</form>
@endsection
