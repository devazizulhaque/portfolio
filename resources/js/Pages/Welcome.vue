<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';
import FrontendLayout from '@/Layouts/Frontend.vue';
import Hero from '@/Components/Frontend/Hero.vue';
import Promote from '@/Components/Frontend/Promote.vue';
import About from '@/Components/Frontend/About.vue';
import Skills from '@/Components/Frontend/Skills.vue';
import Portfolio from '@/Components/Frontend/Portfolio.vue';
import Services from '@/Components/Frontend/Services.vue';

defineProps({
    skills: Object,
    projects: Object,
    abouts: Object,
    heros: Object,
    services: Object,
});
</script>

<template>
    <Head title="Welcome" />
    <FrontendLayout>
        <!-- Hero Primary -->
        <Hero :heros="heros" />
        <!-- Promote tail-100 -->
        <Promote />
        <!-- About secondary -->
        <About :abouts="abouts" />
        <!-- Skills tail-100 -->
        <Skills :skills="skills" />
        <!-- Portfolio Primary  -->
        <Portfolio :skills="skills" :projects="projects" />
        <!-- Services secondary -->
        <Services :services="services"/>
        <!-- Contact primary  -->
    </FrontendLayout>

    <!-- <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-sm text-gray-700 dark:text-gray-500 underline"
                >Dashboard</Link
            >

            <template v-else>
                <Link :href="route('login')" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"
                    >Register</Link
                >
            </template>
        </div> -->
</template>
