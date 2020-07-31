@extends('templates.default_layout')
@section('content')

    <!DOCTYPE html>
    <html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>Polyclinique du Nord</title>
	</head>
	<body>
	    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
		    <ol class="breadcrumb">
			<li><a href="#">
			    <em class="fa fa-home"></em>
			</a></li>
			<li class="active">Creneaux</li>
		    </ol>
		</div><!--/.row-->
		
		<div class="row">
		    <div class="col-lg-12">
			<h1 class="page-header">Creneaux</h1>
		    </div>
		</div><!--/.row-->
		<a href="{{url('/creneaux/create')}}">
		    <button type="submit"  class="btn btn-success">
			<span class="glyphicon glyphicon-plus"></span>
			Nouveau service
			
		    </button>
		</a>
		
		<table class="table">

		    <thead>
			
			<tr>

			    <th>ID Creneau</th>
			    <th>Nom </th>
			    <th>Commence </th>
			    <th>Termine</th>
			    <th>Status</th>
			    <th>Action</th>
			</tr>

		    </thead>
		    <tbody>
			<?php foreach($creneaux as $creneau): ?>
			<tr>
			    <td> <?= $creneau->id; ?></td>
			    <td> <?= $creneau->name; ?></td>
			    <td> <?= $creneau->start_time; ?></td>
			    <td> <?= $creneau->end_time; ?></td>
			    <td> @if($creneau->ouvert)
				<?= 'ouvert'; ?>
			    @else
				<?= 'fermer'; ?>
			    @endif
			    </td>
			    <td>
				<a href="creneaux/edit/{{$creneau->id}}">
				    
				    <button type="submit" class="btn btn-sm btn-primary">
					<span class="glyphicon glyphicon-edit"> Edit</span>   
				    </button>

				</a>

				
				<form action="creneaux/destroy/{{$creneau->id}}" method="post">
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
       
      
</body>
</html>
@endsection
