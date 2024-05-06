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
    <section id="kategori-slider2" class="section-padding" style="padding-left: 50px; padding-right: 50px; padding-top: 40px;">
      <div class="container-fluid" style="overflow: hidden;">
        <h5 style="margin-bottom: 15px; position: relative; font-weight: bold;">Kategori
          <div class="navigation2" style="position: absolute; top: 0; right: 0; margin-right: -20px;">
            <button class="prev-btn2"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next-btn2"><i class="fa-solid fa-arrow-right"></i></button>
          </div>
        </h5>
          <div class="slider2" style="margin-bottom: 15px;">
            <div class="slidee2">
              <a href="daftar.html" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-plug" style="margin-top:35px; font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="margin-top: 30px; font-size: large; font-weight: bold;">
                            Elektronik
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            <div class="slidee2">
              <a href="daftar.html" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-briefcase" style="margin-top: 35px; font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="margin-top: 30px; font-size: large; font-weight: bold;">
                            Aksesoris
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            <div class="slidee2">
              <a href="daftar.html" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-futbol" style="margin-top: 35px; font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="margin-top: 30px; font-size: large; font-weight: bold;">
                            Hobi dan Koleksi
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            <div class="slidee2">
              <a href="daftar.html" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-mobile-screen" style="margin-top: 35px; font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="margin-top: 30px; font-size: large; font-weight: bold;">
                            Gadget
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            <div class="slidee2">
              <a href="daftar.html" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-shapes" style="margin-top: 35px; font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="margin-top: 30px; font-size: large; font-weight: bold;">
                            Lain-lain
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            <div class="slidee2">
              <a href="daftar.html" class="card-item">
                <div class="kategori-item">
                    <div class="descr2">
                      <h6 class="title3">
                        <i class="fa-solid fa-location-dot" style="margin-top: 35px; font-size: 30px;"></i>
                      </h6>
                        <h6 class="title3" style="margin-top: 30px; font-size: large; font-weight: bold;">
                            Elektronik
                        </h6>
                    </div>
                </div>
              </a>
            </div>
            </div>
          </div>
        </div>
    </section>

    <!-- trending -->
    <section id="trending-slider" class="section-padding" style="padding-left: 50px; padding-right: 50px; margin-top: -75px;">
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
                      <a href="single-trending.html">
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
                      <img class="img-fluid" src="assets/img/about/img3.jpg" alt="" />
                    </a>
                  </div>
                  <div class="descr">
                    <h6 class="title2">
                      <a href="single-trending.html">
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
                      <a href="single-trending.html">
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
                      <a href="single-trending.html">
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
                      <a href="single-trending.html">
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
                      <a href="single-trending.html">
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
                      <a href="single-trending.html">
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
