@extends('templates.default_layout')
@section('title', 'liste  des services')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-home"></em>
		</a></li>
		<li class="active">Services</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Services</h1>
	    </div>
	</div><!--/.row-->
	@can('isAdmin')
	<a href="{{url('/services/create')}}">
	    <button type="submit"  class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span>
		Nouveau service
	    </button>
	</a>
	@endcan
	<select class="selectpicker" id="search">
	    <option value="0"> ID</option>
	    <option value="1"> Nom</option>
	</select>
	<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
	<table class="table" id="table">
	    <thead>
		<tr>
		    <th>ID Service</th>
		    <th>Nom Service</th>
		    @can('isAdmin')
		    <th>Action</th>
		    @endcan
		</tr>
	    </thead>
	    <tbody>
		<?php foreach($services as $service): ?>
		<tr>
		    <td> <?= $service->id; ?></td>
		    <td> <?= $service->name; ?></td>
		    <td>
			<a href="services/edit/{{$service->id}}">
			    @can('isAdmin')
			    <button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-edit"> Edit</span>
			    </button>
			    @endcan
			</a>
			<form action="services/destroy/{{$service->id}}" method="post">
			    @csrf
			    @can('isAdmin')
			    <button type="submit" onclick="return confirm('voulez-vous vraiment supprimer?')" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"> Delete</span>
			    </button>
			    @endcan
			</form>
                    </td>
		</tr>
		<?php endforeach; ?>
	    </tbody>
	</table>
@endsection
