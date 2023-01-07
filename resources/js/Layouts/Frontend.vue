<script setup>
import Header from '@/components/Frontend/Header.vue';
import Footer from '@/components/Frontend/Footer.vue';
</script>

<template>
    <div class="bg-slate-200 dark:bg-slate-900">
        <!-- Header -->
        <Header />
        <main class="min-h-screen">
            <slot />
        </main>
        <!-- Footer -->
        <Footer />
    </div>
</template>