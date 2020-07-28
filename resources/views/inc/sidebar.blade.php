<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<ul class="nav menu">
	    <li class="active"><a href="{url('/')}"><em class="fa fa-dashboard">&nbsp;</em> Home</a></li>
	    <li><a href="{{url('/patients')}}"><em class="fa fa-users">&nbsp;</em> patient</a></li>
	    <li><a href="{{url('/payements')}}"><em class="fa fa-shopping-cart">&nbsp;</em> Paiement</a></li>
	    <li><a href="{{url('/consultations')}}"><em class="fa fa-list-alt">&nbsp;</em> Consultations</a></li>
	    <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-cog">&nbsp;</em> Configuration <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
			</a>
			<ul class="children collapse" id="sub-item-1">
				<li><a class="" href="{{url('/services')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Services
					</a></li>
				<li><a class="" href="{{url('/fonctions')}}">
				    <span class="fa fa-arrow-right">&nbsp;</span> Fonctions
				</a></li>
				<li><a class="" href="{{url('/typePayements')}}">
				    <span class="fa fa-arrow-right">&nbsp;</span> Type Payement
				</a></li>
			</ul>
	    </li>
	    <li><a href="{{url('/examens')}}"><em class="fa fa-list-alt">&nbsp;</em> Examen</a></li>
	    <li><a href="{{url('/emails')}}"><em class="fa fa-list-alt">&nbsp;</em> Email</a></li>
	    <li><a href="{{url('/users')}}"><em class="fa fa-user-o">&nbsp;</em> Users</a></li>

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