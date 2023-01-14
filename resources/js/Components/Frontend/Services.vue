<script setup>
    defineProps({
        services: Object,
    })
</script>

<template>
    <section id="services" class="section bg-gray-50 dark:bg-slate-900 mt-20 mb-10">
        <div class="container mx-auto" v-motion 
        :initial="{ opacity: 0, y: 100 }"
        :visible="{ opacity: 1, y: 0, }">
            <div class="flex flex-col items-center text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">What I do for clients</h2>
                <p class="mt-4 text-gray-500 dark:text-gray-400">Client-focused, and customer-centric, creating website solutions that deliver tangible business results, I help brands the ever-changing digital landscape.</p>

            </div>

            <div class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2 mt-10">
                <figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700 m-5" v-for="service in services.data" :key="service.id">
                    <figcaption class="flex items-center justify-center">
                        <img class="rounded-5 w-100 h-100" :src="service.image" :alt="service.title">
                    </figcaption>  
                    <blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400 pt-10">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ service.title }}</h3>
                        <p class="my-4 font-light">{{ service.description }}</p>
                    </blockquote>
                </figure>
            </div>
        </div>
    </section>
</template>