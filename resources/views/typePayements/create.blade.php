@extends('templates.default_layout')
@section('title', 'Ajouter un payement')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-money"></em>
		</a></li>
		<li class="active">Type Payements</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Add Type Payement</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="{{url('typePayements')}}" method="post">
	    @csrf
	    <div class="form-group">
		<label>TypePayement Name</label>
		<input class="form-control" name="name" placeholder="Name typePayement">
		<label>TypePayement Montant</label>
		<input class="form-control" name="montant" placeholder="montant">
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Enregistre</button>
		    
	</form>
@endsection
