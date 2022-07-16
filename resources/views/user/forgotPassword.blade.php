@extends('index')
@section('contents')
	<div class="m-auto p-0 login">
		<div class="row" style="min-height:calc(100vh);">
			<div class="col-lg-6 col-md-6 login-left p-0">
				@if($images)
					<img src="{{$images->image}}" alt="{{$images->image}}">
				@endif
			</div>
			<div class="col-lg-6 col-md-6 d-flex justify-content-center align-items-center p-0" style="background:#fff;">
				<form class="col-lg-7 col-md-7 mt-4 forgot-password" name="forgot-password">
					<h2>Forgot Password?</h2>
          <p class="text-muted">Enter your email and we'll send you instructions to reset your password</p>
					<div class="form-group mt-3">
						<label for="email">Email</label>
						<input value="{{ Session::get('nip') }}" type="email" class="form-control" id="email" name="email">
					</div>
          <button type="submit" class="btn btn-success my-2 w-100 forgot-password-user">Send Reset Link</button>
          <a href="{{url('/user/login')}}" class="text-success d-flex justify-content-center">
            <small>
              <i class="caret-icon fas fa-caret-left mr-2"></i>
              Back to Login
            </small>
          </a>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script>
		jQuery(function($) {
      function disableButton(disable = false, text = 'Send Reset Link') {
        $('.forgot-password-user').attr('disabled', disable).text(text);
      }

			$("form[name='forgot-password']").submit(function(e) {
        e.preventDefault()
				}).validate({
					rules: {
						email: {
							required: true,
							email: true
						},
					},
					messages: {
						email: {
							required: "Please provide a email",
							email: "Wrong email format!"
						}
					},
					submitHandler: function() {
						let dataForm = {}
						dataForm.email = $('#email').val()
						swal({
							title: "Are you sure to run this action?",
							icon: "warning",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {
                disableButton(true, 'Loading...')
                const headers = {
                  'Content-Type': 'application/json',
                  'Authorization': `Basic ${btoa("{{ config('constants.header_username') }}:{{ config('constants.header_password') }}")}`
                }
								axios.post(`{{url('/')}}/cms-forgot-password`, dataForm, { headers: headers }).then(({data}) => {
									if (data.status === '200') {
										swal("Success!", data.response, data.message)
										.then(function(){ 
											window.location.href="{{url('/admin')}}"
										})
									}
								})
                .catch((error) => {
                  disableButton()
                  swal("Error!", error?.response?.data?.response, error?.response?.data?.message)
                })
							}
						});
					}
				});
			
		});
	</script>
@endsection