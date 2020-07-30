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
        
        <table class="table">

        <thead>
 
        <tr>

            <th>Rendez-vous ID</th>
	    <th>personel ID</th>
	    <th>patient ID</th>
	    <th>payement ID</th>
	    <th>creneau ID</th>
	    <th>Title</th>
	    <th>Description</th>
	    <th>Etat</th>
            <th>Action</th>
        </tr>

        </thead>
        <tbody>
        <?php foreach($rendezVous as $rendezvous): ?>
            <tr>
                <td> <?= $rendezvous->id; ?></td>
		<td> <?= $rendezvous->user_id; ?></td>
                <td> <?= $rendezvous->patient_id; ?></td>
		<td> <?= $rendezvous->payement_id; ?></td>
		<td> <?= $rendezvous->creneau_id; ?></td>
		<td> <?= $rendezvous->title; ?></td>
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
       
      
</body>
</html>
@endsection
