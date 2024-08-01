<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    sports: {
        required: true,
        type: Array,
    },
});
</script>

<template>
    <AppLayout>
        <Link :href="route('sport.create')" class="btn btn-primary mb-3">
            Add <i class="fa-solid fa-plus"></i>
        </Link>

        <div v-for="sport in sports" :key="sport.id" class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <span v-text="sport.name" />
                <i
                    class="fa-solid fa-circle"
                    :style="{ color: sport.colour }"
                />
            </div>
            <div
                class="card-body preserve-newlines"
                v-text="sport.description"
            />

            <div class="card-footer">
                <Link
                    :href="route('sport.edit', { sport: sport.id })"
                    class="btn btn-primary"
                >
                    Edit
                    <i class="fa-solid fa-pen-to-square" />
                </Link>
            </div>
        </div>
    </AppLayout>
</template>
