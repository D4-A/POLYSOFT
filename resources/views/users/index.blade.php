@extends('templates.default_layout')
@section('title', 'LISTE DES UTILISATEURS')
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
				<h1 class="page-header">Liste des Utilisateurs</h1>
			</div>
		</div><!--/.row--><br>

		<div class="row col-lg-12" style="padding-bottom:30px;">
			<div class="col-lg-6 text-left" style="padding:0;">
				@can('isAdmin')
				<a href="{{url('/users/create')}}">
					<button type="submit" class="btn btn-success">
						<span class="glyphicon glyphicon-plus" style="padding-right:8px;"></span>Nouveau utilisateur
					</button>
				</a>
				@endcan
			</div>
			<!-- search feature begin here -->
			<div class="col-lg-6 text-right" style="padding:0;">
				<div class="col-lg-4" style="padding-right:10px;">
					<h5 class="text-right"><strong>RECHERCHE PAR</strong></h5>
				</div>
				<div class="col-lg-3" style="padding:0;">
					<select class="form-control" id="search">
						<option value="0"> ID</option>
						<option value="1"> Nom Personel</option>
					</select>
				</div>
				<div class="col-lg-5" style="padding-left:5px;">
					<input style="height:34px;" class="input form-control" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
				</div>
			</div>
			<!-- search feature end here -->
		</div><!--/.row-->

		<table class="table table-striped" id="table">

			<thead style="background-color:#ccc;">
				<tr>
					<th scope="col" style="text-align:center;">ID </th>
					<th scope="col">Nom</th>
					<th scope="col">Prénom </th>
					<th scope="col">Fonction</th>
					<th scope="col">Service</th>
					<th scope="col">Genre</th>
					<th scope="col">DateNaiss</th>
					<th scope="col">Adresse</th>
					<th scope="col">Tél</th>
					<th scope="col">Email</th>
					<th scope="col">C.N.ID </th>
					@can('isAdmin')
					<th scope="col">Actions</th>
					@endcan
				</tr>
			</thead>
			<tbody>
				<?php foreach($users as $user): ?>
					<tr>
						<th scope="row" style="text-align:center;"> <?= $user->id; ?></th>
						<td> <?= $user->name; ?></td>
						<td> <?= $user->prenom; ?></td>
						<td> <?= $user->fonct_name; ?></td>
						<td> <?= $user->serv_name; ?></td>
						<td> <?= $user->genre; ?></td>
						<td> <?= $user->ans_naiss; ?></td>
						<td> <?= $user->adresse; ?></td>
						<td> <?= $user->tel; ?></td>
						<td> <?= $user->email; ?></td>
						<td> <?= $user->cni; ?></td>
						@can('isAdmin')
						<td style="display:flex;">
							<a href="users/edit/{{$user->id}}" style="padding-right:10px;">
								<button type="submit" class="btn btn-sm btn-primary">
									<span class="glyphicon glyphicon-edit"> Edit</span>
								</button>
							</a>

							<form action="users/destroy/{{$user->id}}" method="post">
								@csrf
								<button type="submit" onclick="return confirm('voulez-vous vraiment supprimer?')" class="btn btn-sm btn-danger">
									<span class="glyphicon glyphicon-trash"> Delete</span>
								</button>
							</form>
						</td>
						@endcan
					</tr>
				<?php endforeach; ?>
			</tbody>

        </table>
	</div>
@endsection
