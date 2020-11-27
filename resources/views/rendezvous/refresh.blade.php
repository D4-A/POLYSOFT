@extends('templates.default_layout')
@section('title', 'RE-VOUS DOCTEUR')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row" style="padding-bottom:50px;">
	    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
		<li>
		    <a href="#">
			<em class="fa fa-calendar"></em>
		    </a>
		</li>
		<li class="active">Rendez-Vous</li>
	    </ol>
	</div><!--/.row-->
	
	<form action="{{url('/rendezVous')}}" method="post">
	    @csrf
	    <div class="col-md-12" style="padding-bottom:30px;">
		<div class="col-md-12">
		    <script>
		     function getComboA() {
			 let link;
			 let med = document.getElementById('medecin');
			 if(med.value === ""){
			     link = '/rendezVous/refresh/' + 0;
			 }
			 else{
			     link = '/rendezVous/refresh/' + med.value;
			 }
			 document.getElementById("linkre").setAttribute("href", link);
		     }
		    </script>

		    <div class="col-lg-3">
			<select class="form-control" name="medecin" id="medecin">
			    <option value="">Choisir le Docteur</option>
			    @foreach($users as $user)
				<option value="{{$user->id}}"> {{$user->name}} {{$user->prenom}}</option>
			    @endforeach
			</select>
		    </div>
		    <div class="col-lg-3">
			<a href="#" id="linkre">
			    <button type="button"  onclick="getComboA()" class="btn btn-info">
				<span class="glyphicon glyphicon-refresh" style="padding-right:8px;"></span>Actualiser
			    </button>
			</a>
		    </div>
		</div>
		<div class="col-md-12" style="padding-top:30px;padding-bottom:20px;">
		    <div class="col-lg-3">
			<input class="form-control" type="text" name="paiement_id" placeholder="Paiement_ID" style="height:40px;" required>
		    </div>
		    <div class="col-lg-3">
			<input class="form-control" type="text" name="description" placeholder="Description_Rendez-vous" style="height:40px;">
		    </div>
		    <div class="col-lg-3">
			<button type="submit" class="btn btn-success" style="height:38px;">
			    <span class="glyphicon glyphicon-plus" style="padding-right:8px;"></span>Prendre Rendez-Vous
			</button>
		    </div>
		</div>
		<table class="table table-bordered" id="table">
		    @if ($message = Session::get('error'))
			<div class="alert alert-danger">
			    <p>{{ $message }}</p>
			</div>
		    @endif
		    <thead>
			<tr>
			    <th scope="col"> Horaire</th>
			    @foreach($days as $day)
				<th scope="col">{{$day}}</th>
			    @endforeach
			</tr>
		    </thead>
		    <tbody>
			@foreach($heures as $heure)
			    <tr>
				<th scope="row">{{$heure}}</th>
				<td>
				    @if(isset($interval[$heure . '-Mon']))
					<input type="radio" name="creneau_id" value="{{ $interval[$heure . '-Mon']}}"> 
				    @endif
				</td>
				<td>
				    @if(isset($interval[$heure . '-Tue']))
					<input type="radio" name="creneau_id" value="{{ $interval[$heure . '-Tue']}}"> 
				    @endif
				</td>
				<td>
				    @if(isset($interval[$heure . '-Wed']))
					<input type="radio" name="creneau_id" value="{{ $interval[$heure . '-Wed']}}"> 
				    @endif
				</td>
				<td>
				    @if(isset($interval[$heure . '-Thu']))
					<input type="radio" name="creneau_id" value="{{ $interval[$heure . '-Thu']}}"> 
				    @endif
				</td>
				<td>
				    @if(isset($interval[$heure . '-Fri']))
					<input type="radio" name="creneau_id" value="{{ $interval[$heure . '-Fri']}}"> 
				    @endif
				</td>
				<td>
				    @if(isset($interval[$heure . '-Sat']))
					<input type="radio" name="creneau_id" value="{{ $interval[$heure . '-Sat']}}"> 
				    @endif
				</td>
				<td>
				    @if(isset($interval[$heure . '-Sun']))
					<input type="radio" name="creneau_id" value="{{ $interval[$heure . '-Sun']}}"> 
				    @endif
				</td>
			    </tr>
			@endforeach
		    </tbody>
		</table>
	    </div>
	</form>
    </div>
@endsection
