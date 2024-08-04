<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import PersonForm from "@/Components/Forms/PersonForm.vue";

defineProps({
    person: {
        required: true,
        type: Object,
    },
    users: {
        default: () => [],
        type: Array,
    },
});
</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2 v-text="`Update ${person.name}`" />
        </template>
        <PersonForm
            :users="users"
            :submit-fn="
                (form) => form.put(route('person.update', { person: form.id }))
            "
            :model="person"
        />
    </AppLayout>
</template>

<style scoped></style>
