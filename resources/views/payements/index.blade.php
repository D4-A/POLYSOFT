@extends('templates.default_layout')
@section('title', 'LISTE DES PAIEMENTS')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
		    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-money"></em>
					</a>
				</li>
				<li class="active">Payements</li>
		    </ol>
		</div><!--/.row-->
		
		<div class="row">
		    <div class="col-lg-12">
			<h1 class="page-header">Liste des payements</h1>
		    </div>
		</div><!--/.row--><br>

		<div class="row col-lg-12" style="padding-bottom:30px;">
			<div class="col-lg-6 text-left" style="padding:0;">
				@canany(['isAdmin','isCaissier'])
				<a href="{{url('/payements/create')}}">
					<button type="submit"  class="btn btn-success">
						<span class="glyphicon glyphicon-plus" style="padding-right:8px;"></span> Nouveau Payement
					</button>
				</a>
				@endcan
			</div>
			<!-- search feature begin here -->
			<div class="col-lg-6 text-right" style="padding:0;">
				<div class="col-lg-4" style="padding-right:10px;">
					<h5 class="text-right"><strong>RECH_PAYEMENT</strong></h5>
				</div>
				<div class="col-lg-3" style="padding:0;">
					<select class="form-control" id="search">
						<option value="1"> ID</option>
						<option value="2"> Nom du Caissier</option>
						<option value="3"> Nom du Patient</option>
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
					<th scope="col" style="text-align:center;">NUM </th>
					<th scope="col">ID </th>
					<th scope="col">Nom caissier</th>
					<th scope="col">Nom Patient</th>
					<th scope="col">Type Paiement</th>
					<th scope="col">Montant</th>
					<th scope="col">Date </th>
					@canany(['isAdmin','isCaissier'])
					<th scope="col">Actions</th>
					@endcan
				</tr>
		    </thead>

		    <tbody>
			<?php foreach($payements as $key => $payement): ?>
			<tr>
			    <td scope="row" style="text-align:center;"> {{ $key }}</td>
			    <td> {{ $payement->id }}</td>
			    <td> {{ $payement->user_name }}</td>
			    <td> {{ $payement->nom}} {{ $payement->prenom}}</td>
			    <td> {{ $payement->name}}</td>
			    <td> {{ $payement->montant}}</td>
			    <td> {{ $payement->created_at }}</td>
			    
			    @canany(['isAdmin','isCaissier'])
			    <td style="display:flex;text-align:center;">
				<a href="payements/edit/{{$payement->id}}" style="padding-right:10px;">
				    <button type="submit" class="btn btn-sm btn-primary">
					<span class="glyphicon glyphicon-edit"> Edit</span>   
				    </button>
				</a>
				
				<form action="payements/destroy/{{$payement->id}}" method="post">
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
