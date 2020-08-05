@extends('templates.default_layout')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-envelope"></em>
		</a></li>
		<li class="active">Emails</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Send an Email</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" id="sendaction" action="{{url('emails')}}" enctype="multipart/form-data" method="post">
	    @csrf
	    <div class="form-group">
		<label>For consultation_id</label>
		<input type="number" min="1" id="cons_id" class="form-control" name="consultation_id" placeholder="Consultation id">
		<label>Mail to</label>
		<input class="form-control" name="to_email" placeholder="Email">
		<label>subject</label>
		<input class="form-control" name="subject" placeholder="User examen">
		<div class="form-group green-border-focus">
		    <label for="body">Message</label>
		    <textarea class="form-control" id="body" name="body" rows="3">
		    </textarea>
		</div>
		<label>Files</label>
		<label id="files">  </label>
	    </div>
		    
		    <button type="submit" class="btn btn-primary">
			<span class="glyphicon glyphicon-save"> </span>
			
			Send</button>
		    
	</form>
@endsection
