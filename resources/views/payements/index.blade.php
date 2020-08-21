@extends('templates.default_layout')
@section('title', 'liste payements')
@section('content')
	    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
		    <ol class="breadcrumb">
			<li><a href="#">
			    <em class="fa fa-money"></em>
			</a></li>
			<li class="active">Payement</li>
		    </ol>
		</div><!--/.row-->
		
		<div class="row">
		    <div class="col-lg-12">
			<h1 class="page-header">Liste des payements</h1>
		    </div>
		</div><!--/.row-->
		@canany(['isAdmin','isCaissier'])
		<a href="{{url('/payements/create')}}">
		    <button type="submit"  class="btn btn-success">
			<span class="glyphicon glyphicon-plus"></span>
			Nouveau Payement
			
		    </button>
		</a>
		@endcan
		<!-- search feature begin here -->
		<select class="selectpicker" id="search">
		    <option value="0"> ID</option>
		    <option value="1"> Nom Caissier</option>
		    <option value="2"> Nom Patient</option>
		   
		</select>
		<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
		
		<!-- search feature end here -->
		<table class="table" id="table">

		    <thead>
			
			<tr>

			    <th>ID </th>
			    <th>Nom caissier</th>
			    <th>Nom Patient</th>
			    <th>Nom Type_Payement</th>
			    <th>Montant</th>
			    <th>Date </th>
			    @canany(['isAdmin','isCaissier'])
			    <th>Action</th>
			    @endcan
			</tr>

		    </thead>
		    <tbody>
			<?php foreach($payements as $payement): ?>
			<tr>
			    <td> {{ $payement->id }}</td>
			    <td> {{ $payement->user_name }}</td>
			    <td> {{ $payement->nom}} {{ $payement->prenom}}</td>
			    <td> {{ $payement->name}}</td>
			    <td> {{ $payement->montant}}</td>
			    <td> {{ $payement->created_at }}</td>
			    @canany(['isAdmin','isCaissier'])
			    <td>
				
				<a href="payements/edit/{{$payement->id}}">
				    
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
@endsection
