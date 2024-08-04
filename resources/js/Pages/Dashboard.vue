<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    matchCount: {
        default: 0,
        type: Number,
    },
    peopleCount: {
        default: 0,
        type: Number,
    },
    sportCount: {
        default: 0,
        type: Number,
    },
    teamCount: {
        default: 0,
        type: Number,
    },
});

const counts = [
    {
        count: props.peopleCount,
        href: route("person.index"),
        text: "People",
    },
    {
        count: props.sportCount,
        href: route("sport.index"),
        text: "Sports",
    },
    {
        count: props.matchCount,
        text: "Matches",
    },
    {
        count: props.teamCount,
        href: route("team.index"),
        text: "Teams",
    },
];
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="my-3 grid text-center" style="--bs-gap: 1rem">
            <Link
                v-for="count in counts"
                :key="JSON.stringify(count)"
                class="card g-col-6 p-4"
                style="min-height: 3rem"
                :href="count.href ?? '#'"
            >
                <h3 v-text="count.count" />
                <span v-text="count.text" />
            </Link>
        </div>
    </AppLayout>
</template>
