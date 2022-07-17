@extends('cms')
@section('content')
	<div class="card card-unit-risk mt-4">
		<div class="card-body">
			<nav class="navbar bg-success" style="border-radius: 2px;">
				<h4 class="text-white mb-0">{{$galeri->view_only ? "Lihat Galeri" : "Edit Galeri"}}</h4>
			</nav>
			<form class="col-lg-12 col-md-12 mt-4" action="{{url('/admin/galeri/'.base64_encode($galeri->id).'/edit')}}" method="post" enctype="multipart/form-data">
				@method('put')
				@csrf
				<div class="form-group">
					<label for="judul">Judul</label>
					<input value="{{$galeri->judul}}" type="text" class="form-control" id="judul" name="judul" {{$galeri->view_only ? "disabled" : ""}} maxlength="200" required>
				</div>
        <label for="id_event">Kategori</label>
        <div class="input-group mb-3">
          @component('components.kategori', [
            'kategori' => $kategoriGaleri, 
            'currentKategoriData' => $galeri->id_event,
            'isView' => $galeri->view_only,
            'kategoriId' => 'id_event'
            ])
          @endcomponent
        </div>
				<label for="foto">Foto</label>
				<div class="input-group mb-3">
					<div class="custom-file">
						@if($galeri->foto)
							<label class="custom-file-label" for="inputGroupFile01">{{$galeri->foto}}</label>
						@else
						<label class="custom-file-label" for="inputGroupFile01">Size max 2 MB</label>
						@endif
						<input type="file" class="custom-file-input" id="inputGroupFile01" name="foto" {{$galeri->view_only ? "disabled" : ""}}>
					</div>
				</div>
        <div class="form-group">
					<label for="video">Video</label>
					<input value="{{$galeri->video}}" type="text" class="form-control" id="video" name="video" {{$galeri->view_only ? "disabled" : ""}} maxlength="200" required>
				</div>
        <label for="status">Status</label>
        <div class="input-group mb-3">
          @php
            echo Helper::displayActiveGroup('status', $galeri->status, $galeri->view_only);
          @endphp
        </div>
        @if (!$galeri->view_only)
          <button type="submit" class="btn btn-success">Simpan</button>
        @endif
				<a href="{{url('/admin/galeri')}}" class="btn btn-danger" role="button" aria-pressed="true">Kembali</a>
			</form>
		</div>
	</div>
@endsection