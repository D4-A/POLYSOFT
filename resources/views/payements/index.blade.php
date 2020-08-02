@extends('templates.default_layout')
@section('content')

    <!DOCTYPE html>
    <html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Poluclinique du Nord</title>
	</head>
	<body>
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
			<h1 class="page-header">Payements</h1>
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
		    <option value="1"> ID Caissier</option>
		    <option value="2"> ID Patient</option>
		    <option value="3"> ID Payement</option>
		   
		</select>
		<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
		
		<!-- search feature end here -->
		<table class="table" id="table">

		    <thead>
			
			<tr>

			    <th>ID </th>
			    <th>ID caissier</th>
			    <th>ID Patient</th>
			    <th>ID Type_Payement</th>
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
			    <td> {{ $payement->user_id }}</td>
			    <td> {{ $payement->patient_id}}</td>
			    <td> {{ $payement->type_payement_id}}</td>
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
       
      
</body>
</html>
@endsection
