<script setup>
    defineProps({
        abouts: Object,
    });
</script>

<template>
    <section id="about" class="section bg-slate-100 dark:bg-slate-900 mb-10">
        <div class="container mx-auto">
            <div class="flex flex-col xl:flex-row gap-24" v-for="about in abouts.data" :key="about.id">
                <img class="object-cover h-full w-[566px] md:mx-auto lg:mx-0 rounded-2xl" :src="about.image" alt="about">
                <div class="flex flex-col items-center text-center lg:items-start lg:text-left">
                    <div class="flex flex-col">
                        <h2 class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3">
                            About Me
                        </h2>
                        <p class="mb-4 text-orange-400">
                            {{ about.title }} 
                        </p>
                        <hr class="mb-8 opacity-90 dark:opacity-5">
                        <p class="mb-8">
                            {{ about.description }}
                        </p>
                    </div>
                    <a href="#contact" class="btn btn-md bg-orange-400 text-slate-200">
                        Contact Me
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>