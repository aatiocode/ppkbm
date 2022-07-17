<nav class="navbar navbar-expand-lg mb-5 mt-2">
	<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
		<div class="dropdown">
      <h6 class="text-success text-capitalize text-truncate" role="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Hi {{preg_replace('/([a-z0-9])?([A-Z])/','$1 $2',Session::get('name'))}}! <i class="fas fa-caret-down ml-1 text-dark"></i>
      </h6>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="{{url('/admin/change-password')}}">Change Password</a>
				<a class="dropdown-item text-danger" href="{{url('/user/logout')}}">Logout</a>
			</div>
		</div>
	</div>
</nav>