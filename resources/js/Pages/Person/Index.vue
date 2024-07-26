<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

const props = defineProps(['people']);

</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2>People</h2>
        </template>
    <div class="container">
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
