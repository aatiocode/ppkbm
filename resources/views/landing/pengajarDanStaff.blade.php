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
                        <h1>Pengajar Dan staff</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==============================================
    ** About **
    =================================================== -->
    <section class="about inner padding-lg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <ul class="row browse-teachers-list clearfix teachers-staff"></ul>
                </div>
                
            </div>
        </div>
    </section>
@endsection

@section('js')
  <script>

    function init(){
      const headers = {
        'Content-Type': 'application/json',
        'Authorization': `Basic ${btoa("{{ config('constants.header_username') }}:{{ config('constants.header_password') }}")}`
      }

      axios.get('{{url('/')}}/api/pengajar-dan-staff', {
        headers: headers
      })
      .then(({ data }) => {

        $.each(data?.response?.pengajarDanStaff, function (index, value) {
          $('.teachers-staff').append(`
            <li class="col-xs-6 col-sm-3" style="padding-bottom: 80px;">
              <figure> <img src="${value?.foto}" alt="" width="123" height="124" style="object-fit: cover;"> </figure>
              <h3>${value?.nama}</h3>
              <span class="designation">${value?.jabatan}</span>
              <ul class="teachers-follow">
                <li><a href="//${value?.instagram}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="//${value?.facebook}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="//${value?.email}"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
              </ul>
            </li>
          `)
        });
        $('#loading').fadeOut(1000);
      })
      .catch(() => {
        $('#loading').fadeOut(1000);
      })
    }

    init()
  </script>
@endsection