@extends('templates.default_layout')
@section('title', 'MON PROFILE')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb" style="height:50px;padding-top:15px;">
                <li>
                    <a href="#">
                        <em class="fa fa-user-md"></em>
                    </a>
                </li>
                <li class="active">Profile</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12"  style="padding-left:150px;">
                <h1 class="page-header">Mon Profile</h1>
            </div>
        </div><!--/.row--><br>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
        @endif
        <div class="card-body">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label class="col-md-3 col-form-label">{{ __('Nom et Prénom') }}</label>
                    <div class="col-md-6 col-form-label">
                        {{ $user->prenom }} {{ $user->name }}
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Service') }}</label>
                        <div class="col-md-6 col-form-label">
                            {{ App\Service::find($user->service_id)->name }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Fonction') }}</label>
                        <div class="col-md-6 col-form-label">
                            {{ App\Fonction::find($user->fonction_id)->name }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Genre') }}</label>
                        <div class="col-md-6 col-form-label">
                            {{ $user->genre }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Date Naissance') }}</label>
                        <div class="col-md-6 col-form-label">
                            {{ $user->ans_naiss }}
                        </div>
                    </div>
                </div>
            </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Adresse') }}</label>
                        <div class="col-md-6 col-form-label">
                            {{ $user->adresse }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Téléphone') }}</label>
                        <div class="col-md-6 col-form-label">
                            {{ $user->tel }} 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('E-mail') }}</label>
                        <div class="col-md-6 col-form-label">
                            {{ $user->email }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="form-group">
                        <label class="col-md-3 col-form-label">{{ __('Carte d\' Identité') }}</label>
                        <div class="col-md-6 col-form-label">
                            {{ $user->cni }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6" style="padding-top:20px;">
                <div class="col-md-6">
                    <a class="btn btn-primary col-md-12" href="{{url('profile/edit',$user->id) }}">
                        <span class="glyphicon glyphicon-edit" style="padding-right:8px;"> </span>EDITER
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
