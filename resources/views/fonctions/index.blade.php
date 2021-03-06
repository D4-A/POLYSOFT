@extends('templates.default_layout')
@section('title', 'LISTE DES FONCTIONS')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-home"></em>
					</a>
				</li>
				<li class="active">Fonctions</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Fonctions</h1>
			</div>
		</div><!--/.row--><br>

		<div class="row col-lg-12" style="padding-bottom:30px;">
			<div class="col-lg-2 text-left" style="padding:0;">
				@can('isAdmin')
				<a href="{{url('/fonctions/create')}}">
					<button type="submit"  class="btn btn-success">
					<span class="glyphicon glyphicon-plus" style="padding-right:8px;"></span>Nouveau Fonction

					</button>
				</a>
				@endcan
			</div>
			<!-- search feature begin here -->
			<div class="col-lg-6 text-right" style="padding:0;">
				<div class="col-lg-4" style="padding-right:10px;">
					<h5 class="text-right"><strong>RECH_FONCTION</strong></h5>
				</div>
				<div class="col-lg-3" style="padding:0;">
					<select class="form-control" id="search">
						<option value="1"> ID</option>
						<option value="2"> Nom</option>
						<option value="3"> Diplôme</option>
					</select>
				</div>
				<div class="col-lg-5" style="padding-left:5px;">
					<input style="height:34px;" class="input form-control" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
				</div>
			</div>
			<!-- search feature end here -->
		</div><!--/.row-->

		<table class="table table-striped" id="table" style="width:700px;">

			<thead style="background-color:#ccc;">
			    <tr>
				<th scope="col">NUM</th>
				<th scope="col">ID Fonction</th>
				<th scope="col">Nom Fonction</th>
				<th scope="col">Diplôme </th>
				@can('isAdmin')
				<th scope="col">Actions</th>
				@endcan
			    </tr>
			</thead>

			<tbody>
			    <?php foreach($fonctions as $key => $fonction): ?>
					<tr>
					    <td scope="row"> <?= $key; ?></td>
					    <td> <?= $fonction->id; ?></td>
					    <td> <?= $fonction->name; ?></td>
					    <td> <?= $fonction->diplome; ?></td>
					    @can('isAdmin')
					    <td style="display:flex;">
						<a href="fonctions/edit/{{$fonction->id}}" style="padding-right:10px;">
						    <button type="submit" class="btn btn-sm btn-primary">
							<span class="glyphicon glyphicon-edit"> Edit</span>
						    </button>
						</a>

						<form action="fonctions/destroy/{{$fonction->id}}" method="post">
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
