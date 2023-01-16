<script setup>
    defineProps({
        heros: Object,
    })
</script>

<template>
    <section id="home" class="lg:h-[120vh] flex items-center bg-slate-100 dark:bg-black py-32 lg:py-0 overflow-hidden mb-10">
        <div class="container mx-auto h-full" v-motion 
        :initial="{ opacity: 0, y: 100 }"
        :visible="{ opacity: 1, y: 0, }">
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
                        <a href="https://github.com/devazizulhaque"><span class="text-slate-100 dark:text-white hover:text-black">Get In Touch</span></a>
                    </button>
                    <div class="pt-12">
                        <h5 class="text-lg flex justify-center lg:justify-start items-center text-black dark:text-white">
                            Flowing me with <span class="text-orange-400 ml-2">❤</span>
                        </h5>
                        <div class="flex items mb-6">
                            <a class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-gray-700 dark:text-white hover:bg-slate-200 hover:border-slate-200 dark:hover:bg-slate-700 dark:hover:border-slate-700" href="https://www.facebook.com/profile.php?id=100018665686307">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                            </a>
                            <a class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-gray-700 dark:text-white hover:bg-slate-200 hover:border-slate-200 dark:hover:bg-slate-700 dark:hover:border-slate-700" href="https://twitter.com/AzizulH38380080">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                            </a>
                            <a class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-gray-700 dark:text-white hover:bg-slate-200 hover:border-slate-200 dark:hover:bg-slate-700 dark:hover:border-slate-700" href="https://www.instagram.com/ajijul_haq_/">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                            </a>
                            <a class="w-12 h-12 rounded-full flex items-center justify-center border border-white text-gray-700 dark:text-white hover:bg-slate-200 hover:border-slate-200 dark:hover:bg-slate-700 dark:hover:border-slate-700" href="https://www.linkedin.com/in/azizul-haque-309674193/">
                                <svg width="14" height="14" viewBox="0 0 14 14" class="fill-current">
                  <path
                    d="M13.0214 0H1.02084C0.453707 0 0 0.451613 0 1.01613V12.9839C0 13.5258 0.453707 14 1.02084 14H12.976C13.5432 14 13.9969 13.5484 13.9969 12.9839V0.993548C14.0422 0.451613 13.5885 0 13.0214 0ZM4.15142 11.9H2.08705V5.23871H4.15142V11.9ZM3.10789 4.3129C2.42733 4.3129 1.90557 3.77097 1.90557 3.11613C1.90557 2.46129 2.45002 1.91935 3.10789 1.91935C3.76577 1.91935 4.31022 2.46129 4.31022 3.11613C4.31022 3.77097 3.81114 4.3129 3.10789 4.3129ZM11.9779 11.9H9.9135V8.67097C9.9135 7.90323 9.89082 6.8871 8.82461 6.8871C7.73571 6.8871 7.57691 7.74516 7.57691 8.60323V11.9H5.51254V5.23871H7.53154V6.16452H7.55423C7.84914 5.62258 8.50701 5.08065 9.52785 5.08065C11.6376 5.08065 12.0232 6.43548 12.0232 8.2871V11.9H11.9779Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-1 justify-end items-center h-full mt-8 md:mt-0">
                    <img :src="hero.image" alt="Azizul_Haque" class="rounded-lg"/>
                </div>
            </div> 
        </div>
    </section>
</template>