<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
	<li class="active"><a href="{{url('/home')}}"><em class="fa fa-home">&nbsp;</em> Home</a></li>
	<li><a href="{{url('/patients')}}"><em class="fa fa-users">&nbsp;</em> patient</a></li>
	<li><a href="{{url('/payements')}}"><em class="fa fa-money">&nbsp;</em> Payement</a></li>
	@canany(['isDoctor','isAdmin'])
	<li><a href="{{url('/consultations')}}"><em class="fa fa-hospital-o">&nbsp;</em> Consultations</a></li>
	@endcan
	<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
	    <em class="fa fa-cog">&nbsp;</em> Extras ressources <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
	</a>
	<ul class="children collapse" id="sub-item-1">
	    <li><a class="" href="{{url('/services')}}">
		<span class="fa fa-arrow-right">&nbsp;</span> Services
	    </a></li>
	    <li><a class="" href="{{url('/fonctions')}}">
		<span class="fa fa-arrow-right">&nbsp;</span> Fonctions
	    </a></li>
	    <li><a class="" href="{{url('/typePayements')}}">
		<span class="fa fa-arrow-right">&nbsp;</span> Type de Payement
	    </a></li>
	    <li><a class="" href="{{url('/creneaux')}}">
		<span class="fa fa-arrow-right">&nbsp;</span> creneau
	    </a></li>
	</ul>
	</li>
	<li><a href="{{url('/examens')}}"><em class="fa fa-upload">&nbsp;</em> Examen</a></li>
	<li><a href="{{url('/emails')}}"><em class="fa fa-envelope">&nbsp;</em> Email</a></li>
	@can('isAdmin')
	<li><a href="{{url('/users')}}"><em class="fa fa-user-md">&nbsp;</em> Users</a></li>
	@endcan
	<li>
	    <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
	</li>
    </ul>
</div>
