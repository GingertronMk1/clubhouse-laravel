<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TeamForm from "@/Components/Forms/TeamForm.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    address: "",
    description: "",
    name: "",
});

const submitForm = (argForm) => argForm.post(route("team.store"));
</script>

<template>
    <AppLayout>
        <TeamForm :submit-fn="submitForm" :form="form" />
    </AppLayout>
</template>
