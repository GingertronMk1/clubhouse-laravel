<script setup>
import Input from "@/Components/Input.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    model: {
        required: true,
        type: Object,
    },
    submitFn: {
        required: true,
        type: Function,
    },
});

const form = useForm(props.model);
</script>

<template>
    <form @submit.prevent="submitFn(form)">
        <Input v-model="form.name" type="text" label="Name" required />
        <Input v-model="form.description" type="textarea" label="Description" />
        <Input v-model="form.address" type="textarea" label="Address" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<style scoped></style>
