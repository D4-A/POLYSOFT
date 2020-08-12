@extends('templates.default_layout')
@section('title', 'Ajout d\'un payement')
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
		<li class="active">Payements</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Payement Facture</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="{{url('payements')}}" method="post">
	    @csrf
	    <div class="form-group">
		<label>Patients  </label>
		<input class="form-control" name="patient_id" placeholder="patient">
		
		<label>Type de Payement </label>
		<select name="type_payement_id" id="type_payement_id" class="form-control">
                    <option placeholder="" value="">Choisissez un Type de Payement</option>
		    
                    @foreach($type_payements as $type_payement){
			<option value="{{$type_payement->id}}">{{$type_payement->name}}</option>
			}
		    @endforeach
                </select>
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Enregistre</button>
		    
	</form>
</body>
</html>


@endsection
