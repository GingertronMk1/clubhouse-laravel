<script setup>
import Input from "@/Components/Input.vue";
import { ref } from "vue";

const props = defineProps({
    form: {
        required: true,
        type: Object,
    },
    submitFn: {
        required: true,
        type: Function,
    },
});

const proxyForm = ref(props.form);
</script>

<template>
    <form @submit.prevent="submitFn(proxyForm)">
        <Input v-model="proxyForm.name" type="text" label="Name" required />
        <Input
            v-model="proxyForm.description"
            type="textarea"
            label="Description"
        />
        <Input v-model="proxyForm.address" type="textarea" label="Address" />
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>

<style scoped></style>
