<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import PersonForm from "@/Components/Forms/PersonForm.vue";

defineProps({
    users: {
        default: () => [],
        type: Array,
    },
});

const model = {
    bio: "",
    dob: "",
    name: "",
    user_id: "",
};
</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2>Create new Person</h2>
        </template>
        <PersonForm
            :users="users"
            :submit-fn="(form) => form.post(route('person.store'))"
            :model="model"
        />
    </AppLayout>
</template>

<style scoped></style>
