<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';



function onFileChange(event){
  var fileData =  event.target.files[0];
  var fileName = fileData.name;
  document.getElementById("fileName").innerHTML = fileName;
}

const form = useForm({
  title: '',
  body: '',
  img: "",
  type: ''
})

const submit = () => {
    form.post(route('post.store'), {
        
    });
};


</script>

<template>
  <Head title="Post" />

    <div class="hero_area">

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

      <AuthenticatedLayout>
        <form @submit.prevent="submit">
          
          <!-- type of post -->
          <InputError class="mt-2 ml-2" :message="form.errors.type" />
          <div class="flex flex-wrap float-left ml-10">
            <div class="flex items-center mr-4">
                <TextInput 
                  id="red-radio"
                  name="type"
                  type="radio"
                  value="requirements" 
                  class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  required
                  v-model="form.type"
                />
                <label for="red-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">نیازمندی ها</label>
            </div>
            <div class="flex items-center mr-4">
                <TextInput
                  id="green-radio"
                  name="type"
                  type="radio"
                  value="donations"
                  class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  required
                  v-model="form.type"
                />
                <label for="green-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">اهدایی ها</label>
            </div>
          </div>

          <!-- title input -->
          <div class="relative z-0 w-11/12 mb-6 group float-right">
            <TextInput
              type="text"
              name="title"
              id="title"
              class="block py-2.5 px-0 w-full text-sm text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
              v-model="form.title"
              placeholder=" "
              required 
            />
            <label for="title" class="peer-focus:font-medium absolute text-2xl text-white dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">عنوان</label>
            <InputError class="mt-2" :message="form.errors.title" />
          </div>


          <!-- file input -->
          <div class="flex items-center justify-center w-11/12 mr-5 float-right mb-6">
          <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-34 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
              <div class="flex flex-col items-center justify-center pt-5 pb-6">
                  <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                  <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">برای بارگذاری کلیک کنید</span> یا فایل را به اینجا بکشید</p>
                  <p class="text-xs text-gray-500 dark:text-gray-400" id="fileName">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
              </div>
              <TextInput
                id="dropzone-file"
                name="img"
                type="file"
                class="hidden"
                @input="form.img = $event.target.files[0]"
                @change="onFileChange"/>
                <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                  {{ form.progress.percentage }}%
                </progress>
                <InputError class="mt-2" :message="form.errors.img" />
          </label>
          </div> 

          <!-- texttarea -->
          <div class="">
            <InputError class="mt-2 p-2.5 w-11/12 mr-5 float-right" :message="form.errors.body" />
            <textarea
              id="message"
              name="body"
              rows="4"
              class="p-2.5 w-11/12 mr-5 float-right text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 h-64 text-lx"
              v-model="form.body"
              required
              placeholder="... موضوع را بنویسید"
            ></textarea>
          </div>

          <button type="submit" :disabled="form.processing" class="text-white ml-10 float-left bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">ثبت</button>
        </form>
      </AuthenticatedLayout>
    </div>
</template>