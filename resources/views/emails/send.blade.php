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
			<li class="active">Home</li>
		    </ol>
		</div><!--/.row-->
		
		<div class="row">
		    <div class="col-lg-12">
			<h1 class="page-header">Send an Email</h1>
		    </div>
		</div><!--/.row-->
		<form role="form" action="/sendp" enctype="multipart/form-data" method="post">
		    @csrf
		    <div class="form-group">
			<label>User ID</label>
			<input class="form-control" name="user_id" value="{{Auth::id()}}" readonly placeholder="User examen">
			<label>Consultation ID</label>
			<input class="form-control" name="consultation_id" value="{{$consultation_id}}" readonly placeholder="User examen">
			<label>Mail to</label>
			<input class="form-control" name="to_email" value="{{$email}}" readonly placeholder="Email">
			<label>subject</label>
			<input class="form-control" name="subject" placeholder="User examen">
			<label>body</label>
			<input class="form-control" name="body" placeholder="User examen">
			<div class="form-group row">
			    <label for="files" class="col-md-3 col-form-label">{{ __('Files') }}</label>

			    <div class="col-md-9"> 
                                @foreach ($files as $key => $file)
				    <input type="checkbox" name="filepath2[]"
					   value="{{$file}}"> {{basename($file)}}
				@endforeach
				
			    </div>
                        </div>
		    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Send</button>
		    
		</form>
	</body>
    </html>


@endsection
