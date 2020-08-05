@extends('templates.default_layout')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-calendar"></em>
		</a></li>
		<li class="active">Rendez vous</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Rendez-vous</h1>
	    </div>
        </div><!--/.row-->
	<a href="{{url('/rendezVous/create')}}">
            <button type="submit"  class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span>
		Nouveau rendez-vous

	    </button>
	</a>
	<!-- search feature begin here -->
	<select class="selectpicker" id="search">
	    <option value="0"> ID</option>
	    <option value="1"> Patient Name</option>
	    <option value="2"> Docteur Name</option>
	</select>
	<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">

	<!-- search feature end here -->
	<table class="table" id="table">
            <thead>
		<tr>
		    <th>Rendez-vous ID</th>
		    <th>patient Name</th>
		    <th>Docteur Name</th>
		    <th>creneau ID</th>
		    <th>Description</th>
		    <th>Etat</th>
		    <th>Action</th>
		</tr>

            </thead>
            <tbody>
		<?php foreach($rendezVous as $rendezvous): ?>
		<tr>
                    <td> <?= $rendezvous->id; ?></td>
                    <td> <?= $rendezvous->pat_name; ?></td>
		    <td> <?= $rendezvous->user_name; ?></td>
		    <td> <?= $rendezvous->creneau_id; ?></td>
		    <td> <?= $rendezvous->description; ?></td>
		    <td> <?= $rendezvous->etat; ?></td>
                    <td>
			<a href="rendezVous/edit/{{$rendezvous->id}}">

			    <button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-edit"> Edit</span>
			    </button>

			</a>


			<form action="rendezVous/destroy/{{$rendezvous->id}}" method="post">
			    @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"> Delete</span>
                            </button>
			</form>
                    </td>
		</tr>
		<?php endforeach; ?>
            </tbody>

        </table>
@endsection
