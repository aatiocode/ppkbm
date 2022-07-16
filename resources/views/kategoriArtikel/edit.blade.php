@extends('cms')
@section('content')
	<div class="card card-unit-risk mt-4">
		<div class="card-body">
			<nav class="navbar bg-success" style="border-radius: 2px;">
				<h4 class="text-white mb-0">{{$kategoriArtikel->view_only ? "Lihat Kategori" : "Edit Kategori"}}</h4>
			</nav>
			<form class="col-lg-12 col-md-12 mt-4" action="{{url('/admin/kategori-artikel/'.base64_encode($kategoriArtikel->id).'/edit')}}" method="post" enctype="multipart/form-data">
				@method('put')
				@csrf
				<div class="form-group">
					<label for="nama">Nama</label>
					<input value="{{$kategoriArtikel->nama}}" type="text" class="form-control" id="nama" name="nama" maxlength="200" {{$kategoriArtikel->view_only ? "disabled" : ""}} required>
				</div>
				<label for="status">Status</label>
        <div class="input-group mb-3">
          @php
            echo Helper::displayActiveGroup('status', $kategoriArtikel->status, $kategoriArtikel->view_only);
          @endphp
        </div>
        @if (!$kategoriArtikel->view_only)
          <button type="submit" class="btn btn-success">Simpan</button>
        @endif
				<a href="{{url('/admin/kategori-artikel')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>
@endsection