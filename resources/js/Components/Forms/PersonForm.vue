<script setup lang="ts">
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
    users: {
        required: true,
        type: Array,
    },
});

const form = useForm(props.model);
</script>

<template>
    <form class="card mt-3" @submit.prevent="submitFn(form)">
        <div class="card-body">
            <Input
                v-model="form.name"
                :error="form.errors.name"
                type="text"
                label="Name"
            />
            <Input
                v-model="form.bio"
                :error="form.errors.bio"
                type="textarea"
                label="Bio"
            />
            <Input
                v-model="form.dob"
                :error="form.errors.dob"
                type="date"
                label="Date of Birth"
            />
            <Input
                v-model="form.user_id"
                :error="form.errors.user_id"
                type="select"
                :options="users"
                label="User"
            />
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</template>

<style scoped></style>
