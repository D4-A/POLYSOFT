@extends('templates.default_layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metalusa</title>
</head>
<body>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-money"></em>
		</a></li>
		<li class="active">Type Payements</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Modifier Service</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="/typePayements/{{$typePayement->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>Service Name</label>
		<input class="form-control" name="name" value="{{$typePayement->name}}" placeholder="Name service">
		<input class="form-control" name="montant" value="{{$typePayement->montant}}" placeholder="Name typePayement">
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Modifier</button>
		    
	</form>
</body>
</html>


@endsection
