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
		<li class="active">Users</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Modifier Users</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="/users/{{$user->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group">
		<label>Nom du User </label>
		<input class="form-control" name="name" value="{{$user->name}}" placeholder="Nom user">
		<label>Service  </label>
		<select name="service_id" id="service_id" class="form-control">
                    <option placeholder="" value="{{$service->id}}">
			{{$service->name}}</option>
		    
                    @foreach($services as $service){
			<option value="{{$service->id}}">{{$service->name}}</option>
			}
		    @endforeach
                </select>
		
		<label>Fonction Occupe </label>
		<select name="fonction_id" id="fonction_id" class="form-control">
                    <option placeholder="" value="{{$fonction->id}}">{{$fonction->name}}</option>
		    
                    @foreach($fonctions as $fonction){
			<option value="{{$fonction->id}}">{{$fonction->name}}</option>
			}
		    @endforeach
                </select>
		<label>Prenom du User</label>
		<input class="form-control" name="prenom" value="{{$user->prenom}}" placeholder="prenom du user">
		<label>Genre du User </label>
		<input class="form-control" name="genre" value="{{$user->genre}}" placeholder="Genre du user">
		<label>Age du User</label>
		<input class="form-control" name="age" value="{{$user->age}}" placeholder="Age du user">
		<label>Adresse du User </label>
		<input class="form-control" name="adresse" value="{{$user->adresse}}" placeholder="Adresse du user">
		<label>Telephone du User</label>
		<input class="form-control" name="tel" value="{{$user->tel}}" placeholder="Telephone du users">
		<label>Email du User </label>
		<input class="form-control" name="email" value="{{$user->email}}" placeholder="Email du user">
		<label>CNI du User </label>
		<input class="form-control" name="cni" value="{{$user->cni}}" placeholder="Cni du user">
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Modifier</button>
		    
	</form>
</body>
</html>


@endsection
