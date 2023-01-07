<template>
    <Head title="Edit Service" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Service</h2>
        </template>

        <div class="py-12">
            <div class="max-w-2xl max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
                <form class="p-4" @submit.prevent="submit">
                    <div>
                        <InputLabel for="title" value="Title" />
                        <TextInput id="title" type="text" class="mt-1 block w-full" v-model="form.title" required autofocus />
                        <InputError class="mt-2" :message="form.errors.title" />
                    </div>
                    <div>
                        <InputLabel for="description" value="Description" />
                        <textarea class="mt-1 block w-full rounded" v-model="form.description" required autofocus></textarea>
                        <InputError class="mt-2" :message="form.errors.description" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="image" value="Image" />
                        <TextInput id="image" type="file" class="mt-1 block w-full" @input="form.image = $event.target.files[0]" />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="" value="Image" />
                        <img :src="'/'+form.image" class="w-32 h-32" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Save</PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { Head, useForm } from '@inertiajs/inertia-vue3';
    import InputError from '@/Components/InputError.vue';
    import InputLabel from '@/Components/InputLabel.vue';
    import PrimaryButton from '@/Components/PrimaryButton.vue';
    import TextInput from '@/Components/TextInput.vue';
    import { Inertia } from '@inertiajs/inertia';
    const props = defineProps({
        service: Object,
    })
    const form = useForm({
        title: props.service?.title,
        image: props.service?.image,
        description: props.service?.description,
    });
    const submit = () => {
        Inertia.post(`/services/${props.service.id}`, {
            _method: 'PUT',
            title: form.title,
            image: form.image,
            description: form.description,
        });
    };
</script>