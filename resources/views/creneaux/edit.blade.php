@extends('templates.default_layout')
@section('title', 'EDITER CRENEAU')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
			<li>
				<a href="#">
					<em class="fa fa-home"></em>
				</a>
				</li>
				<li class="active">Créneaux</li>
			</ol>
		</div><!--/.row-->
	
		<div class="row">
			<div class="col-lg-12">
			<h1 class="page-header">Modifier Créneau</h1>
			</div>
		</div><!--/.row--><br>

		<form role="form" action="/creneaux/{{$creneau->id}}" method="post">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label style="padding-left:10px;">Nom Créneau</label>
				<input class="form-control" name="name" value="{{$creneau->name}}" placeholder="Nom_Creneau" required><br>
				<label style="padding-left:10px;">Créneau Début</label>
				<input type="datetime-local" class="form-control" name="start_time" value="{{$creneau->start_time}}" placeholder="Début_Creneau" required><br>
				<label style="padding-left:10px;">Créneau Fin</label>
				<input type="datetime-local" class="form-control" name="end_time" value="{{$creneau->end_time}}" placeholder="Fin_Creneau" required><br>
				<label class="radio-inline">
					<input type="radio" name="ouvert" value="true" checked>Ouvert
				</label>
				<label class="radio-inline">
					<input type="radio" name="ouvert" value="false"> Fermer
				</label>
			</div><br>
				
			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-saved" style="padding-right:8px;"> </span>Modifier
			</button>	
		</form>
	</div>
@endsection
