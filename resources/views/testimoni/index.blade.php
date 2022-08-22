@extends('cms')

@section('content')
<div>
	@if(count($artikel))
    <div class="d-flex flex-row-reverse">
      <a href="{{url('/admin/testimoni/add')}}" class="btn btn-success mb-2" role="button" title="add news"><i class="fas fa-plus-circle mr-2 fa-lg"></i>Tambah Testimoni</a>
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
                  <th scope="col">Nama</th>
                  <th scope="col">Kota</th>
                  <th scope="col">Deskripsi Singkat</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							@foreach($artikel ?? '' as $artikelData)
								<tbody>
									<tr class="text-justify">
										<th class="align-middle" scope="row">{{$index++}}</th>
                    <td class="align-middle text-truncate max-width">{{$artikelData->judul}}</td>
                    <td class="align-middle text-truncate max-width">{{$artikelData->nama_user}}</td>
                    <td class="align-middle text-truncate max-width">{{$artikelData->kota}}</td>
                    <td class="align-middle text-truncate max-width">{{$artikelData->deskripsi_singkat}}</td>
										<td class="w-25 align-middle">
											@if($artikelData->foto)
												<img src="{{$artikelData->foto}}" class="img-fluid img-thumbnail" alt="{{$artikelData->foto}}">
											@else
												<img src="{{url('/uploads/custom-logo.jpeg')}}" class="img-fluid img-thumbnail" alt="PKBMN">
											@endif
										</td>
                    <td class="align-middle text-truncate max-width">
                      @php
                        echo Helper::markingStatus($artikelData->status);
                      @endphp
                    </td>
										<td class="align-middle">
											<div class="row d-flex justify-content-start align-items-center px-3">
                        <a href="{{url('/admin/testimoni/'.base64_encode($artikelData->id).'/edit?view=true')}}" class="text-success">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{url('/admin/testimoni/'.base64_encode($artikelData->id).'/edit')}}" class="text-info mx-2">
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
		{{$artikel}}
		@else
			@component('components.card')
				@slot('link')
        {{url('/')}}/admin/testimoni/add
				@endslot
				@slot('label')
					Testimoni
				@endslot
			@endcomponent
	@endif
</div>
@endsection