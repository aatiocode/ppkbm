@extends('cms')

@section('content')
<div>
    @if(count($galeri))
    <div class="d-flex flex-row-reverse">
      <a href="{{url('/admin/carousel/add')}}" class="btn btn-success mb-2" role="button" title="add activities"><i class="fas fa-plus-circle mr-2 fa-lg"></i>Tambah Gambar</a>
    </div>
		<div class="card mb-2">
			<div class="container news py-3">
				<div class="row">
					<div class="col-12">
						<table class="table table-image table-hover">
							<thead class="text-gray">
								<tr class="text-justify">
									<th scope="col">ID</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Kategori</th>
									<th scope="col">Foto</th>
									<th scope="col">Video</th>
                  <th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							@foreach($galeri as $galeriData)
								<tbody>
									<tr class="text-justify">
										<th class="align-middle" scope="row">{{$index++}}</th>
										<td class="align-middle text-truncate max-width">{{$galeriData->judul}}</td>
                    <td class="align-middle text-truncate max-width">{{$galeriData->nama}}</td>
                    <td class="w-25 align-middle">
											@if($galeriData->foto)
												<img src="{{$galeriData->foto}}" class="img-fluid img-thumbnail" alt="{{$galeriData->foto}}">
											@else
												<img src="{{url('/uploads/custom-logo.jpeg')}}" class="img-fluid img-thumbnail" alt="PKBMN">
											@endif
										</td>
                    <td class="align-middle text-truncate max-width">
                      <a href="{{$galeriData->video}}" target="_blank" class="text-success">{{$galeriData->video}}</a>
                    </td>
                    <td class="align-middle text-truncate max-width">
                      @php
                        echo Helper::markingStatus($galeriData->status);
                      @endphp
                    </td>
										<td class="align-middle">
											<div class="row d-flex justify-content-start align-items-center px-3">
                        <a href="{{url('/admin/carousel/'.base64_encode($galeriData->id).'/edit?view=true')}}" class="text-success">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{url('/admin/carousel/'.base64_encode($galeriData->id).'/edit')}}" class="text-info mx-2">
                          <i class="far fa-edit"></i>
                        </a>
											</div>
										</td>
									</tr>
								</tbody>
							@endforeach
						</table>   
					</div>
				</div>
			</div>
		</div>
		{{$galeri}}
	@else
		@component('components.card')
			@slot('link')
      {{url('/')}}/admin/carousel/add
			@endslot
			@slot('label')
				Logo
			@endslot
		@endcomponent
	@endif
</div>
@endsection

