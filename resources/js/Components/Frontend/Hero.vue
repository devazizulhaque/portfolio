<script setup>
    defineProps({
        heros: Object,
    })
</script>

<template>
    <section id="home" class="lg:h-[120vh] flex items-center bg-slate-100 dark:bg-black py-32 lg:py-0 overflow-hidden mb-10">
        <div class="container mx-auto h-full">
            <div class="flex flex-col md:flex-row items-center h-full pt-8" v-for="hero in heros.data" :key="hero.id">
                <div class="flex-1 flex flex-col items-center lg:items-start">
                    <p class="text-lg text-orange-400 text-md mb-[22px]">Hey, I'm Azizul Haque! 👋</p>
                    <h1 class="text-4xl leading-[44px] md:text-5xl md:leading-tight lg:text-7xl lg:leading-[1.2] font-bold md:tracking-[-2px]">
                        I Build, Design & Develop <br /> Web Application.
                    </h1>
                    <p class="pt-4 pb-8 md:pt-6 md:pb-12 max-w-[480px] text-lg text-center lg:text-left" >
                        {{ hero.description }}
                    </p>
                    <button class="btn btn-md bg-orange-400 hover:bg-slate-300 md:btn-lg transition-all">
                        <span class="text-slate-100 dark:text-white hover:text-black">Get In Touch</span>
                    </button>
                </div>
                <div class="flex flex-1 justify-end items-center h-full mt-8 md:mt-0">
                    <img :src="hero.image" alt="Azizul_Haque" class="rounded-lg"/>
                </div>
            </div> 
        </div>
    </section>
</template>