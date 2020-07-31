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
					<em class="fa fa-upload"></em>
				</a></li>
				<li class="active">Examens</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
			    <h1 class="page-header">Examens upload</h1>
			</div>
        </div><!--/.row-->
    <a href="{{url('/examens/create')}}">
        <button type="submit"  class="btn btn-success">
        <span class="glyphicon glyphicon-plus"></span>
        Nouveau Examen
    
    </button>
    </a>
        
        <table class="table">

        <thead>
 
        <tr>

            <th>ID </th>
	    <th>ID User</th>
	    <th>ID Consulation</th>
            <th>Nom Examen</th>
	    <th>files </th>
            <th>Action</th>
        </tr>

        </thead>
        <tbody>
        <?php foreach($examens as $examen): ?>
            <tr>
                <td> <?= $examen->id; ?></td>
		<td> <?= $examen->user_id; ?></td>
		<td> <?= $examen->consultation_id; ?></td>
                <td> <?= $examen->nom_examen; ?></td>
		<td> <?= $examen->files; ?></td>

                <td>
                    <a href="examens/edit/{{$examen->id}}">
                    
                    <button type="submit" class="btn btn-sm btn-primary">
                        <span class="glyphicon glyphicon-edit"> Edit</span>   
                    </button>

                    </a>
                    
                    <form action="examens/destroy/{{$examen->id}}" method="post">
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
