@extends('cms')
@section('content')
<div class="card">
	<div class="card-body">
		<nav class="navbar bg-success" style="border-radius: 2px;">
			<h4 class="text-white mb-0">Tambah Lokasi Sekolah</h4>
		</nav>
    <form class="col-lg-12 col-md-12 mt-4" action="{{url('/admin/lokasi-sekolah/add')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="judul">Judul <span class="text-danger">*</span></label>
        <input placeholder="Judul"" value="{{ old('judul') }}" type="text" class="form-control" id="judul" name="judul" maxlength="200" required>
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input placeholder="Alamat"" value="{{ old('alamat') }}" type="text" class="form-control" id="alamat" name="alamat" maxlength="200" required>
      </div>
      <div class="form-group">
        <label for="phone">Telepon</label>
        <input placeholder="Telepon"" value="{{ old('phone') }}" type="text" class="form-control" id="phone" name="phone" maxlength="200" required>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input placeholder="Email"" value="{{ old('email') }}" type="email" class="form-control" id="email" name="email" maxlength="200" required>
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
      <div class="form-group">
        <label for="facebook">Facebook</label>
        <input placeholder="Facebook"" value="{{ old('facebook') }}" type="text" class="form-control" id="facebook" name="facebook" maxlength="200">
      </div>
      <div class="form-group">
        <label for="twitter">Twitter</label>
        <input placeholder="Twitter"" value="{{ old('twitter') }}" type="text" class="form-control" id="twitter" name="twitter" maxlength="200">
      </div>
      <div class="form-group">
        <label for="youtube">Youtube</label>
        <input placeholder="Youtube"" value="{{ old('youtube') }}" type="text" class="form-control" id="youtube" name="youtube" maxlength="200">
      </div>
      <div class="form-group">
        <label for="instagram">Instagram</label>
        <input placeholder="Instagram"" value="{{ old('instagram') }}" type="text" class="form-control" id="instagram" name="instagram" maxlength="200">
      </div>
      <label for="foto">Foto</label>
      <div class="input-group mb-3">
        <div class="custom-file">
          <label class="custom-file-label" for="inputGroupFile01">Ukuran file max 2 MB</label>
          <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto">
        </div>
      </div>
      <div class="form-group">
        <label for="maps">Peta Lokasi</label>
        <input placeholder="Peta Lokasi" value="{{ old('maps') }}" type="text" class="form-control" id="maps" name="maps" maxlength="200">
      </div>
      <label for="status">Status</label>
      <div class="input-group mb-3">
        @php
          echo Helper::displayActiveGroup('status');
        @endphp
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
      <a href="{{url('/admin/lokasi-sekolah')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
    </form>
	</div>
</div>
@endsection

