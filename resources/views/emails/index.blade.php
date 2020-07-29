@extends('templates.default_layout')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poluclinique du Nord</title>
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
				<h1 class="page-header">Email</h1>
			</div>
        </div><!--/.row-->
    <a href="{{url('/emails/create')}}">
        <button type="submit"  class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>
            Nouveau Email
	    
	</button>
    </a>
    <form action="emails/send" method="post">
	@csrf
        <div class="form-group">
            <div class="input-group">
                <input name="consultation_id" class="form-control">
                <span class="">
                    <button type="submit" class="btn btn-info">envoi Examen</button>
                </span>
            </div>
        </div>
    </form>

    
        
        <table class="table">

        <thead>
 
        <tr>

            <th>ID </th>
	    <th>ID Personnel</th>
	    <th>ID Consultation</th>
            <th>Subject</th>
	    <th>Body </th>
	    <th>filename </th>
            <th>Action</th>
        </tr>

        </thead>
        <tbody>
        <?php foreach($emails as $email): ?>
            <tr>
                <td> <?= $email->id; ?></td>
		<td> <?= $email->user_id; ?></td>
		<td> <?= $email->consultation_id; ?></td>
                <td> <?= $email->subject; ?></td>
		<td> <?= $email->body; ?></td>
		<td> <?= $email->filename; ?></td>

                <td>
                    <form action="emails/destroy/{{$email->id}}" method="post">
			@csrf
                        <button type="submit" class="btn btn-sm btn-danger">
                            <span class="glyphicon glyphicon-trash"> Delete</span> 
                        </button>
                    </form>                        
                        </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    
        </table>
            
</body>
</html>
@endsection
