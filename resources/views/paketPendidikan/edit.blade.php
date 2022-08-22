@extends('cms')
@section('content')
	<div class="card card-unit-risk mt-4">
		<div class="card-body">
			<nav class="navbar bg-success" style="border-radius: 2px;">
				<h4 class="text-white mb-0">{{$artikel->view_only ? "Lihat Paket Pendidikan" : "Edit Paket Pendidikan"}}</h4>
			</nav>
			<form class="col-lg-12 col-md-12 mt-4" action="{{url("/admin/paket-pendidikan/".base64_encode($artikel->id)."/edit")}}" method="post" enctype="multipart/form-data">
				@method('put')
				@csrf
				<div class="form-group">
					<label for="judul">Judul</label>
					<input value="{{$artikel->judul}}" type="text" class="form-control" id="judul" name="judul" maxlength="200" {{$artikel->view_only ? "disabled" : ""}} required>
				</div>
        <div class="form-group">
					<label for="deskripsi_singkat">Deskripsi Singkat</label>
					<input value="{{$artikel->deskripsi_singkat}}" type="text" class="form-control" id="deskripsi_singkat" name="deskripsi_singkat" maxlength="200" {{$artikel->view_only ? "disabled" : ""}}>
				</div>
        <div class="form-group">
					<label for="deskripsi">deskripsi</label>
					<textarea class="form-control my-editor" id="deskripsi" rows="4" name="deskripsi" {{$artikel->view_only ? "disabled" : ""}}>{{$artikel->deskripsi}}</textarea>
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
				<a href="{{url('/admin/paket-pendidikan')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>
@endsection