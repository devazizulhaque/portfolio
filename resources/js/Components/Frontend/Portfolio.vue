<script setup>
    import Projects from '@/Components/Frontend/Projects.vue';
    defineProps({
        skills: Object,
        projects: Object,
    });
</script>

<template>
    <section id="portfolio" class="section bg-gray-50 dark:bg-slate-900 min-h-[700px]">
        <div class="container mx-auto mb-12">
            <div class="flex flex-col items-center text-center">
                <h2 class="section-title">My latest work</h2>
                <p class="section-subtitle">Here are some of my latest projects</p>
            </div>
        </div>
        <projects :skills="skills" :projects="projects" />
    </section>
</template>