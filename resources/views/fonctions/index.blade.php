@extends('templates.default_layout')
@section('title', 'liste des fonctions')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-home"></em>
		</a></li>
		<li class="active">Fonctions</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Fonctions</h1>
	    </div>
	</div><!--/.row-->
	@can('isAdmin')
	<a href="{{url('/fonctions/create')}}">
	    <button type="submit"  class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span>
		Nouveau service

	    </button>
	</a>
	@endcan
	<select class="selectpicker" id="search">
	    <option value="0"> ID</option>
	    <option value="1"> Nom</option>
	    <option value="2"> Diplome</option>
	</select>
	<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">

	<table class="table" id="table">

	    <thead>

		<tr>

		    <th>ID Fonction</th>
		    <th>Nom Fonction</th>
		    <th>Diplome </th>
		    @can('isAdmin')
		    <th>Action</th>
		    @endcan
		</tr>

	    </thead>
	    <tbody>
		<?php foreach($fonctions as $fonction): ?>
		<tr>
		    <td> <?= $fonction->id; ?></td>
		    <td> <?= $fonction->name; ?></td>
		    <td> <?= $fonction->diplome; ?></td>
		    @can('isAdmin')
		    <td>
			<a href="fonctions/edit/{{$fonction->id}}">

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

@endsection
