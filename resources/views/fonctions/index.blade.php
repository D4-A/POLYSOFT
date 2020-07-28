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
				<h1 class="page-header">Fonctions</h1>
			</div>
        </div><!--/.row-->
    <a href="{{url('/fonctions/create')}}">
        <button type="submit"  class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span>
        Nouveau service
    
    </button>
    </a>
        
        <table class="table">

        <thead>
 
        <tr>

            <th>ID Fonction</th>
            <th>Nom Fonction</th>
	    <th>Diplome </th>
            <th>Action</th>
        </tr>

        </thead>
        <tbody>
        <?php foreach($fonctions as $fonction): ?>
            <tr>
                <td> <?= $fonction->id; ?></td>
                <td> <?= $fonction->name; ?></td>
		<td> <?= $fonction->diplome; ?></td>
                <td>
                    <a href="fonctions/edit/{{$fonction->id}}">
                    
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="glyphicon glyphicon-edit"> Edit</span>   
                    </button>

                    </a>

                    
                    <form action="fonctions/destroy/{{$fonction->id}}" method="post">
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
