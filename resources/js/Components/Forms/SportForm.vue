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
        <Input v-model="form.name" :error="form.errors.name" label="Name" />
        <Input
            v-model="form.description"
            :error="form.errors.description"
            type="textarea"
            label="Description"
        />
        <Input
            v-model="form.colour"
            :error="form.errors.colour"
            type="color"
            label="Colour"
        />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
