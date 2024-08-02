<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import PositionsOnField from "@/Components/PositionsOnField.vue";

defineProps({
    sport: {
        required: true,
        type: Object,
    },
});
</script>

<template>
    <AppLayout>
        <template #header>
            Positions for <span v-text="sport.name" />
        </template>

        <PositionsOnField :positions="sport.positions" :show-name="true" />

        <Link
            :href="route('sport.position.create', { sport: sport.id })"
            class="btn btn-primary mt-3"
        >
            Add
        </Link>
        <div class="grid mt-3">
            <div class="g-col-2" v-text="'Name'" />
            <div class="g-col-6" v-text="'Description'" />
            <div class="g-col-1" v-text="'Default Number'" />
            <div class="g-col-1" v-text="'Sort Order'" />
            <div class="g-col"></div>
            <template v-for="position in sport.positions" :key="position.id">
                <div class="g-col-2" v-text="position.name" />
                <div class="g-col-6" v-text="position.description" />
                <div class="g-col-1" v-text="position.default_number" />
                <div class="g-col-1" v-text="position.sort_order" />
                <div class="g-col">
                    <Link
                        :href="
                            route('sport.position.edit', {
                                position: position.id,
                                sport: sport.id,
                            })
                        "
                        class="btn btn-outline-primary"
                    >
                        Edit
                    </Link>
                </div>
            </template>
        </div>
    </AppLayout>
</template>
