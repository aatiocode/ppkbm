@extends('landing/index')
@section('contentlanding')
<!-- ==============================================
** Banner Carousel **
=================================================== -->
<div class="banner-outer">
    <div class="banner-slider"></div>
</div>

<!-- ==============================================
** About **
=================================================== -->
<section class="about">
    <div class="container">
        <ul class="row our-links paket-pendidikan"></ul>
    </div>
    <div class="container tentang-kami"></div>
</section>

<!-- ==============================================
** Testimonials **
=================================================== -->
<section class="testimonial padding-lg">
    <div class="container">
        <div class="wrapper">
            <h2>Testimoni Alumni</h2>
            <ul class="testimonial-slide testimonial-list"></ul>
            <div id="bx-pager" class="testimonial-photo"></div>
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

      axios.get('{{url('/')}}/api/beranda', {
        headers: headers
      })
      .then(({ data }) => {
        console.log(data, 'data main')
        $.each(data?.response?.galeri, function (index, value) {
          $('.banner-slider').append(`
          <div class="slide${index + 1}" style="background: url(${value?.foto}) no-repeat center top / cover;">
              <div class="container">
                  <div class="content animated fadeInRight">
                      <div class="fl-right">
                          <h1 class="animated fadeInRight">Explore the World of <span class="animated fadeInRight">Our Graduates</span> </h1>
                          <p class="animated fadeInRight">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                          <a href="{{url('/tentang-kami')}}" class="btn animated fadeInRight">Know More <span class="icon-more-icon"></span></a>
                      </div>
                  </div>
              </div>
          </div>
          `)
        });

        $.each(data?.response?.paketPendidikan, function (index, value) {
          $('.paket-pendidikan').append(`
          <li class="col-sm-4 ${index % 2 === 0 ? 'apply-online' : 'prospects'} clearfix equal-hight">
            <div class="icon"><img src="images/certification-ico.png" class="img-responsive" alt=""></div>
            <div class="detail">
              <h3>${value?.judul}</h3>
              <p>${value?.deskripsi_singkat}</p>
              <a href="apply-online.html" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
          </li>
          `)
        });

        $.each(data?.response?.tentangKami, function (index, value) {
          $('.about').css('background', `url(${value?.foto}) no-repeat center bottom`)
          $('.tentang-kami').append(`
          <div class="row">
            <div class="col-sm-7 col-sm-push-5 left-block"> <span class="sm-head">Pusat Pelatihan Belajar Masyarakat</span>
              <h2>${value?.judul}</h2>
              <p>${value?.deskripsi_singkat}</p>
              <div class="know-more-wrapper"> <a href="{{url('/tentang-kami')}}" class="know-more">Mengetahui Lebih Lengkap <span class="icon-more-icon"></span></a> </div>
            </div>
            <div class="col-sm-5 col-sm-pull-7">
              <div class="video-block">
                <div id="thumbnail_container"> <img src="${value?.foto}" id="thumbnail" class="img-responsive" alt=""></div>
                <a href="${value?.video}" class="start-video video"><img src="images/play-btn.png" alt=""></a>
              </div>
            </div>
          </div>
          `)
        });

        $.each(data?.response?.testimoni, function (index, value) {
          $('.testimonial-photo').append(`
            <a data-slide-index="${index}" href=""><img src="${value?.foto}" class="img-circle" alt="" width="100"/></a>
          `)
          $('.testimonial-list').append(`
          <li>
            <p>${value?.deskripsi_singkat} <a href="#">Read more</a></p>
            <span>${value?.nama_user}, <span>${value?.kota}</span></span>
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