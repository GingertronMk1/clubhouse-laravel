<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    person: {
        required: true,
        type: Object,
    }
});

const submit = () => form.put(route("person.update", {person: form.id}));
</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2 v-text="person.name" />
        </template>
    </AppLayout>
</template>

<style scoped></style>
