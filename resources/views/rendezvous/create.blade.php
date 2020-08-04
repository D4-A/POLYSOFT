@extends('templates.default_layout')
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
		 var med = document.getElementById('medecin');
		 var link = '/rendezVous/refresh/' + med.value;
		 document.getElementById("linkre").setAttribute("href", link);
	     }
	    </script>
	    <select class="selectpicker" name="medecin" id="medecin">
		<option value="">choose docteur</option>
		@foreach($users as $user)
		    <option value="{{$user->id}}"> {{$user->name}} {{$user->prenom}}</option>
		@endforeach
	    </select>
	    <a href="#" id="linkre">
		<button type="button"  onclick="getComboA()" class="btn btn-success">
		    rendez-vous pour
		</button>
	    </a>
	    <table class="table table-bordered" id="table">

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
			    </td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
		    @endforeach
		</tbody>
            </table>
	</form>
@endsection
