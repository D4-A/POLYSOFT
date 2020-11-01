@extends('templates.default_layout')
@section('title', 'LISTE DES EXAMENS')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
		<li>
		    <a href="#">
			<em class="fa fa-upload"></em>
		    </a>
		</li>
		<li class="active">Examens</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Ajouter Examen</h1>
	    </div>
	</div><!--/.row--><br>

	<div class="row col-lg-12" style="padding-bottom:30px;">
	    <div class="col-lg-3 text-left" style="padding:0;">
		@canany(['isLaborant','isDoctor','isAdmin'])
		<a href="{{url('/examens/create')}}">
		    <button type="submit"  class="btn btn-success">
			<span class="glyphicon glyphicon-plus" style="padding-right:8px;"></span>Nouveau Examen
		    </button>
		</a>
		@endcan
	    </div>
	    <!-- search feature begin here -->
	    <div class="col-lg-6 text-right" style="padding:0;">
		<div class="col-lg-4" style="padding-right:10px;">
		    <h5 class="text-right"><strong>EXAMEN PAR</strong></h5>
		</div>
		<div class="col-lg-3" style="padding:0;">
		    <select class="form-control" id="search">
			<option value="1"> ID</option>
			<option value="2"> Laborantin</option>
			<option value="3"> Consultation</option>
		    </select>
		</div>
		<div class="col-lg-5" style="padding-left:5px;">
		    <input style="height:34px;" class="input form-control" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
		</div>
	    </div>
	    <!-- search feature end here -->
	</div><!--/.row-->
	
	<table class="table table-striped" id="table" style="width:650px;">
	    
	    <thead style="background-color:#ccc;">
		<tr>
		    <th scope="col" style="text-align:center;">NUM </th>
		    <th scope="col">ID </th>
		    <th scope="col">Nom_Examen</th>
		    <th scope="col">Laborantin</th>
		    <th scope="col">ConsulationID</th>
		    <th scope="col">PaiementID</th>
		    <th scope="col">Fichiers </th>
		    <th scope="col">Actions</th>
		</tr>
		
	    </thead>
	    
	    <tbody>
		<?php foreach($examens as $key => $examen): ?>
		<tr>
		    <td scope="row" style="text-align:center;"> <?= $key; ?></td>
		    <td> <?= $examen->id; ?></td>
		    <td> <?= $examen->nom_examen; ?></td>
		    <td> <?= $examen->user_name; ?></td>
		    <td> <?= $examen->consultation_id; ?></td>
		    <td> <?= $examen->payment_id; ?></td>
		    <td> <?= $examen->files; ?></td>
		    
		    <td style="display:flex;">
			<a href="examens/edit/{{$examen->id}}" style="padding-right:10px;">
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
    </div>
@endsection
