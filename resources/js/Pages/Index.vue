<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import GuestNavbarLayout from '@/Layouts/GuestNavbarLayout.vue';
import FooterLayout from '@/Layouts/FooterLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const post = defineProps({
  donations: Object,
  requirements: Object
});

</script>

<template>
    <Head title="بلاگ ها" />

    <div v-if="$page.props.auth.user" class="hero_area">
      <AuthenticatedLayout>

        <div class="container my-12 mx-auto px-4 md:px-12 ml-44">
          <p class="text-white">نیازمندی ها:</p>

          <div class="flex flex-wrap -mx-1 lg:-mx-4">
              <!-- Column -->
              <div v-for="requirement in requirements">
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg w-36">

                        <a :href="'/blog/'+requirement.title">
                          <div v-if="requirement.img == ''">
                            <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                          </div>
                          <div v-else>
                            <img alt="Placeholder" class="block h-auto w-full" :src="requirement.img">
                          </div>
                        </a>

                        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg">
                                <a class="no-underline hover:underline text-white" :href="'/blog/'+requirement.title">
                                    {{ requirement.title }}
                                </a>
                            </h1>
                            <p class="text-white text-sm">
                                {{ new Date(requirement.updated_at).toLocaleDateString('fa-IR') }}
                            </p>
                        </header>

                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                            <a class="flex items-center no-underline hover:underline text-white" href="#">
                                <!-- <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random"> -->
                                <p class="ml-2 text-sm">
                                    مدیر
                                </p>
                            </a>
                            <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                <span class="hidden">Like</span>
                                <i class="fa fa-heart"></i>
                            </a>
                        </footer>

                    </article>
                    <!-- END Article -->

                </div>
              </div>
              <!-- END Column -->
          </div>
        </div>

        <div class="container my-12 mx-auto px-4 md:px-12 ml-44">
          <p class="text-white">اهدایی ها:</p>

          <div class="flex flex-wrap -mx-1 lg:-mx-4">
              <!-- Column -->
              <div v-for="donation in donations">
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg w-36">

                        <a :href="'/blog/'+donation.title">
                          <div v-if="donation.img == ''">
                            <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                          </div>
                          <div v-else>
                            <img alt="Placeholder" class="block h-auto w-full" :src="donation.img">
                          </div>
                        </a>

                        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg">
                                <a class="no-underline hover:underline text-white" :href="'/blog/'+donation.title">
                                    {{ donation.title }}
                                </a>
                            </h1>
                            <p class="text-white text-sm">
                                {{ new Date(donation.updated_at).toLocaleDateString('fa-IR') }}
                            </p>
                        </header>

                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                            <a class="flex items-center no-underline hover:underline text-white" href="#">
                                <!-- <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random"> -->
                                <p class="ml-2 text-sm">
                                    مدیر
                                </p>
                            </a>
                            <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                <span class="hidden">Like</span>
                                <i class="fa fa-heart"></i>
                            </a>
                        </footer>

                    </article>
                    <!-- END Article -->

                </div>
              </div>
              <!-- END Column -->
          </div>
        </div>
        <FooterLayout></FooterLayout>
      </AuthenticatedLayout>
    </div> 

    <div v-else class="hero_area">
      <GuestNavbarLayout>
        <div class="container my-12 mx-auto px-4 md:px-12 ml-44">
          <p class="text-white">نیازمندی ها:</p>

          <div class="flex flex-wrap -mx-1 lg:-mx-4">
              <!-- Column -->
              <div v-for="requirement in requirements">
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg w-36">

                        <a :href="'/blog/'+requirement.title">
                          <div v-if="requirement.img == ''">
                            <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                          </div>
                          <div v-else>
                            <img alt="Placeholder" class="block h-auto w-full" :src="requirement.img">
                          </div>
                        </a>

                        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg">
                                <a class="no-underline hover:underline text-white" :href="'/blog/'+requirement.title">
                                    {{ requirement.title }}
                                </a>
                            </h1>
                            <p class="text-white text-sm">
                                {{ new Date(requirement.updated_at).toLocaleDateString('fa-IR') }}
                            </p>
                        </header>

                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                            <a class="flex items-center no-underline hover:underline text-white" href="#">
                                <!-- <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random"> -->
                                <p class="ml-2 text-sm">
                                    مدیر
                                </p>
                            </a>
                            <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                <span class="hidden">Like</span>
                                <i class="fa fa-heart"></i>
                            </a>
                        </footer>

                    </article>
                    <!-- END Article -->

                </div>
              </div>
              <!-- END Column -->
          </div>
        </div>

        <div class="container my-12 mx-auto px-4 md:px-12 ml-44">
          <p class="text-white">اهدایی ها:</p>

          <div class="flex flex-wrap -mx-1 lg:-mx-4">
              <!-- Column -->
              <div v-for="donation in donations">
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                    <!-- Article -->
                    <article class="overflow-hidden rounded-lg shadow-lg w-36">

                        <a :href="'/blog/'+donation.title">
                          <div v-if="donation.img == ''">
                            <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                          </div>
                          <div v-else>
                            <img alt="Placeholder" class="block h-auto w-full" :src="donation.img">
                          </div>
                        </a>

                        <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                            <h1 class="text-lg">
                                <a class="no-underline hover:underline text-white" :href="'/blog/'+donation.title">
                                    {{ donation.title }}
                                </a>
                            </h1>
                            <p class="text-white text-sm">
                                {{ new Date(donation.updated_at).toLocaleDateString('fa-IR') }}
                            </p>
                        </header>

                        <footer class="flex items-center justify-between leading-none p-2 md:p-4">
                            <a class="flex items-center no-underline hover:underline text-white" href="#">
                                <!-- <img alt="Placeholder" class="block rounded-full" src="https://picsum.photos/32/32/?random"> -->
                                <p class="ml-2 text-sm">
                                    مدیر
                                </p>
                            </a>
                            <a class="no-underline text-grey-darker hover:text-red-dark" href="#">
                                <span class="hidden">Like</span>
                                <i class="fa fa-heart"></i>
                            </a>
                        </footer>

                    </article>
                    <!-- END Article -->

                </div>
              </div>
              <!-- END Column -->
          </div>
        </div>
        <FooterLayout></FooterLayout>
      </GuestNavbarLayout>
    </div>

</template>