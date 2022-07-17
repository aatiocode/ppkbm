@extends('cms')
@section('content')
	<div class="card card-unit-risk mt-4">
		<div class="card-body">
			<nav class="navbar bg-success" style="border-radius: 2px;">
				<h4 class="text-white mb-0">{{$kategoriGaleri->view_only ? "Lihat Kategori" : "Edit Kategori"}}</h4>
			</nav>
			<form class="col-lg-12 col-md-12 mt-4" action="{{url('/admin/kategori-galeri/'.base64_encode($kategoriGaleri->id).'/edit')}}" method="post" enctype="multipart/form-data">
				@method('put')
				@csrf
				<div class="form-group">
					<label for="nama">Nama</label>
					<input value="{{$kategoriGaleri->nama}}" type="text" class="form-control" id="nama" name="nama" maxlength="200" {{$kategoriGaleri->view_only ? "disabled" : ""}} required>
				</div>
				<label for="status">Status</label>
        <div class="input-group mb-3">
          @php
            echo Helper::displayActiveGroup('status', $kategoriGaleri->status, $kategoriGaleri->view_only);
          @endphp
        </div>
        @if (!$kategoriGaleri->view_only)
          <button type="submit" class="btn btn-success">Simpan</button>
        @endif
				<a href="{{url('/admin/kategori-galeri')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>
@endsection