<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

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
        <div v-for="team in teams" :key="team.id" class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <span v-text="team.name" />
                <span
                    v-text="`${team.people.length} ${personOrPeople(team)}`"
                />
            </div>
            <div class="card-body">
                <p
                    v-for="paragraph in team.description.split('\n')"
                    :key="paragraph"
                    v-text="paragraph"
                />
            </div>
            <div v-if="team.address" class="card-body" v-text="team.address" />
        </div>
    </AppLayout>
</template>
