@extends('layouts.template')

@section('content')

<!-- Main Carousel Section Start -->
<div id="main-slide" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/img/slider/tes3.png" alt="First slide">
                    <div class="carousel-caption d-md-block">
                        <!-- <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
                        <h1 class="wow fadeInDown heading" data-wow-delay=".4s">Design Thinking Conference</h1> -->
                        <!-- <a href="#" class="fadeInLeft wow btn btn-common btn-lg" data-wow-delay=".6s">Get Ticket</a>
                        <a href="#" class="fadeInRight wow btn btn-border btn-lg" data-wow-delay=".6s">Explore More</a> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider/tes4.png" alt="Second slide">
                    <div class="carousel-caption d-md-block">
                    <!-- <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
                    <h1 class="wow bounceIn heading" data-wow-delay=".7s">22 Amazing Speakers</h1>
                    <a href="#" class="fadeInUp wow btn btn-border btn-lg" data-wow-delay=".8s">Learn More</a> -->
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/img/slider/tes5.png" alt="Third slide">
                    <div class="carousel-caption d-md-block">
                    <!-- <p class="fadeInUp wow" data-wow-delay=".6s">Global Grand Event on Digital Design</p>
                    <h1 class="wow fadeInUp heading" data-wow-delay=".6s">Book Your Seat Now!</h1>
                    <a href="#" class="fadeInUp wow btn btn-common btn-lg" data-wow-delay=".8s">Explore</a> -->
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#main-slide" role="button" data-slide="prev">
                <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#main-slide" role="button" data-slide="next">
                <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Main Carousel Section End -->

        
        <!-- Kategori -->
    <section id="kategori-slider2" class="section-padding" style="padding-left: 50px; padding-right: 50px; padding-top: 20px;">
      <div class="container-fluid" style="overflow: hidden;">
          <div class="slider2">
            <div class="slidee2">
              <a href="/kategori_barang" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-plug" style="font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="font-weight: bold; color: #000">
                            Elektronik
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            <div class="slidee2">
              <a href="/kategori_barang" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-briefcase" style="font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="font-weight: bold; color: #000">
                            Aksesoris
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            <div class="slidee2">
              <a href="/kategori_barang" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-futbol" style="font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="font-weight: bold; color: #000">
                            Hobi
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            <div class="slidee2">
              <a href="/kategori_barang" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-mobile-screen" style="font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="font-weight: bold; color: #000">
                            Gadget
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            <div class="slidee2">
              <a href="/kategori_barang" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-car" style="font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="font-weight: bold; color: #000">
                            Otomotif
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            </div>
          </div>
        </div>
    </section>

    <!-- Live -->
    <section id="trending-slider" class="section-padding" style="padding-left: 50px; padding-right: 50px; margin-top: -95px;">
      <div class="container-fluid" style="overflow: hidden;">
        <h5 style="margin-bottom: 15px; position: relative; font-weight: bold;">Sedang Berlangsung
          <div class="navigation" style="position: absolute; top: 0; right: 0; margin-right: -20px;">
            <button class="prev-btn"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next-btn"><i class="fa-solid fa-arrow-right"></i></button>
          </div>
        </h5>
          <div class="slider">
            <div class="slidee">
              <div class="card-item">
                <div class="trending-item">
                  <div class="trending-image">
                    <a href="#">
                <div class="tag">Live</div>
                      <img class="img-fluid" src="assets/img/about/about.jpg" alt="" />
                    </a>
                  </div>
                  <div class="descr">
                    <h6 class="title2">
                      <a href="/detail_lelang">
                        Nike Air Jordan KW Super
                      </a>
                    </h6>
                    <div class="meta-tags">
                      <p>2018 | 43 | JPN</p>
                      <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                      <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                      <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="slidee">
              <div class="card-item">
                <div class="trending-item">
                  <div class="trending-image" style="object-fit: cover;">
                    <a href="#">
                      <div class="tag">Live</div>
                      <img class="img-fluid" src="assets/img/img6.jpeg" alt="" />
                    </a>
                  </div>
                  <div class="descr">
                    <h6 class="title2">
                      <a href="/detail_lelang">
                        Nike Air Jordan KW Super
                      </a>
                    </h6>
                    <div class="meta-tags">
                      <p>2018 | 43 | JPN</p>
                      <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                      <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                      <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="slidee">
              <div class="card-item">
                <div class="trending-item">
                  <div class="trending-image">
                    <a href="#">
                    <div class="tag">Live</div>
                      <img class="img-fluid" src="assets/img/about/img2.jpg" alt="" />
                    </a>
                  </div>
                  <div class="descr">
                    <h6 class="title2">
                      <a href="/detail_lelang">
                        Nike Air Jordan KW Super
                      </a>
                    </h6>
                    <div class="meta-tags">
                      <p>2018 | 43 | JPN</p>
                      <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                      <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                      <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="slidee">
              <div class="card-item">
                <div class="trending-item">
                  <div class="trending-image">
                    <a href="#">
                <div class="tag">Live</div>
                      <img class="img-fluid" src="assets/img/about/img1.jpg" alt="" />
                    </a>
                  </div>
                  <div class="descr">
                    <h6 class="title2">
                      <a href="/detail_lelang">
                        Nike Air Jordan KW Super
                      </a>
                    </h6>
                    <div class="meta-tags">
                      <p>2018 | 43 | JPN</p>
                      <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                      <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                      <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="slidee">
              <div class="card-item">
                <div class="trending-item">
                  <div class="trending-image">
                    <a href="#">
                <div class="tag">Live</div>
                      <img class="img-fluid" src="assets/img/blog/img-1.jpg" alt="" />
                    </a>
                  </div>
                  <div class="descr">
                    <h6 class="title2">
                      <a href="/detail_lelang">
                        Nike Air Jordan KW Super
                      </a>
                    </h6>
                    <div class="meta-tags">
                      <p>2018 | 43 | JPN</p>
                      <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                      <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                      <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="slidee">
              <div class="card-item">
                <div class="trending-item">
                  <div class="trending-image">
                    <a href="#">
                <div class="tag">Live</div>
                      <img class="img-fluid" src="assets/img/about/about.jpg" alt="" />
                    </a>
                  </div>
                  <div class="descr">
                    <h6 class="title2">
                      <a href="/detail_lelang">
                        Nike Air Jordan KW Super
                      </a>
                    </h6>
                    <div class="meta-tags">
                      <p>2018 | 43 | JPN</p>
                      <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                      <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                      <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="slidee">
              <div class="card-item">
                <div class="trending-item">
                  <div class="trending-image">
                    <a href="#">
                <div class="tag">Live</div>
                <img class="img-fluid" src="assets/img/about/about.jpg" alt="" />
                    </a>
                  </div>
                  <div class="descr">
                    <h6 class="title2">
                      <a href="/detail_lelang">
                        Nike Air Jordan KW Super
                      </a>
                    </h6>
                    <div class="meta-tags">
                      <p>2018 | 43 | JPN</p>
                      <p style="color: #35755D; font-weight: bolder;">Rp 700.000</p>
                      <p><i class="fa-regular fa-calendar-days"></i> 04 Mei 2024</p>
                      <p><i class="fa-solid fa-location-dot"></i> Semarang</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="navigation" style="text-align: center; margin-top: 15px;">
            <!-- <button class="prev-btn" style="margin-right: 5px;"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next-btn"><i class="fa-solid fa-arrow-right"></i></button> -->
          </div>
        </div>
    </section>

    <div class="dropdown-divider"></div>
    <!-- Services Section Start -->
    <section id="services" class="services section-padding">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="section-title-header text-center">
              <h1 class="section-title wow fadeInUp" data-wow-delay="0.2s">Kenapa lelang di SiLelang?</h1>
            </div>
          </div>
        </div>
        <div class="row services-wrapper">
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="0.2s">
              <div class="icont">
                <i class="lni-heart"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Get Inspired</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="0.4s">
              <div class="icont">
                <i class="lni-gallery"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Meet New Faces</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="0.6s">
              <div class="icont">
                <i class="lni-envelope"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Fresh Tech Insights</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
              </div>
            </div>
          </div>
          <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="0.8s">
              <div class="icont">
                <i class="lni-cup"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Networking Session</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
              </div>
            </div>
          </div>
           <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="1s">
              <div class="icont">
                <i class="lni-user"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Global Event</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
              </div>
            </div>
          </div>
           <!-- Services item -->
          <div class="col-md-6 col-lg-4 col-xs-12 padding-none">
            <div class="services-item wow fadeInDown" data-wow-delay="1.2s">
              <div class="icont">
                <i class="lni-bubble"></i>
              </div>
              <div class="services-content">
                <h3><a href="#">Free Swags</a></h3>
                <p>Lorem ipsum dolor sit amet, consectetuer commodo ligula eget dolor.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section End -->

    
    
