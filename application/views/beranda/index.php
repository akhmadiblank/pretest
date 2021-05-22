< <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-film mr-2"></i>

                instanceME
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" aria-current="page" href="index.html"><i class="fas fa-camera-retro"></i> Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" href="videos.html"><i class="fas fa-video"></i> Videos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-4" href="<?= base_url(); ?>user"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-3" href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?= base_url('asset/'); ?>img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">

            <div class="row tm-mb-90 tm-gallery">
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-03.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Clocks</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">18 Oct 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>9,906 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-04.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Plants</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">14 Oct 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>16,100 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-05.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Morning</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">12 Oct 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>12,460 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-06.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Pinky</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">10 Oct 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>11,402 views</span>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-01.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Hangers</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">24 Sep 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>16,008 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-02.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Perfumes</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">20 Sep 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>12,860 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-07.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Bus</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">16 Sep 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>10,900 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-08.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>New York</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">12 Sep 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>11,300 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-09.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Abstract</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">10 Sep 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>42,700 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-10.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Flowers</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">8 Sep 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>11,402 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-11.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Rosy</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">4 Sep 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>32,906 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-12.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Rocki</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">28 Aug 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>50,700 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-13.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Purple</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">22 Aug 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>107,510 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-14.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Sea</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">14 Aug 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>118,006 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-15.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Turtle</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">9 Aug 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>121,300 views</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?= base_url('asset/'); ?>img/img-16.jpg" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2>Peace</h2>
                            <a href="photo-detail.html">View more</a>
                        </figcaption>
                    </figure>
                    <div class="d-flex justify-content-between tm-text-gray">
                        <span class="tm-text-gray-light">3 Aug 2020</span>
                        <span><a href=""><i class="far fa-thumbs-up"></i></a></span>
                        <span><a href=""><i class="far fa-comment"></i></a></span>
                        <span><a href=""><i class="fas fa-paper-plane"></i></a></span>
                        <span>21,204 views</span>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row tm-mb-90">
                <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                    <a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>
                    <div class="tm-paging d-flex">
                        <a href="javascript:void(0);" class="active tm-paging-link">1</a>
                        <a href="javascript:void(0);" class="tm-paging-link">2</a>
                        <a href="javascript:void(0);" class="tm-paging-link">3</a>
                        <a href="javascript:void(0);" class="tm-paging-link">4</a>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-primary tm-btn-next">Next Page</a>
                </div>
            </div>
        </div> <!-- container-fluid, tm-container-content -->