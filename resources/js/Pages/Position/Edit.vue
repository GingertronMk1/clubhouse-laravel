<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PositionForm from "@/Components/Forms/PositionForm.vue";

defineProps({
    position: {
        required: true,
        type: Object,
    },
    sport: {
        required: true,
        type: Object,
    },
});

const submitForm = (argForm) =>
    argForm
        .transform((data) => ({ ...data, sport_id: data.sport.id }))
        .put(
            route("sport.position.update", {
                position: argForm.id,
                sport: argForm.sport.id,
            }),
        );
</script>

<template>
    <AppLayout>
        <template #header>
            Edit Position {{ position.name }} of {{ sport.name }}
        </template>

        <PositionForm
            :submit-fn="submitForm"
            :model="position"
            :sport="sport"
        />
    </AppLayout>
</template>
