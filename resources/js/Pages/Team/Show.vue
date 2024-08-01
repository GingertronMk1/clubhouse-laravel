<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    team: {
        required: true,
        type: Object,
    },
});
</script>

<template>
    <AppLayout>
        <template #header>
            <h2 v-text="team.name" />
        </template>
    </AppLayout>
</template>
