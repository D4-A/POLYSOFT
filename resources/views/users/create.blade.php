@extends('templates.default_layout')
@section('title', 'AJOUTER UTILISATEUR')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-user-md"></em>
					</a>
				</li>
				<li class="active">Utilisateurs</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ajouter un Utilisateur</h1>
			</div>
		</div><!--/.row--><br>

		<form role="form" action="{{url('users')}}" method="post">
			<div style="padding-bottom:30px;">
				@csrf
				<div class="form-group">
					<label style="padding-left:10px;"l>Nom</label>
					<input class="form-control" name="name" placeholder="Nom de l'utilisateur" required><br>
					<label style="padding-left:10px;">Prénom</label>
					<input class="form-control" name="prenom" placeholder="Prénom de l'utilisateur" required><br>

					<label style="padding-left:10px;">Service</label>
					<select name="service_id" id="service_id" class="form-control" required>
						<option placeholder="" value="">Choisir Service</option>
						@foreach($services as $service){
							<option value="{{$service->id}}">{{$service->name}}</option>
						}
						@endforeach
					</select><br>

					<label style="padding-left:10px;">Fonction Occupée</label>
					<select name="fonction_id" id="fonction_id" class="form-control" required>
						<option placeholder="" value="">Choisir Fonction</option>
						@foreach($fonctions as $fonction){
							<option value="{{$fonction->id}}">{{$fonction->name}}</option>
						}
						@endforeach
					</select><br>
					<label style="padding-left:10px;">Choisir Genre</label>
					<select name="genre" id="genre" class="form-control" required>
						<option value=""> Genre </option>
						<option value="Masculin">Masculin</option>
						<option value="Feminin">Féminin</option>
					</select><br>
					<label style="padding-left:10px;">Date de Naissance</label>
					<input class="form-control" name="ans_naiss" placeholder="Date_Naiss de l'utilisateur" required><br>
					<label style="padding-left:10px;">Adresse</label>
					<input class="form-control" name="adresse" placeholder="Adresse de l'utilisateur" required><br>
					<label style="padding-left:10px;">Téléphone</label>
					<input class="form-control" name="tel" placeholder="Téléphone de l'utilisateur" required><br>
					<label style="padding-left:10px;">E-mail</label>
					<input type="email" class="form-control" name="email" placeholder="Email de l'utilisateur" required><br>
					<label style="padding-left:10px;">Carte d'Identité</label>
					<input class="form-control" name="cni" placeholder="Carte_ID de l'utilisateur" required><br>
				</div>

				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-save" style="padding-right:8px;"> </span>Enregistrer
				</button>
			</div>
		</form>
	</div>
@endsection
