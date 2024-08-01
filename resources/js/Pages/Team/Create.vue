<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TeamForm from "@/Components/Forms/TeamForm.vue";

defineProps({
    sports: {
        required: true,
        type: Array,
    },
});

const team = {
    address: "",
    description: "",
    name: "",
};

const submitForm = (argForm) => argForm.post(route("team.store"));
</script>

<template>
    <AppLayout>
        <template #header>
            <h2>Create Team</h2>
        </template>
        <TeamForm :submit-fn="submitForm" :model="team" :sports="sports" />
    </AppLayout>
</template>
