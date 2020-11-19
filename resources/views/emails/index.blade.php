@extends('templates.default_layout')
@section('title', 'LISTE DES E-MAILS')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
		<li>
		    <a href="#">
			<em class="fa fa-envelope-open"></em>
		    </a>
		</li>
		<li class="active">Mails</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Liste des Mails envoyés</h1>
	    </div>
	</div><!--/.row--><br>
	
	<div class="row col-lg-12" style="padding-bottom:30px;">
	    <div class="col-lg-3 text-left" style="padding:0;">
		<a href="{{url('/emails/create')}}">
		    <button type="submit"  class="btn btn-success">
			<span class="glyphicon glyphicon-send" style="padding-right:8px;"></span>Envoyer un mail
		    </button>
		</a>
	    </div>
	    
	    <!-- search feature begin here -->
	    <div class="col-lg-6 text-right" style="padding:0;">
		<div class="col-lg-4" style="padding-right:10px;">
		    <h5 class="text-right"><strong>RECH MAIL PAR</strong></h5>
		</div>
		<div class="col-lg-3" style="padding:0;">
		    <select class="form-control" id="search">
			<option value="0"> ID</option>
			<option value="1"> Cons ID</option>
		    </select>
		</div>
		<div class="col-lg-5" style="padding-left:5px;">
		    <input style="height:34px;" class="input form-control" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
		</div>
	    </div>
	    <!-- search feature end here -->
	</div><!--/.row-->

	<table class="table table-striped" id="table" style="width:800px;">
	    
	    <thead style="background-color:#ccc;">
		<tr>
		    <th scope="col" style="text-align:center;">NUM </th>
		    <th scope="col">ID</th>
		    <th scope="col">Consultation ID</th>	
		    <th scope="col">Personel</th>
		    <th scope="col">Sujet</th>
		    <th scope="col">Message</th>
		    <th scope="col">FichiersEnvoyés </th>
		    <th scope="col">Actions</th>
		</tr>
	    	</thead>
			<tbody>
			    <?php foreach($emails as $key => $email): ?>
			    <tr>
				<td scope="row" style="text-align:center;"> <?= $key; ?></td>
				<th scope="row" > <?= $email->id; ?></th>
				<td>
				    @if ($email->consultation_id === null)
					<?= 'none';?>
				    @else
					<?= $email->consultation_id;?>
				    @endif
				</td>
				<td> <?= $email->name; ?></td>
				<td> <?= $email->subject; ?></td>
				<td> <?= $email->body; ?></td>
				<td>
				    @if ($email->filename === null)
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
