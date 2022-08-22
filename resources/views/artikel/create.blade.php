@extends('cms')
@section('content')
<div class="card">
	<div class="card-body">
		<nav class="navbar bg-success" style="border-radius: 2px;">
			<h4 class="text-white mb-0">Tambah Artikel</h4>
		</nav>
    <form class="col-lg-12 col-md-12 mt-4" action="{{url('/admin/artikel/add')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="judul">Judul <span class="text-danger">*</span></label>
        <input placeholder="Judul"" value="{{ old('judul') }}" type="text" class="form-control" id="judul" name="judul" maxlength="200" required>
      </div>
      <div class="form-group">
        <label for="deskripsi_singkat">Deskripsi Singkat</label>
        <input placeholder="Deskripsi Singkat" value="{{ old('deskripsi_singkat') }}" type="text" class="form-control" id="deskripsi_singkat" name="deskripsi_singkat" maxlength="200">
      </div>
      <div class="form-group">
				<label for="deskripsi">Deskripsi</label>
				<textarea class="form-control my-editor" id="deskripsi" rows="4" name="deskripsi">{{ old('deskripsi') }}</textarea>
			</div>
      <label for="id_kategori">Kategori</label>
      <div class="input-group mb-3">
        @component('components.kategori', [
          'kategori' => $kategoriArtikel, 
          'currentKategoriData' => '',
          'isView' => false,
          'kategoriId' => 'id_kategori'
          ])
        @endcomponent
      </div>
      <label for="foto">Foto</label>
      <div class="input-group mb-3">
        <div class="custom-file">
          <label class="custom-file-label" for="inputGroupFile01">Ukuran file max 2 MB</label>
          <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto">
        </div>
      </div>
      <div class="form-group">
        <label for="video">Video <small class="text-danger">*hanya link embed video</small></label>
        <input placeholder="Contoh: https://www.youtube.com/embed/_7CX0hTDRtU" value="{{ old('video') }}" type="text" class="form-control" id="video" name="video" maxlength="200">
      </div>
      <label for="status">Status</label>
      <div class="input-group mb-3">
        @php
          echo Helper::displayActiveGroup('status');
        @endphp
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{url('/admin/artikel')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
    </form>
	</div>
</div>
@endsection

