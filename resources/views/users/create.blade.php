@extends('templates.default_layout')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-user-md"></em>
		</a></li>
		<li class="active">Users</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Add Users</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="{{url('users')}}" method="post">
	    @csrf
	    <div class="form-group">
		<label>Nom du User </label>
		<input class="form-control" name="name" placeholder="Nom user">
		<label>Prenom du User</label>
		<input class="form-control" name="prenom" placeholder="Prenom du user">
		<label>Service  </label>
		<select name="service_id" id="service_id" class="form-control">
                    <option placeholder="" value="">Service</option>
		    
                    @foreach($services as $service){
			<option value="{{$service->id}}">{{$service->name}}</option>
			}
		    @endforeach
                </select>
		
		<label>Fonction Occupe </label>
		<select name="fonction_id" id="fonction_id" class="form-control">
                    <option placeholder="" value="">Fonction</option>
		    
                    @foreach($fonctions as $fonction){
			<option value="{{$fonction->id}}">{{$fonction->name}}</option>
			}
		    @endforeach
                </select>
		
		<label>Genre du User </label>
		<select name="genre" id="genre" class="form-control">
		    <option value=""> Genre </option>
		    <option value="Masculin"> Musculin </option>
		    <option value="Feminin"> Feminin </option>
		</select>
		<label>Age du User</label>
		<input class="form-control" name="age" placeholder="Age du user">
		<label>Adresse du User </label>
		<input class="form-control" name="adresse" placeholder="Adresse du user">
		<label>Telephone du User</label>
		<input class="form-control" name="tel" placeholder="Telephone du users">
		<label>Email du User </label>
		<input type="email" class="form-control" name="email" placeholder="Email du user">
		<label>CNI du User </label>
		<input class="form-control" name="cni" placeholder="Cni du user">
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Enregistre</button>
		    
	</form>

@endsection
