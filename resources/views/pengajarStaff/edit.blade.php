@extends('cms')
@section('content')
	<div class="card card-unit-risk mt-4">
		<div class="card-body">
			<nav class="navbar bg-success" style="border-radius: 2px;">
				<h4 class="text-white mb-0">{{$artikel->view_only ? "Lihat Pengajar dan Staff" : "Edit Pengajar dan Staff"}}</h4>
			</nav>
			<form class="col-lg-12 col-md-12 mt-4" action="{{url("/admin/pengajar-dan-staff/".base64_encode($artikel->id)."/edit")}}" method="post" enctype="multipart/form-data">
				@method('put')
				@csrf
				<div class="form-group">
					<label for="judul">Judul</label>
					<input value="{{$artikel->judul}}" type="text" class="form-control" id="judul" name="judul" maxlength="200" {{$artikel->view_only ? "disabled" : ""}} required>
				</div>
        <div class="form-group">
					<label for="nama">Nama</label>
					<input value="{{$artikel->nama}}" type="text" class="form-control" id="nama" name="nama" maxlength="200" {{$artikel->view_only ? "disabled" : ""}}>
				</div>
        <div class="form-group">
					<label for="jabatan">Jabatan</label>
					<input value="{{$artikel->jabatan}}" type="text" class="form-control" id="jabatan" name="jabatan" maxlength="200" {{$artikel->view_only ? "disabled" : ""}}>
				</div>
        <div class="form-group">
					<label for="email">Email</label>
					<input value="{{$artikel->email}}" type="email" class="form-control" id="email" name="email" maxlength="200" {{$artikel->view_only ? "disabled" : ""}}>
				</div>
        <div class="input-group mb-3 hide">
          @component('components.kategori', [
            'kategori' => $kategoriArtikel, 
            'currentKategoriData' => $artikel->id_kategori,
            'isView' => $artikel->view_only,
            'kategoriId' => 'id_kategori'
            ])
          @endcomponent
        </div>
        <div class="form-group">
					<label for="facebook">Facebook</label>
					<input value="{{$artikel->facebook}}" type="text" class="form-control" id="facebook" name="facebook" maxlength="200" {{$artikel->view_only ? "disabled" : ""}}>
				</div>
        <div class="form-group">
					<label for="instagram">Instagram</label>
					<input value="{{$artikel->instagram}}" type="text" class="form-control" id="instagram" name="instagram" maxlength="200" {{$artikel->view_only ? "disabled" : ""}}>
				</div>
        <label for="foto">Foto</label>
				<div class="input-group mb-3">
					<div class="custom-file">
						@if($artikel->foto)
							<label class="custom-file-label" for="inputGroupFile01">{{$artikel->foto}}</label>
						@else
							<label class="custom-file-label" for="inputGroupFile01">Size max 2 MB</label>
						@endif
						<input type="file" class="custom-file-input" id="inputGroupFile01" name="foto" {{$artikel->view_only ? "disabled" : ""}}>
					</div>
				</div>
        <label for="status">Status</label>
        <div class="input-group mb-3">
          @php
            echo Helper::displayActiveGroup('status', $artikel->status, $artikel->view_only);
          @endphp
        </div>
        @if(!$artikel->view_only)
          <button type="submit" class="btn btn-success">Simpan</button>
        @endif
				<a href="{{url('/admin/pengajar-dan-staff')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>
@endsection