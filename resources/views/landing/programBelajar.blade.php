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
                        <h1>Program Belajar</h1>
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
            <div class="row program-belajar"></div>
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

      axios.get('{{url('/')}}/api/program-belajar', {
        headers: headers
      })
      .then(({ data }) => {

        $.each(data?.response?.programBelajar, function (index, value) {
          $('.inner-banner').css('background', `url(${value?.foto}) no-repeat center bottom`)
          $('.program-belajar').append(`
          <div class="col-md-7 left-block">
              <p>${value?.deskripsi}</p>
          </div>
          <div class="col-md-5 about-right"> <img src="${value?.foto}" class="img-responsive" alt=""> </div>
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