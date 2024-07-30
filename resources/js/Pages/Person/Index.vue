<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    people: {
        default: () => [],
        type: Array,
    },
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
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Bio</th>
                        <th>User Name</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tr v-for="person in people" :key="person.id">
                    <td v-text="person.name" />
                    <td v-text="person.bio" />
                    <td v-text="person.user?.name" />
                    <td v-text="person.age" />
                    <td>
                        <Link
                            class="btn btn-primary"
                            :href="route('person.edit', { person: person.id })"
                        >
                            Edit
                        </Link >
                    </td>
                </tr>
            </table>
        </div>
    </AppLayout>
</template>

<style scoped></style>
