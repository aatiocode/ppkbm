<header>
  <div class="header-top">
      <div class="container clearfix">
          <ul class="follow-us hidden-xs">
              <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
          </ul>
          <div class="right-block clearfix">
              <ul class="top-nav hidden-xs">
                  <li><a href="register.php">Login</a></li>
                  <li><a href="blog.php">Artikel</a></li>
                  <li><a href="faq1.php">FAQs</a></li>
              </ul>
          </div>
      </div>
  </div>
  <!-- End Header top Bar -->
  <!-- Start Header Middle -->
  <div class="container header-middle">
      <div class="row"> <span class="col-xs-6 col-sm-3"><a href="{{url('/')}}"><img src="images/logo.png" class="img-responsive" alt=""></a></span>
          <div class="col-xs-6 col-sm-3"></div>
          <div class="col-xs-6 col-sm-9">
              <div class="contact clearfix">
                  <ul class="hidden-xs">
                      <li> <span>Email</span> <a href="mailto:info@edumart.org">info@edumart.org</a> </li>
                      <li> <span>Telp</span> +62 812 1111 1111</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <!-- End Header Middle -->
  <!-- Start Navigation -->
  <nav class="navbar navbar-inverse" style="border-color: transparent !important; background-color: #32C4EB !important; color: #fff !important;">
      <div class="container">
          <div class="navbar-header">
              <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="navbar-collapse collapse" id="navbar">
              <ul class="nav navbar-nav navbar-right">
                  <li> <a style="color: #fff !important;" href="{{url('/')}}">Beranda</a></li>
                  <li class="dropdown"> <a style="color: #fff !important;" data-toggle="dropdown" href="#">Profil Sekolah <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                      <ul class="dropdown-menu">
                          <li><a href="{{url('/tentang-kami')}}">Tentang Kami</a></li>
                          <li><a href="{{url('/identitas')}}">Identitas Sekolah</a></li>
                          <li><a href="{{url('/visi-misi')}}">Visi dan Misi</a></li>
                          <li><a href="{{url('/program-belajar')}}">Program Belajar</a></li>
                          <li><a href="{{url('/pengajar-dan-staff')}}">Pengajar Dan Staf</a></li>
                      </ul>
                  </li>
                  <li> <a style="color: #fff !important;" href="{{url('/galeri')}}">Galeri</a></li>
                  <li> <a style="color: #fff !important;" href="{{url('/artikel')}}">Artikel</a></li>
                  <li class="dropdown"> <a style="color: #fff !important;" data-toggle="dropdown" href="#">E-learning <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                      <ul class="dropdown-menu">
                          <li><a href="http://setara.kemdikbud.go.id/kesetaraan" target="_blank">Setara daring</a></li>
                          <li><a href="https://emodul.kemdikbud.go.id/" target="_blank">E-Modul</a></li>
                          <li><a href="{{url('/bahan-ajar')}}">Bahan Ajar</a></li>
                      </ul>
                  </li>
                  <li><a style="color: #fff !important;" href="{{url('/contact')}}">Lokasi Sekolah</a></li>
              </ul>
          </div>
      </div>
  </nav>
  <!-- End Navigation -->
</header>