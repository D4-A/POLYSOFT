<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="padding:0px;">
					<span><img src="{{asset('plogin/images/log2.png')}}" style="width:225px;height:155px;"/><span>
				</a>
				<ul class="nav navbar-top-links navbar-right">
				    <li class="dropdown"><a href="{{url('/rendezVous')}}">
					<em class="fa fa-calendar"></em>Agenda
				    </a>
				    
				    </li>
				    <li class="dropdown"><a href="{{url('/profile')}}">
					<em class="fa fa-user"></em>
					{{Auth::user()->name}}
				    </a>
				   
				    </li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
