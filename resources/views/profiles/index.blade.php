@extends('templates.default_layout')
@section('title', 'Mon profile')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
	    <ol class="breadcrumb">
		<li><a href="#">
		    <em class="fa fa-user-md"></em>
		</a></li>
		<li class="active">Profile</li>
	    </ol>
	</div><!--/.row-->

	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Profile</h1>
	    </div>
	</div><!--/.row-->
	@if ($message = Session::get('success'))
	    <div class="alert alert-success">
		<p>{{ $message }}</p>
	    </div>
	@endif
	<div class="card-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label class="col-md-3 col-form-label">{{ __('Nom et Prénom') }}</label>
                    <label class="col-md-6 col-form-label">
			<strong>{{ $user->name }} {{ $user->prenom }}</strong>
		    </label>
                </div>
            </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Service') }}</label>
                        <label class="col-md-6 col-form-label">
			    <strong>{{ App\Service::find($user->service_id)->name }}
			    </strong></label>
                    </div>
                </div>
            </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Fonction') }}</label>
                        <label class="col-md-6 col-form-label">
			    <strong>{{ App\Fonction::find($user->fonction_id)->name }}
			    </strong></label>
                    </div>
                </div>
            </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Genre') }}</label>
                        <label class="col-md-6 col-form-label">
			    <strong>{{ $user->genre }}
			    </strong></label>
                    </div>
                </div>
            </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Annee Naissance') }}</label>
                        <label class="col-md-6 col-form-label">
			    <strong>{{ $user->ans_naiss }}
			    </strong></label>
                    </div>
                </div>
            </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Telephone Adress') }}</label>
                        <label class="col-md-6 col-form-label">
			    <strong>{{ $user->tel }}
			    </strong></label>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('E-mail Adress') }}</label>
                        <label class="col-md-6 col-form-label">
			    <strong>{{ $user->email }}
			    </strong></label>
                    </div>
                </div>
            </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('cni') }}</label>
                        <label class="col-md-6 col-form-label">
			    <strong>{{ $user->cni }}
			    </strong></label>
                    </div>
                </div>
            </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="col-md-12">
                        <a class="btn btn-primary col-md-12 glyphicon glyphicon-edit" href="{{url('profile/edit',$user->id) }}">EDITER</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
