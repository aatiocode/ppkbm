@extends('landing/index')
@section('contentlanding')
    <!-- ==============================================
    ** Inner Banner **
    =================================================== -->
    <div class="inner-banner contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-lg-9">
                    <div class="content">
                        <h1>Lokasi Sekolah Dan Kontak Kami</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ==============================================
    ** Google Map **
    =================================================== -->
    <section class="google-map">
        <div id="map"></div>
        <div class="container">
            <div class="contact-detail"></div>
        </div>
    </section>

    <!-- ==============================================
    ** Contact Us **
    =================================================== -->
    <section class="form-wrapper padding-lg">
        <div class="container">
            <form name="contact-form" id="ContactForm">
                <div class="row input-row">
                    <div class="col-sm-6">
                        <input name="nama" type="text" placeholder="Nama">
                    </div>
                    <div class="col-sm-6">
                        <input name="no_handphone" type="text" placeholder="No Handphone">
                    </div>
                </div>
                <div class="row input-row">
                    <div class="col-sm-6">
                        <input name="email" type="text" placeholder="Email">
                    </div>
                    <div class="col-sm-6">
                        <input name="pesan" type="text" placeholder="Pesan">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <button class="btn">Kirim <span class="icon-more-icon"></span></button>
                        <div class="msg"></div>
                    </div>
                </div>
            </form>
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

      axios.get('{{url('/')}}/api/lokasi-sekolah', {
        headers: headers
      })
      .then(({ data }) => {

        $.each(data?.response?.lokasiSekolah, function (index, value) {
          $('.inner-banner').css('background', `url(${value?.foto}) no-repeat center top / cover`)
          $('#map').append(`
            <iframe src="${value?.maps}" style="border:none;"></iframe>
          `)
          $('.contact-detail').append(`
            <div class="address">
              <div class="inner">
                <h3>${value?.judul}</h3>
                <p>${value?.alamat}</p>
              </div>
              <div class="inner">
                <h3>${value?.phone}</h3>
              </div>
              <div class="inner"> <a href="${value?.email}">${value?.email}</a> </div>
            </div>
            <div class="contact-bottom">
              <ul class="follow-us clearfix">
                <li><a href="//${value?.facebook}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="//${value?.twitter}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="//${value?.instagram}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="//${value?.youtube}"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              </ul>
            </div>
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