@extends('templates.default_layout')
@section('content')


    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-money"></em>
		</a></li>
		<li class="active">Type Payements</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Type Payements</h1>
	    </div>
	</div><!--/.row-->
	@canany(['isAdmin','isCaissier'])
	<a href="{{url('/typePayements/create')}}">
	    <button type="submit"  class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span>
		Nouveau service

	    </button>
	</a>
	@endcan
	
	<!-- search feature begin here -->
	<select class="selectpicker" id="search">
	    <option value="0"> ID</option>
	    <option value="1"> Nom</option>
	</select>
	<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">

	<!-- search feature end here -->
	<table class="table" id="table">

	    <thead>

		<tr>

		    <th>ID TypePayement</th>
		    <th>Nom TypePayement</th>
		    <th>Montant </th>
		    @canany(['isAdmin','isCaissier'])
		    <th>Action</th>
		    @endcan
		</tr>

	    </thead>
	    <tbody>
		<?php foreach($typePayements as $typePayement): ?>
		<tr>
		    <td> <?= $typePayement->id; ?></td>
		    <td> <?= $typePayement->name; ?></td>
		    <td> <?= $typePayement->montant; ?></td>
		    @canany(['isAdmin','isCaissier'])
		    <td>
			<a href="typePayements/edit/{{$typePayement->id}}">

			    <button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-edit"> Edit</span>
			    </button>

			</a>


			<form action="typePayements/destroy/{{$typePayement->id}}" method="post">
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
