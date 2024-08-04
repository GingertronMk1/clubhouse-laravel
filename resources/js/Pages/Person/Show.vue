<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    person: {
        required: true,
        type: Object,
    },
});
</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2 v-text="person.name" />
        </template>
    </AppLayout>
</template>

<style scoped></style>
