@extends('templates.default_layout')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-envelope-open"></em>
		</a></li>
		<li class="active">Emails</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Email</h1>
	    </div>
	</div><!--/.row-->
	<a href="{{url('/emails/create')}}">
	    <button type="submit"  class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span>
		Nouveau Email

	    </button>
	</a>
	<!-- search feature begin here -->
	<select class="selectpicker" id="search">
	    <option value="0"> ID</option>
	    <option value="1"> ID Sender</option>
	    <option value="2"> ID Receiver</option>

	</select>
	<input class="input" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">

	<!-- search feature end here -->
	<table class="table" id="table">
	    <thead>
		<tr>
		    <th>ID </th>
		    <th>Personel </th>
		    <th>Consultation ID</th>
		    <th>Subject</th>
		    <th>Body </th>
		    <th>filename </th>
		    <th>Action</th>
		</tr>
	    </thead>
	    <tbody>
		<?php foreach($emails as $email): ?>
		<tr>
		    <td> <?= $email->id; ?></td>
		    <td> <?= $email->name; ?></td>
		    <td> @if ($email->consultation_id === null)
			<?= 'none';?>
		    @else
			<?= $email->consultation_id;?>
		    @endif
		    </td>
		    <td> <?= $email->subject; ?></td>
		    <td> <?= $email->body; ?></td>
		    <td> @if ($email->filename === null)
			<?= 'none';?>
		    @else
			<?= $email->filename;?>
		    @endif
		    </td>
		    <td>
			<form action="emails/destroy/{{$email->id}}" method="post">
			    @csrf
			    <button type="submit" onclick="return confirm('voulez-vous vraiment supprimer?')" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-trash"> Delete</span>
			    </button>
			</form>
                    </td>
		</tr>
		<?php endforeach; ?>
	    </tbody>
	</table>
    </div>
@endsection
