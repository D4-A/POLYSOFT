@extends('templates.default_layout')
@section('title', 'AJOUTER FONCTION')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-home"></em>
					</a>
				</li>
				<li class="active">Fonctions</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Ajouter Fonction</h1>
			</div>
		</div><!--/.row--><br>

		<form role="form" action="{{url('fonctions')}}" method="post">
			@csrf
			<div class="form-group">
			<label style="padding-left:10px;">Nom Fonction</label>
			<input class="form-control" name="name" placeholder="Nom_Fonction" required><br>
			<label style="padding-left:10px;">Fonction Diplôme</label>
			<input class="form-control" name="diplome" placeholder="Diplôme_Fonction" required><br>
			</div>

			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-save" style="padding-right:8px;"> </span>Enregistrer
			</button>

		</form>
	</div>
@endsection
