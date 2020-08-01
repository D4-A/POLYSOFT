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
				    <em class="fa fa-users"></em>
				</a></li>
				<li class="active">Patients</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
		    <div class="col-lg-12">
			<h1 class="page-header">Patients</h1>
		    </div>
		</div><!--/.row-->
		<a href="{{url('/patients/create')}}">
		    <button type="submit"  class="btn btn-success">
			<span class="glyphicon glyphicon-plus"></span>
			Nouveau Patient
			
		    </button>
		</a>
		<!-- search feature begin here -->
		<select class="selectpicker" id="search">
		    <option value="0"> ID</option>
		    <option value="1"> Nom</option>
		    <option value="2"> Prenom</option>
		    <option value="3"> Genre</option>
		    <option value="4"> Age</option>
		    <option value="5"> Profession</option>
		    <option value="6"> Age</option>
		    <option value="7"> Email</option>
		    <option value="8"> CNI</option>
		</select>
		<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">

		<!-- search feature end here -->
		<table class="table" id="table">

		    <thead>
			
			<tr>

			    <th>ID </th>
			    <th>Nom </th>
			    <th>Prenom </th>
			    <th>Genre </th>
			    <th>Age </th>
			    <th>Profession </th>
			    <th>Adresse </th>
			    <th>Tel </th>
			    <th>Email </th>
			    <th>CNI </th>
			    <th>Action</th>
			</tr>

		    </thead>
		    <tbody>
			<?php foreach($patients as $patient): ?>
			<tr>
			    <td> <?= $patient->id; ?></td>
			    <td> <?= $patient->nom; ?></td>
			    <td> <?= $patient->prenom; ?></td>
			    <td> <?= $patient->genre; ?></td>
			    <td> <?= $patient->age; ?></td>
			    <td> <?= $patient->profession; ?></td>
			    <td> <?= $patient->adresse; ?></td>
			    <td> <?= $patient->tel; ?></td>
			    <td> <?= $patient->email; ?></td>
			    <td> <?= $patient->cni; ?></td>

			    <td>
				<a href="patients/edit/{{$patient->id}}">
				    
				    <button type="submit" class="btn btn-sm btn-primary">
					<span class="glyphicon glyphicon-edit"> Edit</span>   
				    </button>

				</a>

				
				<form action="patients/destroy/{{$patient->id}}" method="post">
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
