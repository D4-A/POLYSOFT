@extends('templates.default_layout')
@section('title', 'EDITER PATIENT')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-users"></em>
					</a>
				</li>
				<li class="active">Patients</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Modifier Patient : <strong>{{$patient->nom}} {{$patient->prenom}}</strong></h1>
			</div>
		</div><!--/.row--><br>

		<form role="form" action="/patients/{{$patient->id}}" method="post">
			<div style="padding-bottom:30px;">
				@csrf
				@method('PUT')
				<div class="form-group">
				<label style="padding-left:10px;">Nom  </label>
				<input type="text" class="form-control" name="nom" value="{{$patient->nom}}" placeholder="Nom du patient" required><br>
				<label style="padding-left:10px;">Prénom </label>
				<input type="text" class="form-control" name="prenom" value="{{$patient->prenom}}" placeholder="Prénom du patient" required><br>
				<label style="padding-left:10px;">Genre  </label>
				<input type="select" class="form-control" name="genre" value="{{$patient->genre}}" placeholder="Genre du patient" required><br>
				<label style="padding-left:10px;">Année de naissance </label>
				<input type="date" class="form-control" name="ans_naiss" value="{{$patient->ans_naiss}}" placeholder="Année de naissance du patient" required><br>
				<label style="padding-left:10px;">Profession </label>
				<input type="text" class="form-control" name="profession" value="{{$patient->profession}}" placeholder="Profession du patient" required><br>
				<label style="padding-left:10px;">Adresse  </label>
				<input type="text" class="form-control" name="adresse" value="{{$patient->adresse}}" placeholder="Adresse du patient" required><br>
				<label style="padding-left:10px;">Téléphone </label>
				<input type="text" class="form-control" name="tel" value="{{$patient->tel}}" placeholder="Téléphone du patient" required><br>
				<label style="padding-left:10px;">Email  </label>
				<input type="email" class="form-control" name="email" value="{{$patient->email}}" placeholder="Email du patient" ><br>
				<label style="padding-left:10px;">CNI  </label>
				<input type="text" class="form-control" name="cni" value="{{$patient->cni}}" placeholder="Numéro Carte_Identité du patient" required><br>
				</div>

				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-saved" style="padding-right:8px;"> </span>Modifier
				</button>
			</div>
		</form>
	</div>
@endsection
