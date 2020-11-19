<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar" style="background-color:#ccc;padding-top:75px;">
    <ul class="nav menu">
	<li class="active"><a href="{{url('/home')}}"><em class="fa fa-home">&nbsp;</em> Home</a></li>
	<li><a href="{{url('/patients')}}"><em class="fa fa-users">&nbsp;</em> Patients</a></li>
	<li><a href="{{url('/payements')}}"><em class="fa fa-money">&nbsp;</em> Paiements</a></li>
	<li><a href="{{url('/consultations')}}"><em class="fa fa-hospital-o">&nbsp;</em> Consultations</a></li>
	<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
	    <em class="fa fa-plus">&nbsp;</em> Autres Options <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"></span>
	</a>
	<ul class="children collapse" id="sub-item-1">
	    <li><a class="" href="{{url('/services')}}">
		<span class="fa fa-arrow-right">&nbsp;</span> Services
	    </a></li>
	    <li><a class="" href="{{url('/fonctions')}}">
		<span class="fa fa-arrow-right">&nbsp;</span> Fonctions
	    </a></li>
	    <li><a class="" href="{{url('/typePayements')}}">
		<span class="fa fa-arrow-right">&nbsp;</span> Type de Paiement
	    </a></li>
	    <li><a class="" href="{{url('/creneaux')}}">
		<span class="fa fa-arrow-right">&nbsp;</span> Creneaux
	    </a></li>
	</ul>
	</li>
	<li><a href="{{url('/examens')}}"><em class="fa fa-upload">&nbsp;</em> Examens</a></li>
	<li><a href="{{url('/emails')}}"><em class="fa fa-envelope">&nbsp;</em> Email</a></li>
	<li><a href="{{url('/users')}}"><em class="fa fa-user-md">&nbsp;</em> Users</a></li>
	<li>
	    <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <em class="fa fa-sign-out">&nbsp;</em>{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
	</li>
    </ul>
</div>
