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
				<form class="col-lg-7 col-md-7 mt-4 change-password" name="change-password">
					<h2>Reset Password</h2>
					<div class="form-group mt-3">
						<label for="newPassword">New Password</label>
						<input value="{{ old('newPassword') }}" type="password" class="form-control" id="newPassword" name="newPassword">
					</div>
					<div class="form-group mt-3">
						<label for="confirmNewPassword">Confirm New Password</label>
						<input value="{{ old('confirmNewPassword') }}" type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword">
					</div>
          <div class="btn-group d-flex" role="group">
            <button type="submit" class="btn btn-success w-75 my-2 w-100 reset-password-user" {{$token ? "" : "disabled"}}>Change Password</button>
            <a class="btn btn-danger w-25 d-inline my-2 ml-2 w-100" role="button" href="{{url('/admin')}}">Cancel</a>
          </div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script>
		jQuery(function($) {
      function disableButton(disable = false, text = 'Change Password') {
        $('.reset-password-user').attr('disabled', disable).text(text);
      }

			$("form[name='change-password']").submit(function(e) {
					e.preventDefault()
				}).validate({
					rules: {
						newPassword: {
							required: true,
							minlength: 6
						},
						confirmNewPassword: {
							required: true,
							minlength: 6,
							equalTo: 'input[name="newPassword"]'
						}
					},
					messages: {
						newPassword: {
							required: "Please provide a new password",
							minlength: "Your password must be at least 6 characters long"
						},
						confirmNewPassword: {
							required: "Please confirm a new password",
							minlength: "Your password must be at least 6 characters long",
							equalTo: 'Password doesn\'t match!'
						}
					},
					submitHandler: function() {
						let dataForm = {}
						dataForm.newPassword = $('#newPassword').val()
						dataForm.token = '{{$token}}'
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
								axios.put(`{{url('/')}}/cms-reset-password`, dataForm, { headers: headers }).then(({data}) => {
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