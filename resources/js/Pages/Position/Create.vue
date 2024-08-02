<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PositionForm from "@/Components/Forms/PositionForm.vue";
defineProps({
    sports: {
        required: true,
        type: Array,
    },
});

const submitForm = (argForm) =>
    argForm
        .transform((data) => ({ ...data, sport_id: data.sport.id }))
        .post(route("position.store"));
</script>

<template>
    <AppLayout>
        <PositionForm
            :submit-fn="submitForm"
            :sports="sports"
            :model="{
                name: '',
                description: '',
                preview_position_x: 50,
                preview_position_y: 50,
                sport: null,
            }"
        />
    </AppLayout>
</template>
