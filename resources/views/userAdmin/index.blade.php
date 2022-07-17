@extends('cms')

@section('content')
<div>
	@if(count($userCount))
  <div class="d-flex justify-content-between align-items-center">
    <a href="{{url('/admin/user-admin/add')}}" class="btn btn-success mb-2" role="button" title="add user admin"><i class="fas fa-plus-circle mr-2 fa-lg"></i>Tambah Pengguna</a>
    <form action="">
      <div class="input-group mb-2">
        <input value="{{$search}}" type="text" name="q" placeholder="Search User..." class="form-control"/>
        <div class="input-group-append">
          <input type="submit" class="btn btn-success" value="Search"/>
        </div>
      </div>
    </form>
  </div>
		<div class="card mb-2">
			<div class="container news py-3">
				<div class="row">
					<div class="col-12">
						<table class="table table-image table-hover">
							<thead class="text-gray">
								<tr class="text-justify">
									<th scope="col">ID</th>
									<th scope="col">NIP</th>
                  <th scope="col">Nama Lengkap</th>
                  <th scope="col">Email</th>
                  <th scope="col">Status</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							@foreach($userAdmin as $userAdminData)
								<tbody>
									<tr class="text-justify">
										<th class="align-middle" scope="row">{{$index++}}</th>
										<td class="align-middle text-truncate max-width">{{$userAdminData->nip}}</td>
                    <td class="align-middle text-truncate max-width">{{$userAdminData->nama_lengkap}}</td>
                    <td class="align-middle text-truncate max-width">{{$userAdminData->email}}</td>
                    <td class="align-middle text-truncate max-width">
                      @php
                        echo Helper::markingStatus($userAdminData->status);
                      @endphp
                    </td>
										<td class="align-middle">
											<div class="row d-flex justify-content-start align-items-center px-3">
                        <a href="{{url('/admin/user-admin/'.base64_encode($userAdminData->id).'/edit?view=true')}}" class="text-success">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{url('/admin/user-admin/'.base64_encode($userAdminData->id).'/edit')}}" class="text-info mx-2">
                          <i class="far fa-edit"></i>
                        </a>
                        <a class="text-danger" onclick="deleteFunction(btoa({{$userAdminData->id}}))" href="#">
                          <i class="far fa-trash-alt"></i>
                        </a>
											</div>
										</td>
									</tr>
								</tbody>
							@endforeach
						</table>
            @if (!count($userAdmin))
              <h6 class="text-center text-danger">Data not found!</h6>
            @endif
					</div>
				</div>
			</div>
		</div>
    {{ $userAdmin->links() }}
	@else
		@component('components.card')
			@slot('link')
      {{url('/')}}/admin/user-admin/add
			@endslot
			@slot('label')
				User
			@endslot
		@endcomponent
	@endif
</div>
@endsection
@section('js')
	<script>
		$(document).ready(function(){
			deleteFunction = function (id) {
				swal({
					title: "Apakah anda yakin?",
					text: "Data tidak bisa di kembalikan!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						axios.delete(`{{url('/')}}/admin/user-admin/${atob(id)}/delete`).then(({ data }) => {
							swal(data.response, data.message, data.response)
							.then(function(){ 
								location.reload()
							})
						})
					}
				});
			}
		})
	</script>
@endsection

