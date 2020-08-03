@extends('templates.default_layout')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-calendar"></em>
		</a></li>
		<li class="active">Fonctions</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Modifier Un creneau</h1>
	    </div>
	</div><!--/.row-->
	@if ($message = Session::get('error'))
	    <div class="alert alert-danger">
		<p>{{ $message }}</p>
	    </div>
	@endif
	<form role="form" action="/rendezVous/{{$rendezvous->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>Patient ID</label>
		<input class="form-control" name="patient_id" value="{{$rendezvous->patient_id}}" placeholder="Patient ID">
		<label>Payement ID</label>
		<input class="form-control" name="payement_id" value="{{$rendezvous->payement_id}}" placeholder="Payement ID">

		<label>Creneau ID</label>
		<input class="form-control" name="creneau_id" value="{{$rendezvous->creneau_id}}" placeholder="Creneau ID">
		<label>Title</label>
		<input class="form-control" name="title" value="{{$rendezvous->title}}" placeholder="Title">
		<label>Description</label>
		<input class="form-control" name="description" value="{{$rendezvous->description}}" placeholder="Creneau ID">
		<label>Etat </label>
		<select name="etat" id="etat" class="form-control">
                    <option {{ old('etat',$rendezvous->etat) == "" ? 'selected':'' }}  value="">Choisissez un Etat</option>
		    <option {{ old('etat',$rendezvous->etat) == "pending" ? 'selected':'' }}  value="pending">pending</option>
		    <option {{ old('etat',$rendezvous->etat) == "closed" ? 'selected':'' }}  value="closed">closed</option>
		</select>
	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>

		Modifier</button>
	</form>
@endsection
