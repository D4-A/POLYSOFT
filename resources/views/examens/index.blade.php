@extends('templates.default_layout')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-upload"></em>
		</a></li>
		<li class="active">Examens</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Examens upload</h1>
	    </div>
	</div><!--/.row-->
	@canany(['isLaborant','isDoctor','isAdmin'])
	<a href="{{url('/examens/create')}}">
	    <button type="submit"  class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span>
		Nouveau Examen

	    </button>
	</a>
	@endcan
	<!-- search feature begin here -->
	<select class="selectpicker" id="search">
	    <option value="0"> ID</option>
	    <option value="1"> Nom Lab</option>
	    <option value="2"> Consultation</option>
	    
	</select>
	<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
	
	<!-- search feature end here -->
	<table class="table" id="table">

	    <thead>

		<tr>

		    <th>ID </th>
		    <th>Uploaded by User</th>
		    <th>ID Consulation</th>
		    <th>Nom Examen</th>
		    <th>files </th>
		    <th>Action</th>
		</tr>

	    </thead>
	    <tbody>
		<?php foreach($examens as $examen): ?>
		<tr>
		    <td> <?= $examen->id; ?></td>
		    <td> <?= $examen->user_name; ?></td>
		    <td> <?= $examen->consultation_id; ?></td>
		    <td> <?= $examen->nom_examen; ?></td>
		    <td> <?= $examen->files; ?></td>

		    <td>
			<a href="examens/edit/{{$examen->id}}">

			    <button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-edit"> Edit</span>
			    </button>

			</a>

			<form action="examens/destroy/{{$examen->id}}" method="post">
			    @csrf
			    <button type="submit" onclick="return confirm('voulez-vous vraiment supprimer?')" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"> Delete</span>
			    </button>
			</form>
                    </td>
		</tr>
		<?php endforeach; ?>
	    </tbody>

        </table>

@endsection
