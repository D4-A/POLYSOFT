@extends('templates.default_layout')
@section('title', 'Ajout d\'un patient')
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
			<input type="text" class="form-control" name="nom" placeholder="Nom du patient" required>
			<label>Prenom </label>
			<input type="text" class="form-control" name="prenom" placeholder="Prenom du patient" required>
			<label>Genre </label>
			<select name="genre" id="genre" class="form-control" required>
				<option value="">sectionner le Genre</option>
				<option value="Masculin">Masculin</option>
				<option value="Feminin">Feminin</option>
			</select>
			<label>Annee de Naissance </label>
			<input type="date" class="form-control" name="ans_naiss" placeholder="Annee de naissance du patient" required>
			<label>Profession</label>
			<input type="text" class="form-control" name="profession" placeholder="Profession du patient" required>
			<label>Adresse</label>
			<input type="text" class="form-control" name="adresse" placeholder="Adresse du patient" required>
			<label>Telephone </label>
			<input type="text" class="form-control" name="tel" placeholder="Telephone du patient" required>
			<label>Email </label>
			<input type="email" class="form-control" name="email" placeholder="Email du patient" required>
			<label>CNI </label>
			<input type="text" class="form-control" name="cni" placeholder="Numero Carte_Identite du patient" required>
	    </div>

	    <button type="submit" class="btn btn-primary">
		<span class="glyphicon glyphicon-save"> </span>Enregistrer</button>

	</form>
@endsection
