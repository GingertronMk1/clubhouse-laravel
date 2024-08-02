<script setup>
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>