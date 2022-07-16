@extends('cms')
@section('content')

<div>
	<div class="card card-unit-risk">
		<div class="card-body">
			<nav class="navbar bg-success" style="border-radius: 2px;">
				<h4 class="text-white mb-0">Tambah Kategori</h4>
			</nav>
			<form class="col-lg-12 col-md-12 mt-4" action="{{url('/admin/kategori-galeri/add')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="nama">Nama</label>
					<input placeholder="Nama" value="{{ old('nama') }}" type="text"  class="form-control" id="nama" name="nama" maxlength="200" required>
				</div>
				<label for="status">Status</label>
        <div class="input-group mb-3">
          @php
            echo Helper::displayActiveGroup('status');
          @endphp
        </div>
				<button type="submit" class="btn btn-success">Simpan</button>
				<a href="{{url('/admin/kategori-galeri')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>
</div>
@endsection

