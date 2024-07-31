<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TeamForm from "@/Components/Forms/TeamForm.vue";

defineProps({
    team: {
        required: true,
        type: Object,
    },
});

const submitForm = (argForm) =>
    argForm.put(route("team.update", { team: argForm.id }));
</script>

<template>
    <AppLayout>
        <template #header>
            <h2>Edit {{ team.name }}</h2>
        </template>
        <TeamForm :model="team" :submit-fn="submitForm" />
    </AppLayout>
</template>
