@extends('templates.default_layout')
@section('title', 'AJOUTER RE-VOUS')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
		<li>
		    <a href="#">
			<em class="fa fa-calendar"></em>
		    </a>
		</li>
		<li class="active">Rendez-Vous</li>
	    </ol>
	</div><!--/.row--><br>
	<form action="{{url('rendezVous')}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="col-md-12" style="padding-bottom:30px;padding-top:20px;">	
		<div class="col-lg-3">
		    <select class="form-control" name="medecin" id="medecin" required>
			<option value="">Choisir le Docteur</option>
			@foreach($users as $user)
			    <option value="{{$user->id}}">
				{{$user->name}} {{$user->prenom}}</option>
			@endforeach
		    </select>
		</div>
		<div class="col-lg-3">
		    <input type="datetime-local" class="form-control" name="week" placeholder="Semaine" required><br>    
		</div>
		
		<div class="col-lg-2">
		    <button type="submit" class="btn btn-info">
			<span class="glyphicon glyphicon-search" style="padding-right:8px;"> </span>Rechercher
		    </button>
		</div>
	    </div>
	</form>
    </div>
@endsection
