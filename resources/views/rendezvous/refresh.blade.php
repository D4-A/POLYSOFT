@extends('templates.default_layout')
@section('title', 'rendez-vous du docteur')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-calendar"></em>
		</a></li>
		<li class="active">Rendez vous</li>
	    </ol>
	</div><!--/.row-->
	
	<form action="{{url('/rendezVous')}}" method="post">
	    @csrf
	    <button type="submit"  class="btn btn-success">
		<span class="glyphicon glyphicon-plus"></span>
		prendre le rendez-vous
	    </button>
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
	    <select class="selectpicker" name="medecin" id="medecin">
		<option value="">Docteur</option>
		@foreach($users as $user)
		    <option value="{{$user->id}}"> {{$user->name}} {{$user->prenom}}</option>
		@endforeach
	    </select>
	    <a href="#" id="linkre">
		<button type="button"  onclick="getComboA()" class="btn btn-success">
		    <span class="glyphicon glyphicon-search"></span>
		    search
		</button>
	    </a><br>
	    <input class="input" type="text" name="patient_id" placeholder="Patient ID">
	    <input class="input" type="text" name="payement_id" placeholder="Payement ID">
	    <input class="input" type="text" name="description" placeholder="Description Informative">
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
			    <th scope="row">
				{{$heure}}</th>
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
	</form>
@endsection
