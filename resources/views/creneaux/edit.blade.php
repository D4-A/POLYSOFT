@extends('templates.default_layout')
@section('title', 'EDITER CRENEAU')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-home"></em>
		</a></li>
		<li class="active">Fonctions</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Modifier Un creneau</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="/creneaux/{{$creneau->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>Creneau Name</label>
		<input class="form-control" name="name" value="{{$creneau->name}}" placeholder="Name creneau" required>
		<label>Creneau Start at</label>
		<input type="datetime-local" class="form-control" name="start_time" value="{{$creneau->start_time}}" placeholder="A partir de" required>
		<label>Creneau End at </label>
		<input type="datetime-local" class="form-control" name="end_time" value="{{$creneau->end_time}}" placeholder="jusqu'a" required>
		<label class="radio-inline">
		    <input type="radio" name="ouvert" value="true" checked>Ouvert
		</label>
		<label class="radio-inline">
		    <input type="radio" name="ouvert" value="false"> Fermer
		</label>
	    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Modifier</button>
		    
	</form>
@endsection
