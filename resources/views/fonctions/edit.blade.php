@extends('templates.default_layout')
@section('title', 'Editer une fonction')
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
		<h1 class="page-header">Modifier Service</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="/fonctions/{{$fonction->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>Service Name</label>
		<input class="form-control" name="name" value="{{$fonction->name}}" placeholder="Name service" required>
		<input class="form-control" name="diplome" value="{{$fonction->diplome}}" placeholder="Name fonction" required>
	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>

		Modifier</button>

	</form>

@endsection
