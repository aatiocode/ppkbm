@extends('cms')
@section('content')

<div>
	<div class="card card-unit-risk">
		<div class="card-body">
			<nav class="navbar bg-success" style="border-radius: 2px;">
				<h4 class="text-white mb-0">Tambah Pengguna</h4>
			</nav>
			<form class="col-lg-12 col-md-12 mt-4" action="{{url('/admin/user-admin/add')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group status-karyawan">
					<label for="nip">NIP</label>
					<input placeholder="NIP" value="{{ old('nip') }}" type="text" class="form-control" id="nip" name="nip">
				</div>
        <div class="form-group">
					<label for="nama_lengkap">Nama Lengkap</label>
					<input placeholder="Nama lengkap" value="{{ old('nama_lengkap') }}" type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
				</div>
        <div class="form-group">
					<label for="email">Email</label>
					<input placeholder="Email" value="{{ old('email') }}" type="email" class="form-control" id="email" name="email">
				</div>
        <div class="form-group">
					<label for="password">Password <small class="text-danger">*minimal 6 karakter</small></label>
					<input placeholder="Password" value="{{ old('password') }}" type="password" class="form-control" id="password" name="password" minlength="6" required>
				</div>
        <label for="status">Status</label>
        <div class="input-group mb-3">
          @php
            echo Helper::displayActiveGroup('status');
          @endphp
        </div>
				<button type="submit" class="btn btn-success">Simpan</button>
				<a href="{{url('/admin/user-admin')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>
</div>
@endsection

