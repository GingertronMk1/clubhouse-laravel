<script setup>
import Input from "@/Components/Input.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    model: {
        required: true,
        type: Object,
    },
    sports: {
        required: true,
        type: Array
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
        <Input v-model="form.name" :error=form.errors.name" label="Name" required type="text" />
        <Input v-model="form.description" :error=form.errors.description" label="Description" type="textarea" />
        <Input v-model="form.address" :error=form.errors.address" label="Address" type="textarea" />
        <Input v-model="form.sport_id" :error=form.errors.sport_id" label="Sport" type="select" :options="sports" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<style scoped></style>
