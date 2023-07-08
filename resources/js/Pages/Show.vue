<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import GuestNavbarLayout from '@/Layouts/GuestNavbarLayout.vue';
import FooterLayout from '@/Layouts/FooterLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const post = defineProps({
   post: Object,
   create: Boolean,
   posts: Object 
});

const form = useForm({

})

const destroy = () => {
    form.delete(`/delete/${post.post.id}`, {
        
    });
};

</script>

<template>
    <Head title="Dashboard" />



    <div v-if="$page.props.auth.user" class="hero_area">
      <AuthenticatedLayout>
        <div v-if="$page.props.flash.message">
        <div class="flex p-4 mb-4 w-11/12 ml-10 mt-2 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
          <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
          <span class="sr-only">Info</span>
          <div>
            <span class="font-medium">
               {{ $page.props.flash.message }}
            </span>
          </div>
        </div>
        </div>
        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24  ">
          <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
              <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                  <header class="mb-4 lg:mb-6 not-format">

                    <div v-if="create" class="flex flex-row mb-5">
                        <a :href="'/edit/'+post.post.title+'/'" class="bg-blue-600 text-white w-fit h-fit p-2 rounded-full mr-5">
                          ویرایش
                        </a>
                        <button @click="destroy(post.post.id)" class="bg-red-600 text-white w-fit h-fit p-2 rounded-full">
                          حذف
                        </button>
                    </div>
                    
                      <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ post.post.title }}</h1>
                  </header>

                  <div v-if="post.post.type == 'requirements'">
                    <div class="w-40 object-right-top p-2 float-right h-10 text-white rounded-full text-center bg-purple-600 mb-20">
                      نیازمندی ها
                    </div>
                  </div>
                  
                  <div v-else>
                    <div class="w-40 object-right-top p-2 float-right h-10 text-white rounded-full text-center bg-green-600 mb-20">
                      اهدایی ها
                    </div>
                  </div>

                  <figure>
                      <img :src="'../'+post.post.img" :alt="post.post.title">
                  </figure>

                  <div class="bg-gray-800 mt-20 text-center rounded-md p-3">
                    <p class="text-white">
                      {{ post.post.body }}
                    </p>
                  </div>

              </article>
          </div>
        </main>

        <p class="text-white m-10">دیگر مقالات</p>

        <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
          <p class="text-white m-10">دیگر مقالات</p>
          <div class="columns-4">
                      <!-- Column -->
                      <div v-for="post in posts">
                  <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                      <!-- Article -->
                      <article class="overflow-hidden rounded-lg shadow-lg w-36">

                          <a :href="'/blog/'+post.title">
                            <div v-if="post.img == ''">
                              <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                            </div>
                            <div v-else>
                              <img alt="Placeholder" class="block h-auto w-auto" :src="'../'+post.img">
                            </div>
                          </a>

                          <header class="flex items-center justify-between leading-tight p-2 md:p-4">
                              <h1 class="text-lg">
                                  <a class="no-underline hover:underline text-white" :href="'/blog/'+post.title">
                                      {{ post.title }}
                                  </a>
                              </h1>
                              <p class="text-white text-sm">
                                  {{ new Date(post.updated_at).toLocaleDateString('fa-IR') }}
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


        </aside>

      <FooterLayout></FooterLayout>
      </AuthenticatedLayout>
    </div>

    <div v-else class="hero_area">
      <GuestNavbarLayout>
        <main class="pt-8 pb-16 lg:pt-16 lg:pb-24  ">
          <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
              <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                  <header class="mb-4 lg:mb-6 not-format">

                    <div v-if="create" class="flex flex-row mb-5">
                        <a :href="'/edit/'+post.post.title+'/'" class="bg-blue-600 text-white w-fit h-fit p-2 rounded-full mr-5">
                          ویرایش
                        </a>
                        <button @click="destroy(post.post.id)" class="bg-red-600 text-white w-fit h-fit p-2 rounded-full">
                          حذف
                        </button>
                    </div>
                    
                      <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ post.post.title }}</h1>
                  </header>

                  <div v-if="post.post.type == 'requirements'">
                    <div class="w-40 object-right-top p-2 float-right h-10 text-white rounded-full text-center bg-purple-600 mb-20">
                      نیازمندی ها
                    </div>
                  </div>
                  
                  <div v-else>
                    <div class="w-40 object-right-top p-2 float-right h-10 text-white rounded-full text-center bg-green-600 mb-20">
                      اهدایی ها
                    </div>
                  </div>

                  <figure>
                      <img :src="'../'+post.post.img" :alt="post.post.title">
                  </figure>

                  <div class="bg-gray-800 mt-20 text-center rounded-md p-3">
                    <p class="text-white">
                      {{ post.post.body }}
                    </p>
                  </div>

              </article>
          </div>
        </main>
        <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">
          <div class="px-4 mx-auto max-w-screen-xl">
              <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">دیگر مقالات</h2>
              <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
                  <article class="max-w-xs">
                      <a href="#">
                          <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png" class="mb-5 rounded-lg" alt="Image 1">
                      </a>
                      <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">
                          <a href="#">Our first office</a>
                      </h2>
                      <p class="mb-4 font-light text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>
                      <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">
                          Read in 2 minutes
                      </a>
                  </article>
              </div>
          </div>
        </aside>

      <FooterLayout></FooterLayout>
      </GuestNavbarLayout>
    </div>
</template>
