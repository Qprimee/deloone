<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
   create: Boolean 
});
</script>

<template>
    <Head title="Dashboard" />

    <div class="hero_area">
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
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
            </template>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="overflow-hidden shadow-2xl sm:rounded-lg">
                        <div class="p-6 text-white">با موفقیت وارد سایت شدید !</div>
                    </div>
                </div>
            </div>

            <a type="button" :href="route('post.create')" v-if="create" class="bg-blue-600 w-28 h-12 ml-5 rounded-full object-none object-center p-2">
                <center>
                    <p class="text-white">پست جدید</p>
                </center>
            </a>
        </AuthenticatedLayout>
    </div>
</template>
