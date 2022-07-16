@extends('index')
@section('contents')
	<div class="container-fluid pl-0">
		<div class="row">
			<div class="col-3" id="sticky-sidebar">
				<div class="sticky-top">
					<div class="nav flex-column">
            <div class="col-12 sidebar-menu shadow pt-5">
              {{-- <a class="px-2 pt-2 text-center d-flex" href="{{url('/')}}">
                <img class="img-fluid" src="{{url('/img/)}}" alt="PKBMN">
              </a> --}}
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
              <a href="{{url("/admin/user-admin")}}">
                <div class="{{ (request()->is('admin/user-admin*')) ? 'active p-2' : 'p-2' }} text-truncate font-weight-bold">
                  <i class="fas fa-users mr-2 "></i>
                  Manajemen Pengguna
                </div>
              </a>
            </div>
					</div>
				</div>
			</div>
			<div class="col" id="main">
				@component('components.header', ['unitKerja' => $unitKerja])
				@endcomponent
				@yield('content')
			</div>
		</div>
	</div>
@endsection