@extends('index')
@section('contents')
	<div class="m-auto p-0 login">
		<div class="row" style="min-height:calc(100vh - 60px);">
			<div class="col-lg-6 col-md-6 login-left p-0">
				@if($images ?? '')
					<img src="{{$images ?? ''->image}}" alt="{{$images ?? ''->image}}">
				@endif
			</div>
			<div class="col-lg-6 col-md-6 d-flex justify-content-center align-items-center p-0" style="background:#fff;">
				<form class="col-lg-7 col-md-7 mt-4 change-password" name="change-password">
					<h2>Change Password</h2>
					<div class="form-group mt-3">
						<label for="username">NIP</label>
						<input value="{{ Session::get('nip') }}" type="text" class="form-control" id="username" name="username" disabled>
					</div>
					<div class="form-group mt-3">
						<label for="oldPassword">Password Lama</label>
						<input value="{{ old('oldPassword') }}" type="password" class="form-control" id="oldPassword" name="oldPassword">
					</div>
					<div class="form-group mt-3">
						<label for="newPassword">Password baru</label>
						<input value="{{ old('newPassword') }}" type="password" class="form-control" id="newPassword" name="newPassword">
					</div>
					<div class="form-group mt-3">
						<label for="confirmNewPassword">Konfirmasi Password Baru</label>
						<input value="{{ old('confirmNewPassword') }}" type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword">
					</div>
          <div class="btn-group d-flex" role="group">
            <button type="submit" class="btn btn-success w-75 my-2 w-100">Ubah Password</button>
            <a class="btn btn-danger w-25 d-inline my-2 ml-2 w-100" role="button" href="{{url('/admin')}}">Batal</a>
          </div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script>
		jQuery(function($) {
  
			$("form[name='change-password']").submit(function(e) {
					e.preventDefault()
				}).validate({
					rules: {
						username: "required",
						oldPassword: {
							required: true
						},
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
						oldPassword: {
							required: "Password tidak boleh kosong!"
						},
						newPassword: {
							required: "Password tidak boleh kosong!",
							minlength: "Minimal 6 karakter!"
						},
						confirmNewPassword: {
							required: "Password tidak boleh kosong!",
							minlength: "Minimal 6 karakter!",
							equalTo: 'Password tidak cocok!'
						}
					},
					submitHandler: function() {
						let dataForm = {}
						dataForm.username = $('#username').val()
						dataForm.oldPassword = $('#oldPassword').val()
						dataForm.newPassword = $('#newPassword').val()
						dataForm.confirmNewPassword = $('#confirmNewPassword').val()
						swal({
							title: "Are you sure to run this action?",
							icon: "warning",
							buttons: true,
							dangerMode: true,
						})
						.then((willDelete) => {
							if (willDelete) {
								axios.put(`{{url('/')}}/admin/change-password`, dataForm).then(({data}) => {
									if (data.status === '200') {
										swal("Success!", data.response, data.message)
										.then(function(){ 
											window.location.href="{{url('/admin')}}"
										})
									} else {
										swal("Error!", data.response, data.message)
									}
								})
                .catch((error) => {
                  swal("Error!", error?.response?.data?.response, error?.response?.data?.message)
                })
							}
						});
					}
				});
			
		});
	</script>
@endsection