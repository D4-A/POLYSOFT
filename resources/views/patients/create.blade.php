@extends('templates.default_layout')
@section('content')

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
		<h1 class="page-header">Add Patients</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="{{url('patients')}}" method="post">
	    @csrf
	    <div class="form-group">
		<label>Nom</label>
		<input class="form-control" name="nom" placeholder="Nom patient">
		<label>Prenom </label>
		<input class="form-control" name="prenom" placeholder="Prenom du patient">
		<label>Genret </label>
		<select name="genre" id="genre" class="form-control">
		    <option value="">sectionne le Genre</option>
                    <option value="Masculin">Masculin</option>
		    <option value="Feminin">Feminin</option>
		    <option value="No Precise">No Precise</option>
                </select>
		<label>Annee de Naissance </label>
		<input class="form-control" name="ans_naiss" placeholder="Annee de naissance du patient">
		<label>Profession</label>
		<input class="form-control" name="profession" placeholder="Profession du patient">
		<label>Adresse</label>
		<input class="form-control" name="adresse" placeholder="Adresse du patient">
		<label>Telephone </label>
		<input type="number" class="form-control" name="tel" placeholder="Telephone du patients">
		<label>Email </label>
		<input type="email" class="form-control" name="email" placeholder="Email du patient">
		<label>CNI </label>
		<input class="form-control" name="cni" placeholder="Cni du patient">
	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>

		Enregistre</button>

	</form>
@endsection
