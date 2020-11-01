@extends('templates.default_layout')
@section('title', 'ENVOYER MAIL')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb" style="height:50px;padding-top:15px;">
				<li>
					<a href="#">
						<em class="fa fa-envelope"></em>
					</a>
				</li>
				<li class="active">Mails</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Envoyer un Mail</h1>
			</div>
		</div><!--/.row--><br>
		<form role="form" id="sendaction" action="{{url('emails')}}" enctype="multipart/form-data" method="post">
			<div style="padding-bottom:30px;">
				@csrf
				<div class="form-group">
					<label style="padding-left:10px;">Consultation ID</label>
					<input id="cons_id" class="form-control" name="consultation_id" placeholder="Consultation_ID" required><br>
					<label style="padding-left:10px;">Adresse Email</label>
					<input class="form-control" name="to_email" placeholder="Email_Adress" required><br>
					<label style="padding-left:10px;">Sujet du message</label>
					<input class="form-control" name="subject" placeholder="Mail_Sujet" required><br>
					<div class="form-group green-border-focus">
						<label for="body" style="padding-left:10px;">Message</label>
						<textarea class="form-control" id="body" name="body" required></textarea>
					</div>
					<label style="padding-left:10px;">Files</label>
					<input type="file" name="files[]" id="file" required multiple><br>
				</div>
				<button type="submit" class="btn btn-primary">
				<span class="glyphicon glyphicon-send" style="padding-right:8px;"> </span>Envoyer
				</button>
			</div>
		</form>
	</div>
@endsection
