<script setup>
    import Project from '@/Components/Frontend/Project.vue';
    import { ref } from 'vue';
    const props = defineProps({
        skills: Object,
        projects: Object,
    });
    const filteredProjects = ref(props.projects.data);
    const selectedSkill = ref('all');

    const filterProjects = (id) => {
        if (id === "all") {
            filteredProjects.value = props.projects.data;
            selectedSkill.value = id;
        }
        else {
            filteredProjects.value = props.projects.data.filter(project => {
                return project.skill.id === id;
            });
            selectedSkill.value = id;
        }
    }
</script>

<template>
    <div class="container mx-auto">
        <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="mr-2">
                <button @click="filterProjects('all')" class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg dark:bg-gray-800 dark:text-blue-500" :class="[selectedSkill == 'all' ? 'text-blue-500 dark:bg-gray-800' : ' ',]">All</button>
            </li>
            <li class="mr-2" v-for="projectSkill in skills.data" :key="projectSkill.id">
                <button @click="filterProjects(projectSkill.id)" class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300" :class="[selectedSkill == projectSkill.id ? 'text-blue-500 dark:bg-gray-800' : ' ',]">{{ projectSkill.name }}</button>
            </li>
        </ul>
        <section class="grid gap-y-12 lg:grid-cols-3 lg:gap-8 pt-24">
            <Project v-for="project in filteredProjects" :key="project.id" :project="project" />
        </section>
    </div>
</template>