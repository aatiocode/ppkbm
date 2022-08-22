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
                        <h1>Artikel</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ==============================================
    ** Blog **
    =================================================== -->
    <div class="container blog-wrapper padding-lg">
        <div class="row">
            <!-- Start Left Column -->
            <div class="col-sm-8 blog-left">
                <ul class="blog-listing">
                    <li> <img src="images/blog-img1.jpg" class="img-responsive" alt="">
                        <h2>Judul Artikel</h2>
                        <ul class="post-detail">
                            <li><span class="icon-date-icon ico"></span><span class="bold">14 Feb</span> 2017</li>
                            <li>Posted By : <span class="bold">Penulis</span></li>
                        </ul>
                        <p>Deskripsi singkat Artikel...</p>
                        <a href="artikelDetail.php" class="read-more"><span class="icon-play-icon"></span>Baca Selengkapnya ...</a>
                    </li>
                </ul>
                <ul class="pagination">
                    <li> <a href="#" aria-label="Previous"> <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</span> </a> </li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li> <a href="#" aria-label="Next"> <span aria-hidden="true">Next <i class="fa fa-angle-right" aria-hidden="true"></i></span> </a> </li>
                </ul>
            </div>
            <!-- End Left Column -->

            <!-- Start Right Column -->
            @include('landing/artikelSideRight')
            <!-- End Right Column -->
        </div>
    </div>
@endsection