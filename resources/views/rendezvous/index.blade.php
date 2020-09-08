@extends('templates.default_layout')
@section('title', 'LISTE DES RE-VOUS')
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
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
			<h1 class="page-header">Liste des Rendez-Vous</h1>
			</div>
		</div><!--/.row--><br>

		<div class="row col-lg-12" style="padding-bottom:30px;">
			<div class="col-lg-4 text-left" style="padding:0;">
				@canany(['isAdmin','isRecept'])
				<a href="{{url('/rendezVous/create')}}">
					<button type="submit"  class="btn btn-success">
						<span class="glyphicon glyphicon-plus" style="padding-right:8px;"></span>Nouveau Rendez-Vous
					</button>
				</a>
				@endcan
			</div>
			<!-- search feature begin here -->
			<div class="col-lg-6 text-right" style="padding:0;">
				<div class="col-lg-4" style="padding-right:10px;">
					<h5 class="text-right"><strong>RE-VOUS PAR</strong></h5>
				</div>
				<div class="col-lg-3" style="padding:0;">
					<select class="form-control" id="search">
						<option value="0"> ID</option>
						<option value="1"> Nom_Patient</option>
						<option value="2"> Nom_Docteur</option>
						<option value="5"> Status</option>
					</select>
				</div>
				<div class="col-lg-5" style="padding-left:5px;">
					<input style="height:34px;" class="input form-control" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
				</div>
			</div>
			<!-- search feature end here -->
		</div><!--/.row-->

		<table class="table table-striped" id="table" style="width:900px;">

		    <thead style="background-color:#ccc;">
				<tr>
					<th scope="col">Re-V ID</th>
					<th scope="col">Nom_Patient</th>
					<th scope="col">Nom_Docteur</th>
					<th scope="col">CréneauID</th>
					<th scope="col">Déscription</th>
					<th scope="col">Etat</th>
					<th scope="col" class="text-center">Actions</th>
				</tr>
            </thead>
            <tbody>
				<?php foreach($rendezVous as $rendezvous): ?>
					<tr>
						<td scope="row" style="text-align:center;"> <?= $rendezvous->id; ?></td>
						<td> <?= $rendezvous->pat_name; ?></td>
						<td> <?= $rendezvous->user_name; ?></td>
						<td> <?= $rendezvous->creneau_id; ?></td>
						<td> <?= $rendezvous->description; ?></td>
						<td> <?= $rendezvous->etat; ?></td>
						<td style="display:flex;">
							<a href="rendezVous/cons/{{$rendezvous->id}}" style="padding-right:10px;">
								<button type="submit" class="btn btn-sm btn-primary">
									<span class="glyphicon glyphicon-eye-open" style="padding-right:8px;"> </span>Consulter
								</button>
							</a>
							@canany(['isAdmin','isRecept'])
							<a href="rendezVous/edit/{{$rendezvous->id}}" style="padding-right:10px;">
								<button type="submit" class="btn btn-sm btn-primary">
								<span class="glyphicon glyphicon-edit" style="padding-right:8px;"> </span>Edit
								</button>
							</a>

							<form action="rendezVous/destroy/{{$rendezvous->id}}" method="post">
								@csrf
								<button type="submit" class="btn btn-sm btn-danger">
									<span class="glyphicon glyphicon-trash" style="padding-right:8px;"> </span>Delete
								</button>
							</form>
							@endcan
						</td>
					</tr>
				<?php endforeach; ?>
            </tbody>
        </table>
	</div>
@endsection
