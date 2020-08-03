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

	<!-- search feature end here -->
	<table class="table" id="table">

            <thead>
		<tr>
		    <th>Horaire<th>
			@foreach($days as $day)
			    <th>{{$day}}</th>
			@endforeach
		</tr>
            </thead>
            <tbody>
		@foreach($creneaux as $creneau)
		    <tr>
			<td>{{$creneau}}</td>
			<td></td>
			<td></td>
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
@endsection
