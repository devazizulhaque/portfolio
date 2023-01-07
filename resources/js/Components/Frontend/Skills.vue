<script setup>
    defineProps({
        skills: Object,
    });
</script>
<template>
    <section class="bg-gray-50 dark:bg-slate-900 mb-10 py-12">
        <div class="container mx-auto">
            <h1 class="text-3xl lg:text-4xl font-medium lg:font-extrabold mb-3 text-center pb-10">
                Skills
            </h1>
            <div class="grid grid-flow-col mx-32">
                <div class="flex items-center justify-center" v-for="skill in skills.data" :key="skill.id">
                    <img :src="skill.image" :alt="skill.name" class="lg:h-20" />
                </div>
            </div>
        </div>
    </section>
</template>