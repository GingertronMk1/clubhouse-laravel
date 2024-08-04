<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import PositionsOnField from "@/Components/PositionsOnField.vue";

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
            Add <i class="fa-solid fa-plus" />
        </Link>

        <div v-for="sport in sports" :key="sport.id" class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <span v-text="sport.name" />
                <i
                    class="fa-solid fa-circle"
                    :style="{ color: sport.colour }"
                />
            </div>
            <div class="d-flex flex-row">
                <span
                    class="card-body preserve-newlines"
                    v-text="sport.description"
                />
                <PositionsOnField :positions="sport.positions" />
            </div>

            <div class="card-footer">
                <Link
                    :href="route('sport.edit', { sport: sport.id })"
                    class="btn btn-primary"
                >
                    Edit
                    <i class="fa-solid fa-pen-to-square" />
                </Link>
                <Link
                    :href="route('sport.position.index', { sport: sport.id })"
                    class="btn btn-primary ms-3"
                >
                    View Positions
                </Link>
                <Link
                    :href="route('sport.position.create', { sport: sport.id })"
                    class="btn btn-primary ms-3"
                >
                    Add Position
                </Link>
            </div>
        </div>
    </AppLayout>
</template>
