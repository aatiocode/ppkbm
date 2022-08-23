@extends('landing/index')
@section('contentlanding')
<!-- ==============================================
    ** Inner Banner **
    =================================================== -->
    <div class="inner-banner blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="content">
                        <h1>Blog</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==============================================
    ** Blog Detail **
    =================================================== -->
    <div class="container blog-wrapper padding-lg">
        <div class="row">
            <!-- Start Left Column -->
            <div class="col-sm-8 blog-left">
                <ul class="blog-listing detail artikel-detail"></ul>
            </div>
            <!-- End Left Column -->

            <!-- Start Right Column -->
            @include('landing/artikelSideRight')
            <!-- End Right Column -->
        </div>
    </div>
@endsection
@section('js')
  <script>

    const headers = {
      'Content-Type': 'application/json',
      'Authorization': `Basic ${btoa("{{ config('constants.header_username') }}:{{ config('constants.header_password') }}")}`
    }

    function init(){
      axios.get(`{{url('/')}}/api/artikel-detail?id=${"{{ Request::get('id') }}"}`, {
        headers: headers
      })
      .then(({ data }) => {
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        const d = new Date(data?.response?.created_at);
        const date = d.getDate()
        const month = months[d.getMonth()];
        const year = d.getFullYear();

        $('.artikel-detail').append(`
        <li> <img src="${data?.response?.foto}" class="img-responsive" alt="">
            <h2>${data?.response?.judul}</h2>
            <ul class="post-detail">
                <li><span class="icon-date-icon ico"></span><span class="bold">${date} ${month}</span> ${year}</li>
            </ul>
            <p>${data?.response?.deskripsi}</p>
        </li>
          `)
        $('#loading').fadeOut(1000);
      })
      .catch(() => {
        $('#loading').fadeOut(1000);
      })
    }

    function initSidebar(){
      axios.get('{{url('/')}}/api/artikel', {
        headers: headers
      })
      .then(({ data }) => {
        const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        const d = new Date(data?.response[0].created_at);
        const date = d.getDate()
        const month = months[d.getMonth()];
        const year = d.getFullYear();

        let nama_kategori = []

        $.each(data?.response.slice(0, 3), function (index, value) {
          nama_kategori.push(value?.nama_kategori)

          const dKategori = new Date(value?.created_at);
          const dateKategori = dKategori.getDate()
          const monthKategori = months[dKategori.getMonth()];
          const yearKategori = dKategori.getFullYear();

          $('.artikel-terbaru').append(`
          <li class="clearfix">
            <a href="{{url('/artikel-detail?id=${btoa(value?.id)}')}}">
              <div class="img-block">
                <img src="${value?.foto}" class="img-responsive" alt=""></div>
              <div class="detail">
                <h4>${value?.deskripsi_singkat}</h4>
                <p><span class="icon-date-icon ico"></span><span>${dateKategori} ${monthKategori} </span>${yearKategori}</p>
              </div>
            </a>
          </li>
          `)
        });

        $.each([...new Set(nama_kategori)], function (index, value) {
          $('.kategori-artikel').append(`
            <li><a style="text-transform: capitalize">${value}<span>${index + 1}</span></a></li>
          `)
        });

        $('#loading').fadeOut(1000);
      })
      .catch(() => {
        $('#loading').fadeOut(1000);
      })
    }

    init()
    initSidebar()
  </script>
@endsection