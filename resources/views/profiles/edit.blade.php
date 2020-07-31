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
		    <em class="fa fa-user-md"></em>
		</a></li>
		<li class="active">Profile</li>
	    </ol>
	</div><!--/.row-->
	
	<div class="row">
	    <div class="col-lg-12">
		<h1 class="page-header">Modifier profile infos</h1>
	    </div>
	</div><!--/.row-->
	<form role="form" action="/profile/{{$user->id}}" method="post">
	    @csrf
	    @method('PUT')
	    <div class="form-group row">
                <label for="nom" class="col-md-3 col-form-label">{{ __('Nom') }}</label>

                <div class="col-md-9">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="off" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
	    <div class="form-group row">
                <label for="Prenom" class="col-md-3 col-form-label">{{ __('Prenom') }}</label>

                <div class="col-md-9">
                    <input id="prenom" type="text" class="form-control @error('nom_prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') ?? $user->prenom }}" required autocomplete="off" autofocus>

                    @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
	    <div class="form-group row">
		<label for="genre" class="col-md-3 col-form-label">{{ __('Genre') }}</label>
		<div class="col-md-9">
                    <select name="genre" class="form-control">
                        <option {{ old('genre',$user->genre) == "Masculin" ? 'selected':'' }}  value="Masculin">Masculin</option>
			<option {{ old('genre',$user->genre) == "Feminin" ? 'selected':'' }}  value="Feminin">Feminin</option>
			<option {{ old('genre',$user->genre) == "No precise" ? 'selected':'' }}  value="No precise">No precise</option>
                    </select>
                    @error('genre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
	    <div class="form-group row">
                <label for="age" class="col-md-3 col-form-label">{{ __('Age') }}</label>

                <div class="col-md-9">
		    <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') ?? $user->age }}" required autocomplete="off" autofocus>

		    @error('age')
		    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
		    </span>
		    @enderror
                </div>
	    </div>
	    <div class="form-group row">
                <label for="tel" class="col-md-3 col-form-label">{{ __('Telephone') }}</label>

                <div class="col-md-9">
		    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') ?? $user->tel }}" required autocomplete="off" autofocus>

		    @error('tel')
		    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
		    </span>
		    @enderror
                </div>
	    </div>
	    <div class="form-group row">
                <label for="adresse" class="col-md-3 col-form-label">{{ __('Adresse') }}</label>

                <div class="col-md-9">
		    <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') ?? $user->adresse }}" required autocomplete="off" autofocus>

			@error('adresse')
			<span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
			</span>
			@enderror
                    </div>
		</div>
		<div class="form-group row">
                    <label for="cni" class="col-md-3 col-form-label">{{ __('cni') }}</label>

                    <div class="col-md-9">
			<input id="cni" type="text" class="form-control @error('cni') is-invalid @enderror" name="cni" value="{{ old('cni') ?? $user->cni }}" required autocomplete="off" autofocus>

			@error('cni')
			<span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
			</span>
			@enderror
                    </div>
		</div>

		<div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-9">
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" autocomplete="off" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label">{{ __('New Password') }}</label>

                <div class="col-md-9">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="off" autofocus>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="password-confirm" class="col-md-3 col-form-label">{{ __('Confirm Password') }}</label>

                <div class="col-md-9">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
		    @if ($message = Session::get('password_confirmation'))
			<div class="alert alert-danger">
			    <p>{{ $message }}</p>
			</div>
		    @endif
		</div>
		
            </div>

            <div class="form-group row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary col-md-12 glyphicon glyphicon-modify">
                        {{ __('MODIFIER INFOS') }}
                    </button>
                </div>
                <div class="col-md-5">
                    <a class="btn btn-primary col-md-12 glyphicon glyphicon-cancel" href="{{ url('profile') }}">
                        {{ __('ANNULER') }}
                    </a>
                </div>
            </div>
		    
	</form>
</body>
</html>


@endsection
