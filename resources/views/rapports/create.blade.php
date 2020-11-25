@extends('templates.default_layout')
@section('title', 'RAPPORT DES ACTIVITES')
@section('content')
    
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
		<li>
		    <a href="#">
			<em class="fa fa-users"></em>
		    </a>
		</li>
		<li class="active">Rapports</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Voir les rapports<h1>
	    </div>
	</div><!--/.row--><br>

	<form role="form" action="{{url('rapport')}}" method="post">
	    <div style="padding-bottom:30px;">
		@csrf
		<div class="form-group">
		    <select name="acteur" id="acteur" onchange="reffresh()" class="form-control" required>
			<option value="">Séléction par un acteur</option>
			<option value="patient">Patient</option>
			<option value="medecin">Médecin </option>
			<option value="caissier">Caissier</option>
		    </select><br>
		    <select name="operation" id="operation" class="form-control" required>
			<option value="">Séléction d'une operation</option>
			<option value="inscrit">Inscrit</option>
		    </select><br>
		    <label style="padding-left:10px;">By User</label>
		    <input type="text" class="form-control" id=grp name="grp" placeholder="ID for"><br>
		    <label style="padding-left:10px;">A partir de la Date</label>
		    <input type="datetime-local" class="form-control" name="start_time" placeholder="Début Date" ><br>
		    <label style="padding-left:10px;">jusqu'au</label>
		    <input type="datetime-local" class="form-control" name="end_time" placeholder="Fin Date"><br>
		</div>
		
		<button type="submit" class="btn btn-primary">
		    <span class="glyphicon glyphicon-save" style="padding-right:8px;"> </span>create
		</button>
	    </div>
	</form>
    </div>
@endsection
