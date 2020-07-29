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
		    <em class="fa fa-home"></em>
		</a></li>
		<li class="active">Payements</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Modifier Service</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="/payements/{{$payement->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>User ID </label>
		<input class="form-control" name="user_id" value="{{$payement->user_id}}" placeholder="Nom payement">
		
		<label>Patient ID</label>
		<input class="form-control" name="patient_id" value="{{$payement->patient_id}}" placeholder="Nom payement">

		<label>Type_Payement ID</label>
		<select name="type_payement_id" id="type_payement_id" class="form-control">
                    <option placeholder="" value="{{$type_payement->id}}">
			{{$type_payement->name}}</option>
		    
                    @foreach($type_payements as $type_payement){
			<option value="{{$type_payement->id}}">{{$type_payement->name}}</option>
			}
		    @endforeach
                </select>
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Modifier</button>
		    
	</form>
</body>
</html>


@endsection
