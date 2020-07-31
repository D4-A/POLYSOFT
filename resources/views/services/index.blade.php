@extends('templates.default_layout')
@section('content')

    <!DOCTYPE html>
    <html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Polyclinique du Nord</title>
	    <script>
	     function myFunction() {

		 var input, filter, table, tr, td, i, txtValue;
		 input = document.getElementById("myInput");
		 filter = input.value.toUpperCase();
		 table = document.getElementById("myTable");
		 tr = table.getElementsByTagName("tr");

		 for (i = 0; i < tr.length; i++) {
		     td = tr[i].getElementsByTagName("td")[1];
		     if (td) {
			 txtValue = td.textContent || td.innerText;
			 if (txtValue.toUpperCase().indexOf(filter) > -1) {
			     tr[i].style.display = "";
			 } else {
			     tr[i].style.display = "none";
			 }
		     }
		 }
	     }
	    </script>
	</head>
	<body>
	    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
		    <ol class="breadcrumb">
			<li><a href="#">
			    <em class="fa fa-home"></em>
			</a></li>
			<li class="active">Services</li>
		    </ol>
		</div><!--/.row-->

		<div class="row">
		    <div class="col-lg-12">
			<h1 class="page-header">Services</h1>
		    </div>
		</div><!--/.row-->
		<a href="{{url('/services/create')}}">
		    <button type="submit"  class="btn btn-success">
			<span class="glyphicon glyphicon-plus"></span>
			Nouveau service
		    </button>
		</a>
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
		<table class="table" id="myTable">
		    <thead>
			<tr>
			    <th>ID Service</th>
			    <th>Nom Service</th>
			    <th>Action</th>
			</tr>
		    </thead>
		    <tbody>
			<?php foreach($services as $service): ?>
			<tr>
			    <td> <?= $service->id; ?></td>
			    <td> <?= $service->name; ?></td>
			    <td>
				<a href="services/edit/{{$service->id}}">
				    @can('isAdmin')
				    <button type="submit" class="btn btn-sm btn-primary">
					<span class="glyphicon glyphicon-edit"> Edit</span>
				    </button>
				    @endcan
				</a>
				<form action="services/destroy/{{$service->id}}" method="post">
				    @csrf
				    @can('isAdmin')
				    <button type="submit" onclick="return confirm('voulez-vous vraiment supprimer?')" class="btn btn-sm btn-danger">
					<span class="glyphicon glyphicon-trash"> Delete</span>
				    </button>
				    @endcan
				</form>
                            </td>
			</tr>
			<?php endforeach; ?>
		    </tbody>
		</table>
	</body>
    </html>
@endsection
