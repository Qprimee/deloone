<script setup>
import { ref } from 'vue';

</script>

<template>
    <div>
        <div>       
            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
<div class="bg-[url('../images/footer-bg.png')]">
    <!-- contact section -->
    <section class="contact_section layout_padding" back id="contactLink">
    </section>

    <!-- info section -->
    <section class="info_section layout_padding2">
    <div class="container">
        <div class="row">
        <div class="col-md-3">
            <div class="info_logo text-gray-500">
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
            <div class="info_links text-gray-500">
            <h4>
                لینک های اصلی
            </h4>
            <ul class="  ">
                <li class="  text-gray-500">
                <a class="text-gray-500" href="/">خانه </a>
                </li>
                <li class="">
                <a class="" href="/about"> درباره ما</a>
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
            <div class="info_contact text-gray-700">
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

        </div>
    </div>
    </section>

    <!-- end info_section -->


    <!-- footer section -->
    <section class="container-fluid footer_section ">
    <div class="container">
        <p>
        &copy; <span id="displayYear"></span> تمامی حقوق متعلق است به مرکز نیکوکاری دلووان
        </p>
    </div>
    </section>
</div>
</template>