@extends('index')
@section('contents')
	<div class="container-fluid pl-0">
		<div class="row">
			<div class="col-3" id="sticky-sidebar">
				<div class="sticky-top">
					<div class="nav flex-column">
            <div class="col-12 sidebar-menu shadow pt-5">
              <a href="{{url("/admin/carousel")}}">
                <div class="{{ (request()->is('admin/carousel*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-home mr-2 "></i>
                  Beranda
                </div>
              </a>
              <div class="p-2 menu-parent" data-id="1" data-menu="true" role="button">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="text-truncate font-weight-bold">
                    <i class="fas fa-newspaper mr-2 "></i>
                    Artikel
                  </div>
                  <i class="caret-icon fas fa-caret-up ml-1 text-dark"></i>
                </div>
              </div>
              <a href="{{url("/admin/artikel")}}" class="menu-child-1">
                <div class="{{ (request()->is('admin/artikel*')) ? 'active p-2 ml-4' : 'p-2 ml-4' }}">
                  <i class="fas fa-stop-circle mr-2"></i>
                  Artikel
                </div>
              </a>
              <a href="{{url("/admin/kategori-artikel")}}" class="menu-child-1">
                <div class="{{ (request()->is('admin/kategori-artikel*')) ? 'active p-2 ml-4' : 'p-2 ml-4' }}">
                  <i class="fas fa-stop-circle mr-2"></i>
                  Kategori
                </div>
              </a>
              <div class="p-2 menu-parent" data-id="2" data-menu="true" role="button">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="text-truncate font-weight-bold">
                    <i class="fas fa-camera mr-2 "></i>
                    Galeri
                  </div>
                  <i class="caret-icon fas fa-caret-up ml-1 text-dark"></i>
                </div>
              </div>
              <a href="{{url("/admin/galeri")}}" class="menu-child-2">
                <div class="{{ (request()->is('admin/galeri*')) ? 'active p-2 ml-4' : 'p-2 ml-4' }}">
                  <i class="fas fa-stop-circle mr-2"></i>
                  Galeri
                </div>
              </a>
              <a href="{{url("/admin/kategori-galeri")}}" class="menu-child-2">
                <div class="{{ (request()->is('admin/kategori-galeri*')) ? 'active p-2 ml-4' : 'p-2 ml-4' }}">
                  <i class="fas fa-stop-circle mr-2"></i>
                  Kategori
                </div>
              </a>
              <a href="{{url("/admin/gambar")}}">
                <div class="{{ (request()->is('admin/logo*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-image mr-2 "></i>
                  Header Logo
                </div>
              </a>
              <a href="{{url("/admin/identitas-sekolah")}}">
                <div class="{{ (request()->is('admin/identitas-sekolah*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-school mr-2 "></i>
                  Identitas Sekolah
                </div>
              </a>
              <a href="{{url("/admin/lokasi-sekolah")}}">
                <div class="{{ (request()->is('admin/lokasi-sekolah*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-map mr-2 "></i>
                  Lokasi Sekolah
                </div>
              </a>
              <a href="{{url("/admin/user-admin")}}">
                <div class="{{ (request()->is('admin/user-admin*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-users mr-2 "></i>
                  Manajemen Pengguna
                </div>
              </a>
              <a href="{{url("/admin/paket-pendidikan")}}">
                <div class="{{ (request()->is('admin/paket-pendidikan*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-graduation-cap mr-2 "></i>
                  Paket Pendidikan
                </div>
              </a>
              <a href="{{url("/admin/pengajar-dan-staff")}}">
                <div class="{{ (request()->is('admin/pengajar-dan-staff*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-users mr-2 "></i>
                  Pengajar dan Staff
                </div>
              </a>
              <a href="{{url("/admin/program-belajar")}}">
                <div class="{{ (request()->is('admin/program-belajar*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-book mr-2 "></i>
                  Program Belajar
                </div>
              </a>
              <a href="{{url("/admin/testimoni")}}">
                <div class="{{ (request()->is('admin/testimoni*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-newspaper mr-2 "></i>
                  Testimoni
                </div>
              </a>
              <a href="{{url("/admin/tentang-kami")}}">
                <div class="{{ (request()->is('admin/tentang-kami*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-users mr-2 "></i>
                  Tentang Kami
                </div>
              </a>
              <a href="{{url("/admin/visi-misi")}}">
                <div class="{{ (request()->is('admin/visi-misi*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-newspaper mr-2 "></i>
                  Visi Misi
                </div>
              </a>
            </div>
					</div>
				</div>
			</div>
			<div class="col" id="main">
				@component('components.header')
				@endcomponent
				@yield('content')
			</div>
		</div>
	</div>
@endsection