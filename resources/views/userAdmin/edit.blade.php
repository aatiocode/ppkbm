@extends('cms')
@section('content')
	<div class="card card-unit-risk mt-4">
		<div class="card-body">
			<nav class="navbar bg-success" style="border-radius: 2px;">
				<h4 class="text-white mb-0">{{$userAdmin->view_only ? "Lihat Pengguna" : "Edit Pengguna"}}</h4>
			</nav>
			<form class="col-lg-12 col-md-12 mt-4" action="{{url("/admin/user-admin/".base64_encode($userAdmin->id)."/edit")}}" method="post" enctype="multipart/form-data">
				@method('put')
				@csrf
        @if($userAdmin->nip)
          <div class="form-group">
            <label for="nip">NIP</label>
            <input value="{{$userAdmin->nip}}" type="text" class="form-control" id="nip" name="nip" {{$userAdmin->view_only ? "disabled" : ""}} required>
          </div>
        @endif
        <div class="form-group">
					<label for="nama_lengkap">Nama Lengkap</label>
					<input value="{{$userAdmin->nama_lengkap}}" type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" {{$userAdmin->view_only ? "disabled" : ""}} required>
				</div>
          <div class="form-group">
            <label for="email">Email</label>
            <input value="{{$userAdmin->email}}" type="email" class="form-control" id="email" name="email" {{$userAdmin->view_only ? "disabled" : ""}} required>
          </div>
        <label for="status">Active</label>
        <div class="input-group mb-3">
          @php
            echo Helper::displayActiveGroup('status', $userAdmin->status, $userAdmin->view_only);
          @endphp
        </div>
        @if (!$userAdmin->view_only)
          <button type="submit" class="btn btn-success">Simpan</button>
        @endif
				<a href="{{url('/admin/user-admin')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>
@endsection

