@extends('templates.default_layout')
@section('title', 'LISTE DES CONSULTATIONS')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
		<li>
		    <a href="#">
			<em class="fa fa-hospital-o"></em>
		    </a>
		</li>
		<li class="active">Consultations</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Liste des Consultations</h1>
		    </div>
	</div><!--/.row--><br>
	
	<div class="row col-lg-12" style="padding-bottom:30px;">
	    <div class="col-lg-6 text-left" style="padding:0;">
		@canany(['isDoctor','isInf'])
		<a href="{{url('/consultations/create')}}">
		    <button type="submit"  class="btn btn-success">
			<span class="glyphicon glyphicon-plus" style="padding-right:8px;"></span>Nouveau Consultation
		    </button>
		</a>
		@endcan
	    </div>
	    <!-- search feature begin here -->
	    <div class="col-lg-6 text-right" style="padding:0;">
		<div class="col-lg-4" style="padding-right:10px;">
		    <h5 class="text-right"><strong>CONSULTATION PAR</strong></h5>
		</div>
		<div class="col-lg-3" style="padding:0;">
		    <select class="form-control" id="search">
			<option value="1"> ID</option>
			<option value="2"> Nom Medecin</option>
			<option value="3"> Nom Patient</option>
		    </select>
		</div>
		<div class="col-lg-5" style="padding-left:5px;">
		    <input style="height:34px;" class="input form-control" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
		</div>
	    </div>
	    <!-- search feature end here -->
	</div><!--/.row-->
	
	<table class="table table-condensed table-striped " id="table">
	    
	    <thead style="background-color:#ccc;">
		<tr>
		    <th scope="col">NUM </th>
		    <th scope="col">CONSID</th>
		    <th scope="col">Nom Médecin</th>
		    <th scope="col">Nom Patient</th>
		    <!--<th scope="col">ID_Paiement</th>-->
		    <th scope="col">Motif</th>
		    <th scope="col">Date</th>
		    @canany(['isDoctor','isInf','isLaborant'])
		    <th scope="col">Actions</th>
		    @endcan
		</tr>
		
	    </thead>
	    <tbody>
		<?php foreach($consultations as $key => $consultation): ?>
		<tr>
		    <td scope="row" style="text-align:center;"> <?= $key; ?></td>
		    <td> <?= $consultation->id; ?></td>
		    <td>Dr <?= $consultation->user_name; ?></td>
		    <td> <?= $consultation->patient_name; ?>  <?= $consultation->patient_prenom; ?></td>
		    <td> <?= $consultation->motif; ?></td>
		    <td> <?= $consultation->created_at; ?></td>
		    @canany(['isDoctor','isInf'])
		    <td style="display:flex;">
			@endcan
			@canany(['isDoctor','isInf','isLaborant'])
			@canany(['isLaborant'])
			
			@endcan
			<a href="consultations/show/{{$consultation->id}}" style="padding-right:10px;">
			    <button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-eye-open"> </span> Show
			    </button>
			</a>
			@can('isLaborant')
			
			@endcan
			@endcan
			
			@canany(['isDoctor','isInf'])
			<a href="consultations/edit/{{$consultation->id}}" style="padding-right:10px;">
			    <button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-edit"> </span> Edit
			    </button>
			</a>
			@endcan
			
			@canany(['isDoctor','isInf'])
			<form action="consultations/destroy/{{$consultation->id}}" method="post">
			    @csrf
			    <button type="submit" onclick="return confirm('voulez-vous vraiment supprimer?')" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"> </span> Delete
			    </button>
			</form>
			@endcan
			@canany(['isDoctor','isInf'])
		    </td>
		    @endcan
		</tr>
		<?php endforeach; ?>
	    </tbody>
	    
	</table>
    </div>
@endsection
