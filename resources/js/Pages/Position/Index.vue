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
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Default Number</th>
                    <th>Sort Order</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="position in sport.positions" :key="position.id">
                    <td style="width: 10%" v-text="position.name" />
                    <td style="width: 55%" v-text="position.description" />
                    <td style="width: 12.5%" v-text="position.default_number" />
                    <td style="width: 12.5%" v-text="position.sort_order" />
                    <td style="width: 10%">
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
                    </td>
                </tr>
            </tbody>
        </table>
    </AppLayout>
</template>
