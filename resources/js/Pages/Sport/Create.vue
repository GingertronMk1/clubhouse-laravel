<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import SportForm from "@/Components/Forms/SportForm.vue";
</script>

<template>
    <AppLayout>
        <template #header>
            <h2>Create new Sport</h2>
        </template>

        <SportForm
            :submit-fn="(form) => form.post(route('sport.store'))"
            :model="{ name: '', description: '', colour: '#FFFFFF' }"
        />
    </AppLayout>
</template>
