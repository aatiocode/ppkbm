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
                        <h1>Visi Dan Misi</h1>
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
            <div class="row visi-misi"></div>
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

      axios.get('{{url('/')}}/api/visi-misi', {
        headers: headers
      })
      .then(({ data }) => {

        $.each(data?.response?.visiMisi, function (index, value) {
          $('.inner-banner').css('background', `url(${value?.foto}) no-repeat center bottom`)
          $('.visi-misi').append(`
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