@extends('templates.default_layout')
@section('title','HOME')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb" style="height:50px;padding-top:15px;">
		<li><a href="#">
		    <em class="fa fa-home"></em>
		</a></li>
		<li class="active">Home</li>
	    </ol>
	</div>
	<!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Bienvenue à la POLYCLINIQUE DU NORD</h1>
	    </div>
		<div class="col-lg-12">
		<img src="{{asset('plogin/images/log2.png')}}" style="width:82%;height:500px;" alt="Photo Home">
	    </div>
	</div>
	<!--/.row-->

    </div>
@endsection()
