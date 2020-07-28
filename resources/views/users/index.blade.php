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
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Home</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Users</h1>
			</div>
        </div><!--/.row-->
    <a href="{{url('/users/create')}}">
        <button type="submit"  class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span>
        Nouveau User
    
    </button>
    </a>
        
        <table class="table">

        <thead>
 
        <tr>

            <th>ID </th>
	    <th>ID Service</th>
	    <th>ID Fonction</th>
            <th>Nom </th>
	    <th>Prenom </th>
	    <th>Genre </th>
	    <th>Age </th>
	    <th>Adresse </th>
	    <th>Tel </th>
	    <th>Email </th>
	    <th>CNI </th>
            <th>Action</th>
        </tr>

        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td> <?= $user->id; ?></td>
		<td> <?= $user->service_id; ?></td>
		<td> <?= $user->fonction_id; ?></td>
                <td> <?= $user->name; ?></td>
		<td> <?= $user->prenom; ?></td>
		<td> <?= $user->genre; ?></td>
		<td> <?= $user->age; ?></td>
		<td> <?= $user->adresse; ?></td>
		<td> <?= $user->tel; ?></td>
		<td> <?= $user->email; ?></td>
		<td> <?= $user->cni; ?></td>

                <td>
                    <a href="users/edit/{{$user->id}}">
                    
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="glyphicon glyphicon-edit"> Edit</span>   
                    </button>

                    </a>

                    
                    <form action="users/destroy/{{$user->id}}" method="post">
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