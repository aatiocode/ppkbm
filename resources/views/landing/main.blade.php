@extends('landing/index')
@section('contentlanding')
<!-- ==============================================
** Banner Carousel **
=================================================== -->
<div class="banner-outer">
    <div class="banner-slider">
        <div class="slide1">
            <div class="container">
                <div class="content animated fadeInRight">
                    <div class="fl-right">
                        <h1 class="animated fadeInRight">Explore the World of <span class="animated fadeInRight">Our Graduates</span> </h1>
                        <p class="animated fadeInRight">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="about.html" class="btn animated fadeInRight">Know More <span class="icon-more-icon"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide2">
            <div class="container">
                <div class="content">
                    <h1 class="animated fadeInUp">MBA Marketing</h1>
                    <p class="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <a href="about.html" class="btn animated fadeInUp">Know More <span class="icon-more-icon"></span></a>
                    <a href="gallery.html" class="btn white animated fadeInUp hidden-xs">Take a Tour <span class="icon-more-icon"></span></a>
                </div>
            </div>
        </div>
        <div class="slide3">
            <div class="container">
                <div class="content animated fadeInLeft">
                    <h1 class="animated fadeInLeft">Online MBA</h1>
                    <p class="animated fadeInLeft">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <a href="about.html" class="btn animated fadeInLeft">Know More <span class="icon-more-icon"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ==============================================
** About **
=================================================== -->
<section class="about">
    <div class="container">
        <ul class="row our-links">
            <li class="col-sm-4 apply-online clearfix equal-hight">
                <div class="icon"><img src="images/certification-ico.png" class="img-responsive" alt=""></div>
                <div class="detail">
                    <h3>PAKET A</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing...</p>
                    <a href="apply-online.html" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </li>
            <li class="col-sm-4 prospects clearfix equal-hight">
                <div class="icon"><img src="images/certification-ico.png" class="img-responsive" alt=""></div>
                <div class="detail">
                    <h3>PAKET B</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing...</p>
                    <a href="#" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </li>
            <li class="col-sm-4 certification clearfix equal-hight">
                <div class="icon"><img src="images/certification-ico.png" class="img-responsive" alt=""></div>
                <div class="detail">
                    <h3>PAKET C</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing...</p>
                    <a href="#" class="more"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-sm-push-5 left-block"> <span class="sm-head">Pusat Pelatihan Belajar Masyarakat</span>
                <h2>Tentang Kami</h2>
                <p>Building on Edumart Group’s rich experience with online MBA at Edumart University Online! Designing and delivering both graduate and post-graduate programs across a variety of disciplines, Edumart University Online, offering online MBA has worked upon the knowledge-base created by our highly qualified faculties, our research, publishing and training experience, to create online MBA programs that offer a rich learning experience.</p>
                <div class="know-more-wrapper"> <a href="about.html" class="know-more">Mengetahui Lebih Lengkap <span class="icon-more-icon"></span></a> </div>
            </div>
            <div class="col-sm-5 col-sm-pull-7">
                <div class="video-block">
                    <div id="thumbnail_container"> <img src="images/about-video.jpg" id="thumbnail" class="img-responsive" alt=""> </div>
                    <a href="https://www.youtube.com/watch?v=5rX1EF_VzeE" class="start-video video"><img src="images/play-btn.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==============================================
** Testimonials **
=================================================== -->
<section class="testimonial padding-lg">
    <div class="container">
        <div class="wrapper">
            <h2>Alumini Testimoni</h2>
            <ul class="testimonial-slide">
                <li>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley...<a href="#">Read more</a></p>
                    <span>Thomas, <span>London</span></span>
                </li>
                <li>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley...<a href="#">Read more</a></p>
                    <span>Thomas, <span>London</span></span>
                </li>
                <li>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley...<a href="#">Read more</a></p>
                    <span>Thomas, <span>London</span></span>
                </li>
            </ul>
            <div id="bx-pager">
                <a data-slide-index="0" href=""><img src="images/testimonial-thumb1.jpg" class="img-circle" alt="" /></a>
                <a data-slide-index="1" href=""><img src="images/testimonial-thumb2.jpg" class="img-circle" alt="" /></a>
                <a data-slide-index="2" href=""><img src="images/testimonial-thumb3.jpg" class="img-circle" alt="" /></a>
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

      axios.get('{{url('/')}}/api/artikel', {
        headers: headers
      })
      .then(({ data }) => {
        $('#loading').fadeOut(1000);
      })
      .catch(() => {
        $('#loading').fadeOut(1000);
      })
    }

    init()
  </script>
@endsection