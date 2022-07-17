<select class="custom-select" id="{{$kategoriId}}" name="{{$kategoriId}}" {{$isView ? "disabled" : ""}}>
  @foreach($kategori as $kategoriData)
    <option value="{{$kategoriData->id}}" {{$kategoriData->id === $currentKategoriData ? "selected" : ""}}>{{$kategoriData->nama}}</option>
  @endforeach
</select>