<script setup>
import { Head } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        required: true,
        type: String,
    },
    phpVersion: {
        required: true,
        type: String,
    },
});
</script>

<template>
    <Head title="Welcome" />
</template>
