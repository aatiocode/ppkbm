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
        <div id="map"><iframe src="https://snazzymaps.com/embed/21734" style="border:none;"></iframe></div>
        <div class="container">
            <div class="contact-detail">
                <div class="address">
                    <div class="inner">
                        <h3>Edumart</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has...</p>
                    </div>
                    <div class="inner">
                        <h3>000 0000 000</h3>
                    </div>
                    <div class="inner"> <a href="mailto:info@edumart.com">info@edumart.com</a> </div>
                </div>
                <div class="contact-bottom">
                    <ul class="follow-us clearfix">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
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