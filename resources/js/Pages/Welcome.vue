<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

</script>

<template>
    <Head title="خوش آمدید" />

    <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.html">
            <span>
              دلووان
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>

          <div class="navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="#">خانه <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about"> درباره ما</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#service"> سرویس </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#contactLink">ارتباط با ما</a>
                </li>
                <div v-if="$page.props.auth.user">
                  <li class="nav-item">
                    <a class="nav-link" href="/dashboard">داشبورد</a>
                  </li>
                </div>
                <div v-else>
                  <li class="nav-item">
                    <a class="nav-link" href="/login">ورود</a>
                  </li>
                </div>

              </ul>
            </div>
            <div class="quote_btn-container ">
              <a href="">
                <img src="images/call.png" alt="">
                <span>
                  تماس : 08735162095
                </span>
              </a>
              <form class="form-inline">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section ">
      <carousel :items-to-show="1.5">
        <slide v-for="slide in 2" :key="slide">

                <div class="container carousel__item">
                  <div class="row">
                    <div class="col-md-6 ">
                      <div class="detail_box">
                        <div v-if="slide == 2">
                          <h1>
                          مرکز نیکوکاری دلووان
                          </h1>
                          <p>
                            گاهی خداوند میخواهد با دست تو دست بنده ای را بگیرد
                          </p>
                        </div>
                        <div v-else>
                          <h1>
                          مرکز نیکوکاری دلووان
                          </h1>
                          <p>
                          گاهی خداوند میخواهد با دست تو دست بنده ای را بگیرد
                          </p>
                        </div>

                        <div class="btn-box">
                          <a href="" class="btn-1">
                            ارتباط با ما
                          </a>
                          <a href="" class="btn-2">
                            کمک کنید
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="img-box">
                        <img :src="'images/slider-img'+slide+'.jpg'" alt="" class="rounded-3xl">
                      </div>
                    </div>
                  </div>
                </div>

        </slide>
        <template #addons>
          <Navigation />
          <Pagination />
        </template>
      </carousel>
    </section>
    <!-- end slider section -->
    </div>

    <!-- about section -->

  <section class="about_section " id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/about-img2.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                درباره ما
              </h2>
            </div>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            </p>
            <a href="/blog/درباره ما">
              بیشتر بخوانید
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!-- service section -->
    <section class="service_section layout_padding" id="service">
    <div class="container-fluid">
      <div class="heading_container">
        <h2>
          سرویس های ما
        </h2>
        <p>
          consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>

      <div class="service_container">
        <div class="box">
          <div class="img-box">
            <img src="images/s-1.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              برند ما
            </h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/s-2.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              وسایل اهدا شده

            </h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/s-3.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              کمک ها ی اخیر
            </h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="images/s-4.png" alt="">
          </div>
          <div class="detail-box">
            <h5>
              مستندات
            </h5>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            </p>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="/blog/سرویس های ما">
          بیشتر بخوانید
        </a>
      </div>
    </div>
    </section>

    <!-- work section -->

  <section class="work_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          ما چگونه کار میکنیم !
        </h2>
        <p>
          consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="detail_container">
            <div class="box b-1">
              <div class="top-box">
                <div class="icon-box">
                  <img src="images/work-i1.png" alt="">
                </div>
                <h5>
                  ما اول نیازمندان را شناسایی می کنیم
                </h5>
              </div>
              <div class="bottom-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam
                </p>
              </div>
            </div>
            <div class="box b-1">
              <div class="top-box">
                <div class="icon-box">
                  <img src="images/work-i2.png" alt="">
                </div>
                <h5>
                  بعد کمک ها را جمع آوری میکنیم
                </h5>
              </div>
              <div class="bottom-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                  dolore magna aliqua. Ut enim ad minim veniam
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/work-img.jpg" alt="">
          </div>
        </div>
      </div>

      <div class="btn-box">
        <a href="/blog/ما چگونه کار میکنیم">
          بیشتر بخوانید
        </a>
      </div>
    </div>
  </section>

  <div class="footer_bg">

<!-- contact section -->
<section class="contact_section layout_padding" id="contactLink">

</section>


<!-- end contact section -->



<!-- info section -->
<section class="info_section layout_padding2">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="info_logo">
          <h3>
            دلووان
          </h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor indidunt ut labore et
            dolore magna
          </p>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_links">
          <h4>
            لینک های اصلی
          </h4>
          <ul class="  ">
            <li class=" active">
              <a class="" href="index.html">خانه <span class="sr-only">(current)</span></a>
            </li>
            <li class="">
              <a class="" href="about.html"> درباره ما</a>
            </li>
            <li class="">
              <a class="" href="service.html"> سرویس ها </a>
            </li>
            <li class="">
              <a class="" href="#contactLink">ارتباط با ما</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_contact">
          <h4>
            راه های ارتباطی
          </h4>
          <a href="">
            <div class="img-box">
              <img src="images/telephone-white.png" width="12px" alt="">
            </div>
            <p>
              08735162919
            </p>
          </a>
          <a href="">
            <div class="img-box">
              <img src="images/envelope-white.png" width="18px" alt="">
            </div>
            <p>
              demo@gmail.com
            </p>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div class="info_form ">

        </div>
      </div>
    </div>
  </div>
</section>

<!-- end info_section -->


<!-- footer section -->
<section class="container-fluid footer_section">
  <div class="container">
    <p>
      &copy; <span id="displayYear"></span> تمامی حقوق متعلق است به مرکز نیکوکاری دلووان
    </p>
  </div>
</section>
<!-- footer section -->

</div>


</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}

.carousel__item {
  min-height: 200px;
  width: 100%;
  color: var(--vc-clr-white);
  font-size: 20px;
  border-radius: 8px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.carousel__slide {
  padding: 10px;
}

.carousel__prev,
.carousel__next {
  box-sizing: content-box;
  border: 5px solid white;
}
</style>
