<template>
    <Head title="Edit Hero" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Hero</h2>
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
                        <img v-if="imagePreview" :src="imagePreview" class="h-200 w-200"/>
                        <img v-else="'/'+form.image" v-bind:src="'/'+form.image" />
                        <TextInput id="image" type="file" ref="fileInput" @change="onFileChange" class="mt-1 block w-full" @input="form.image = $event.target.files[0]" />
                        <InputError class="mt-2" :message="form.errors.image" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Update</PrimaryButton>
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
        hero: Object,
    })
    const form = useForm({
        title: props.hero?.title,
        image: props.hero?.image,
        description: props.hero?.description,
    });
    const submit = () => {
        Inertia.post(`/heros/${props.hero.id}`, {
            _method: 'PUT',
            title: form.title,
            image: form.image,
            description: form.description,
        });
    };
</script>

<script>
export default {
  data() {
    return {
      imagePreview: ''
    }
  },
  methods: {
    onFileChange(e) {
      let file = e.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(file);
      reader.onload = (e) => {
        this.imagePreview = e.target.result;
        this.uploadImage(file);
      }
    },
    async uploadImage(file) {
      let formData = new FormData();
      formData.append('file', file);
      try {
        let response = await axios.post('/upload', formData);
        console.log(response);
      } catch (e) {
        console.log(e);
      }
    }
  }
}
</script>