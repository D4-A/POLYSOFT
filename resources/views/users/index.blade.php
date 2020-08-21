@extends('templates.default_layout')
@section('title', 'liste des utilisateurs')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-user-md"></em>
		</a></li>
		<li class="active">Users</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Liste des utilisateurs</h1>
	    </div>
	</div><!--/.row-->
	@can('isAdmin')
	<a href="{{url('/users/create')}}">
	    <button type="submit"  class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span>
		Nouveau utilisateur

	    </button>
	</a>
	@endcan
	<!-- search feature begin here -->
	<select class="selectpicker" id="search">
	    <option value="0"> ID</option>
	    <option value="1"> Nom Personel</option>

	</select>
	<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">

	<!-- search feature end here -->
	<table class="table table-bordered" id="table">
	    <thead class="thead-dark">

		<tr>

		    <th>ID </th>
			<th>Nom </th>
		    <th>Prenom </th>
			<th>Fonction</th>
		    <th>Service</th>
		    <th>Genre </th>
		    <th>Ans Naiss </th>
		    <th>Adresse </th>
		    <th>Tel </th>
		    <th>Email </th>
		    <th>CNI </th>
		    @can('isAdmin')
		    <th>Action</th>
		    @endcan
		</tr>

	    </thead>
	    <tbody>
		<?php foreach($users as $user): ?>
		<tr>
		    <td> <?= $user->id; ?></td>
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
		    <td>
			<a href="users/edit/{{$user->id}}">

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
@endsection
