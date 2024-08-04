<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    teams: {
        default: () => [],
        type: Array,
    },
});

const personOrPeople = ({ people }) =>
    people.length === 1 ? "person" : "people";
</script>

<template>
    <AppLayout>
        <template #header>
            <h2>Teams</h2>
        </template>

        <Link :href="route('team.create')" class="btn btn-primary mb-3">
            Add <i class="fa-solid fa-plus" />
        </Link>
        <div v-for="team in teams" :key="team.id" class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <span v-text="team.name" />
                <span
                    v-text="
                        `${team.sport.name}, ${team.people.length} ${personOrPeople(team)}`
                    "
                />
            </div>
            <div
                v-if="team.description"
                class="card-body preserve-newlines"
                v-text="team.description"
            />
            <div
                v-if="team.address"
                class="card-body preserve-newlines"
                v-text="team.address"
            />
            <div class="card-footer">
                <Link
                    :href="route('team.edit', { team: team.id })"
                    class="btn btn-primary"
                >
                    Edit
                    <i class="fa-solid fa-pen-to-square" />
                </Link>
            </div>
        </div>
    </AppLayout>
</template>
