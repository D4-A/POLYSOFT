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
		<li class="active">Consultations</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Consultations</h1>
	    </div>
        </div><!--/.row-->
	<a href="{{url('/consultations/create')}}">
            <button type="submit"  class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span>
		Nouveau Consultation
		
	    </button>
	</a>
        
        <table class="table">

            <thead>
		
		<tr>

		    <th>ID </th>
		    <th>ID User</th>
		    <th>ID Patient</th>
		    <th>ID Payement</th>
		    <th>Motif</th>
		    <th>Antecedent </th>
		    <th>Historique </th>
		    <th>Examen Physique </th>
		    <th>Hypothese diagnostique </th>
		    <th>Examen compl </th>
		    <th>Traitement </th>
		    <th>Action</th>
		</tr>

            </thead>
            <tbody>
		<?php foreach($consultations as $consultation): ?>
		<tr>
                    <td> <?= $consultation->id; ?></td>
		    <td> <?= $consultation->user_id; ?></td>
		    <td> <?= $consultation->patient_id; ?></td>
                    <td> <?= $consultation->payement_id; ?></td>
		    <td> <?= $consultation->motif; ?></td>
		    <td> <?= $consultation->antecedent; ?></td>
		    <td> <?= $consultation->historique; ?></td>
		    <td> <?= $consultation->examen_physique; ?></td>
		    <td> <?= $consultation->hypothese_dia; ?></td>
		    <td> <?= $consultation->examen_compl; ?></td>
		    <td> <?= $consultation->traitement; ?></td>
                    <td>
			<a href="consultations/show/{{$consultation->id}}">
			    
			    <button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-show"> Show</span>   
			    </button>

			</a>
			<a href="consultations/edit/{{$consultation->id}}">
			    
			    <button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-edit"> Edit</span>   
			</button>

                    </a>
                    
                    <form action="consultations/destroy/{{$consultation->id}}" method="post">
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
