<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import PositionForm from "@/Components/Forms/PositionForm.vue";
defineProps({
    sport: {
        required: true,
        type: Object,
    },
});

const submitForm = (argForm) =>
    argForm
        .transform((data) => ({ ...data, sport_id: data.sport.id }))
        .post(route("sport.position.store", { sport: argForm.sport.id }));
</script>

<template>
    <AppLayout>
        <template #header> Add Position to {{ sport.name }} </template>
        <PositionForm
            :submit-fn="submitForm"
            :model="{
                name: '',
                description: '',
                sort_order: 0,
                preview_position_x: 50,
                preview_position_y: 50,
                sport: sport,
            }"
            :sport="sport"
        />
    </AppLayout>
</template>
