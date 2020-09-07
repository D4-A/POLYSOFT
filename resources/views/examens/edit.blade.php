@extends('templates.default_layout')
@section('title', 'EDITER EXAMEN')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-upload"></em>
					</a>
				</li>
				<li class="active">Examens</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Modifier Examen</h1>
			</div>
		</div><!--/.row--><br>

		<form role="form" action="/examens/{{$examen->id}}"  enctype="multipart/form-data" method="post">
			<div style="padding-bottom:30px;">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label style="padding-left:10px;">UserID</label>
					<input class="form-control" name="user_id" value="{{$examen->consultation_id}}" placeholder="User_ID" required><br>
					<label style="padding-left:10px;">ConsulationID</label>
					<input class="form-control" name="consultation_id" value="{{$examen->user_id}}" placeholder="Consultation_ID" required><br>
					<label style="padding-left:10px;">Nom Examen</label>
					<input class="form-control" name="nom" value="{{$examen->nom_examen}}" placeholder="Nom de l'examen" required><br>
					<label style="padding-left:10px;">files to upload </label>
					<input type="file" name="files[]" id="file" required multiple><br>
				</div>

				<button type="submit" class="btn btn-primary">
					<span class="glyphicon glyphicon-saved" style="padding-right:8px;"> </span>Modifier
				</button>
			</div>
		</form>
	</div>
@endsection
