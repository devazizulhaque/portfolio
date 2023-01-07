<script setup>
    defineProps({
        services: Object,
    })
</script>

<template>
    <section class="section bg-gray-50 dark:bg-slate-900">
        <div class="container mx-auto">
            <div class="flex flex-col items-center text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">What I do for clients</h2>
                <p class="mt-4 text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

            </div>

            <div class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2 mt-10" v-for="service in services.data" :key="service.id">
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700 m-5">
                    <figcaption class="flex items-center justify-center">
                        <img class="rounded-5 w-100 h-100" :src="service.image" :alt="service.title">
                    </figcaption>  
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400 pt-10">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ service.title }}</h3>
                        <p class="my-4 font-light">{{ service.description }}</p>
                    </blockquote>
                </figure>
            </div>


            <!-- <div class="grid lg:grid-cols-3 gap-8 mt-5" v-for="service in services.data" :key="service.index">
                <div class="bg-slate-400 dark:bg-slate-900 p-6 rounded-2xl">
                    <div class="text-orange-400 rounded-sm w-12 h-12 flex justify-center items-center mb-24 text-[28px]">
                        <img :src="service.image" :alt="service.title">
                    </div>
                    <h3 class="text-xl font-bold text-white mb-4">{{ service.title }}}</h3>
                    <p class="text-gray-200 dark:text-gray-400">{{ service.description }}</p>

                </div>
            </div> -->
        </div>
    </section>
</template>