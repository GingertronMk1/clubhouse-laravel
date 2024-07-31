<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import TeamForm from "@/Components/Forms/TeamForm.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    team: {
        required: true,
        type: Object,
    },
});

const form = useForm(props.team);

const submitForm = (argForm) =>
    argForm.put(route("team.update", { team: argForm.id }));
</script>

<template>
    <AppLayout>
        <TeamForm :form="form" :submit-fn="submitForm" />
    </AppLayout>
</template>
