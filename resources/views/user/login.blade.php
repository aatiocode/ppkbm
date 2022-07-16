@extends('index')
@section('contents')
	<div class="m-auto p-0 login">
		<div class="row" style="min-height:calc(100vh);">
			<div class="col-lg-6 col-md-6 login-left p-0 login-landing bg-white">
			</div>
			<div class="col-lg-6 col-md-6 d-flex justify-content-center align-items-center p-0" style="background:#fff;">
				<form class="col-lg-7 col-md-7" action="{{url('/user/login')}}" method="post" enctype="multipart/form-data">
					@csrf
          <h1 class="text-center font-weight-bold">PKBMN</h1>
					<div class="form-group my-4">
						<input placeholder="Username" value="{{ old('username') }}" type="text" class="form-control" id="username" name="username" required>
					</div>
					<div class="input-group my-4">
						<input placeholder="Password" type="password" class="form-control input-password m-0" aria-label="password" aria-describedby="basic-addon2" name="password" required>
						<div class="input-group-append show-hide-password">
							<span class="input-group-text" id="basic-addon2"><i class="far fa-eye"></i></span>
						</div>
					</div>
					<button type="submit" class="btn btn-success w-100 my-2">Login</button>
				</form>
			</div>
		</div>
	</div>
@endsection