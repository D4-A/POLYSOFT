@extends('templates.default_layout')
@section('title', 'LISTE DES PATIENTS')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-users"></em>
					</a>
				</li>
				<li class="active">Patients</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Liste des patients</h1>
			</div>
		</div><!--/.row--><br>

		<div class="row col-lg-12" style="padding-bottom:30px;">
			<div class="col-lg-6 text-left" style="padding:0;">
				@canany(['isAdmin','isRecept','isInf'])
				<a href="{{url('/patients/create')}}">
					<button type="submit"  class="btn btn-success">
						<span class="glyphicon glyphicon-plus" style="padding-right:8px;"></span> Nouveau Patient
					</button>
				</a>
				@endcan
			</div>
			<!-- search feature begin here -->
			<div class="col-lg-6 text-right" style="padding:0;">
				<div class="col-lg-4" style="padding-right:10px;">
					<h5 class="text-right"><strong>RECHERCHE PAR</strong></h5>
				</div>
				<div class="col-lg-3" style="padding:0;">
					<select class="form-control" id="search">
						<option value="1"> ID</option>
						<option value="2"> Nom</option>
						<option value="3"> Prenom</option>
						<option value="9"> Email</option>
						<option value="10"> CNI</option>
					</select>
				</div>
				<div class="col-lg-5" style="padding-left:5px;">
					<input style="height:34px;" class="input form-control" type="text" id="input" onkeyup="incrementalsearch('input','table')" placeholder="Search regex">
				</div>
			</div>
			<!-- search feature end here -->
		</div><!--/.row-->
		
		<table class="table table-condensed table-striped" id="table">

			<thead style="background-color:#ccc;">
				<tr>
					<th scope="col" style="text-align:center;">NUM </th>
					<th scope="col">ID </th>
					<th scope="col">Nom</th>
					<th scope="col">Prénom </th>
					<th scope="col">Genre </th>
					<th scope="col">Date_Naiss </th>
					<th scope="col">Adresse </th>
					<th scope="col">Téléphone </th>
					<th scope="col">E-mail </th>
					<th scope="col">C.N.ID </th>
					<th scope="col" style="text-align:center;">Actions</th>
					
				</tr>
			</thead>
			
			<tbody>
			    <?php foreach($patients as $key => $patient): ?>
			    <tr>
				<td scope="row" style="text-align:center;"> <?= $key; ?></td>
				<td> <?= $patient->id; ?></td>
				<td> <?= $patient->nom; ?></td>
				<td> <?= $patient->prenom; ?></td>
				<td> <?= $patient->genre; ?></td>
				<td> <?= $patient->ans_naiss; ?></td>
				<td> <?= $patient->adresse; ?></td>
				<td> <?= $patient->tel; ?></td>
				<td> <?= $patient->email; ?></td>
				<td> <?= $patient->cni; ?></td>
						
				<td style="display:flex;">
				    @canany(['isAdmin','isRecept','isInf','isDoctor'])
				    <a href="patients/edit/{{$patient->id}}" style="padding-right:10px;">
					<button type="submit" class="btn btn-sm btn-primary">
					    <span class="glyphicon glyphicon-edit"></span> Edit
					</button>
				    </a>
				    @endcan
				    @can('isAdmin')
				    <form action="patients/destroy/{{$patient->id}}" method="post">
					@csrf
					<button type="submit" onclick="return confirm('voulez-vous vraiment supprimer?')" class="btn btn-sm btn-danger">
					    <span class="glyphicon glyphicon-trash"></span> Delete
					</button>
				    </form>
				    @endcan
				</td>
			    </tr>
			    <?php endforeach; ?>
			</tbody>
			
		</table>
	</div>
@endsection
