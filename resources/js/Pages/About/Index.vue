<template>
    <Head title="About" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">About</h2>
        </template>

        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link :href="route('abouts.create')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md">New About</Link>
                </div>

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">ID</th>
                                <th scope="col" class="py-3 px-6">Title</th>
                                <th scope="col" class="py-3 px-6">Description</th>
                                <th scope="col" class="py-3 px-6">Image</th>
                                <th scope="col" class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(about, index) in abouts.data" :key="abouts.id" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ index + 1 }}</th>
                                <td class="py-4 px-6">{{ about.title }}</td>
                                <td class="py-4 px-6">{{ about.description }}</td>
                                <td class="py-4 px-6"><img :src="about.image" class="w-10 h-10" /></td>
                                <td class="py-4 px-6">
                                    <Link :href="route('abouts.edit', about.id)" class="font-medium text-blue-500 dark:text-blue-500 hover:text-blue-700 mr-2">Edit</Link>
                                    <Link :href="route('abouts.destroy', about.id)" method="delete" as="button" type="button" class="font-medium text-blue-500 dark:text-red-500 hover:text-red-700">Delete</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, Link } from '@inertiajs/inertia-vue3';
    defineProps({
        abouts: Object,
    });
</script>