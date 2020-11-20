@extends('templates.default_layout')
@section('title', 'EDITER UTILISATEUR')
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
				<h1 class="page-header">Modifier un Utilisateur</h1>
			</div>
		</div><!--/.row--><br>

		<form role="form" action="/users/{{$user->id}}" method="post">
			<div style="padding-bottom:30px;">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label style="padding-left:10px;">Nom</label>
					<input class="form-control" name="name" value="{{$user->name}}" placeholder="Nom de l'utilisateur" required><br>
					<label style="padding-left:10px;">Prénom</label>
					<input class="form-control" name="prenom" value="{{$user->prenom}}" placeholder="Prénom de l'utilisateur" required><br>
					<label style="padding-left:10px;">Service</label>
					<select name="service_id" id="service_id" class="form-control" required>

						@foreach($services as $service){
							@if($service->id === $user->service_id)
							<option value="{{$service->id}}" selected>{{$service->name}}</option>
							@else
							<option value="{{$service->id}}">{{$service->name}}</option>
							@endif
						}
						@endforeach
					</select><br>

					<label style="padding-left:10px;">Fonction</label>
					<select name="fonction_id" id="fonction_id" class="form-control" required>
						@foreach($fonctions as $fonction){
							@if($user->fonction_id === $fonction->id)
							<option value="{{$fonction->id}}" selected>{{$fonction->name}}</option>
							@else
							<option value="{{$fonction->id}}">{{$fonction->name}}</option>
							@endif
						}
						@endforeach
					</select><br>

					<label style="padding-left:10px;">Genre</label>
					<select name="genre" id="genre" class="form-control" required>
						@foreach(['Masculin','Feminin'] as $genre){
							@if($genre === $user->genre)
							<option value="{{$user->genre}}" selected>{{$user->genre}}</option>
							@else
							<option value="{{$genre}}">{{$genre}}</option>
							@endif
						}
						@endforeach
					</select><br>
					<label style="padding-left:10px;">Date de Naissance</label>
					<input class="form-control" name="ans_naiss" value="{{$user->ans_naiss}}" placeholder="Date00_Naiss de l'utilisateur" required><br>
					<label style="padding-left:10px;">Adresse</label>
					<input class="form-control" name="adresse" value="{{$user->adresse}}" placeholder="Adresse de l'utilisateur" required><br>
					<label style="padding-left:10px;">Téléphone</label>
					<input class="form-control" maxlength="8" name="tel" value="{{$user->tel}}" placeholder="Téléphone de l'utilisateur" required><br>
					<label style="padding-left:10px;">E-mail</label>
					<input class="form-control" name="email" value="{{$user->email}}" placeholder="Email de l'utilisateur" required><br>
					<label style="padding-left:10px;">Carte d'Identité</label>
					<input class="form-control" name="cni" maxlength="14" value="{{$user->cni}}" placeholder="Carte_ID de l'utilisateur" required><br>
				</div>

				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-saved" style="padding-right:8px;"> </span>Modifier
				</button>
			</div>
		</form>
	</div>
@endsection
