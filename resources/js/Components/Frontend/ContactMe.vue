<script setup>
    import { ref } from 'vue';
    import { useForm } from '@inertiajs/inertia-vue3';

    const showMessage = ref(false);

    const form = useForm({
        name: '',
        email: '',
        body: '',
    });

    function setShowMessage(value) {
        showMessage.value = value;
    }

    function cleanForm() {
        form.reset();
        setShowMessage(true)
        setTimeout(() => {
            setShowMessage(false)
        }, 5000);
    }

    const submit = () => {
        form.post(route('contact'), {
            preserveScroll: true,
            onSuccess: () => cleanForm(),
        });
    };
</script>

<template>
    <section id="contact" class="section bg-gray-50 dark:bg-slate-800 mb-2">
        <div class="container mx-auto" 
        v-motion 
        :initial="{ opacity: 0, y: 100 }"
        :visible="{ opacity: 1, y: 0, }"
        >
            <div class="flex flex-col items-center text-center">
                <h2 class="text-4xl font-bold text-gray-800 dark:text-gray-100">Contact Me</h2>
                <p class="mt-2 text-xl text-gray-600 dark:text-gray-400">I'm currently looking for new opportunities, my inbox is always open. Whether you have a question or just want to say hi, I'll try my best to get back to you!</p>
            </div>
            <div class="flex flex-col lg:flex-row lg:gap-x-8 mt-20">
                <div class="flex flex-1 flex-col items-center space-y-8 mb-12 lg:mb-0 lg:pt-2">
                    <div class="flex flex-col lg:flex-row gap-x-4">
                        <div class="text-amber-600 rounded-sm w-14 h-14 flex items-center justify-center mt-2 mb-4 lg:mb-0 text-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
</svg>
                        </div>
                        <div>
                            <h4 class="font-body text-xl mb-1">Have a Question?</h4>
                            <p class="mb-1 text-slate-600">I am here to help you...</p>
                            <p class="text-amber-600 font-normal">Email me at azizulhaque4198@gmail.com</p>
                        </div>
                    </div>
                </div>
                <form action="" @submit.prevent="submit" class="space-y-8 w-full max-w-md">
                    <div v-if="showMessage" class="m-2 p-4 bg-teal-700 dark:bg-slate-400 text-amber-200 rounded-lg">
                        Thank you for contacting me. I will get back to you as soon as possible.
                    </div>
                    <div class="flex gap-8">
                        <div>
                            <input v-model="form.name" type="text" class="input" placeholder="Your Name" />
                            <span v-if="form.errors.name" class="text-sm m-2 text-red-400">{{ form.errors.body }}</span>
                        </div>
                        <div>
                            <input v-model="form.email" type="email" class="input" placeholder="Your Email" />
                            <span v-if="form.errors.email" class="text-sm m-2 text-red-400">{{ form.errors.email }}</span>
                        </div>
                    </div>
                    <textarea v-model="form.body" class="textarea" name="" id="" cols="30" rows="4" placeholder="Your Message" spellcheck="false"></textarea>
                    <span v-if="form.errors.body" class="text-sm m-2 text-red-400">{{ form.errors.body }}</span>
                    <button class="btn btn-lg bg-amber-600 hover:bg-orange-400 text-white">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</template>