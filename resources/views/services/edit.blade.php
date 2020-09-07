@extends('templates.default_layout')
@section('title', 'EDITER SERVICE')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
			<li>
				<a href="#">
					<em class="fa fa-home"></em>
				</a>
				</li>
				<li class="active">Services</li>
			</ol>
		</div><!--/.row-->
	
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Modifier Service</h1>
			</div>
		</div><!--/.row--><br>
		
		<form role="form" action="/services/{{$service->id}}" method="post">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label style="padding-left:10px;">Nom du Service</label>
				<input class="form-control" name="name" value="{{$service->name}}" placeholder="Nom_Service" required><br>
			</div>
				
			<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-saved" style="padding-right:8px;"> </span>Modifier
			</button>
				
		</form>
	</div>
@endsection
