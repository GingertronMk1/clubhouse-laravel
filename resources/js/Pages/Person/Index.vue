<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps({
    people: Array
});

</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2>People</h2>
        </template>
    <div class="container">
        <a :href="route('person.create')" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i>
            Add
        </a>

        <table class="table">
            <tr v-for="person in people" :key="person.id">
                <td v-text="person.name" />
                <td v-text="person.bio" />
                <td v-text="person.user?.name" />
                <td v-text="person.age" />
            </tr>
        </table>
    </div>
    </AppLayout>
</template>

<style scoped>

</style>
