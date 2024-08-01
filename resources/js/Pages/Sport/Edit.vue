<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import SportForm from "@/Components/Forms/SportForm.vue";
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
            <h2 v-text="`Update ${sport.name}`" />
        </template>

        <SportForm
            :submit-fn="
                (form) => form.put(route('sport.update', { sport: form.id }))
            "
            :model="sport"
        />
    </AppLayout>
</template>
