<div class="d-flex justify-content-center align-items-center add-empty-data">
  @if($link ?? '' and $label)
    <a href="{{$link ?? ''}}" class="btn d-flex justify-content-center align-items-center btn-success" role="button" title="Tambah {{$label}}"><i class="fas fa-plus-circle mr-2 fa-lg"></i>Tambah {{$label}}</a>
  @else
    <button class="btn btn-success d-flex justify-content-center align-items-center" role="button" title="Tambah {{$label}}" data-toggle="modal" data-target="{{$id_modal}}"><i class="fas fa-plus-circle mr-2 fa-lg"></i>Tambah {{$label}}</button>
  @endif
</div>