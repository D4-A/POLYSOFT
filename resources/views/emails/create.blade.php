@extends('templates.default_layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metalusa</title>
</head>
<body>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-home"></em>
		</a></li>
		<li class="active">Emails</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Send an Email</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="{{url('emails')}}" enctype="multipart/form-data" method="post">
	    @csrf
	    <div class="form-group">
		<label>Mail to</label>
		<input class="form-control" name="to_email" placeholder="Email">
		<label>subject</label>
		<input class="form-control" name="subject" placeholder="User examen">
		<label>body</label>
		<input class="form-control" name="body" placeholder="User examen">
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Send</button>
		    
	</form>
</body>
</html>


@endsection
