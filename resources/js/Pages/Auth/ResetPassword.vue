<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "@/Components/Input.vue";

const props = defineProps({
    email: {
        required: true,
        type: String,
    },
    token: {
        required: true,
        type: String,
    },
});
const form = useForm({
    email: props.email,
    password: "",
    password_confirmation: "",
    token: props.token,
});
const submit = () => {
    form.post(route("password.update"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Reset Password" />

    <AppLayout>
        <form @submit.prevent="submit">
            <Input v-model="form.email" label="Email" type="email" />

            <Input v-model="form.password" label="Password" type="password" />

            <Input
                v-model="form.password_confirmation"
                label="Confirm Password"
                type="password"
            />
            <div class="flex items-center justify-end mt-4">
                <button
                    class="btn btn-primary"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Reset Password
                </button>
            </div>
        </form>
    </AppLayout>
</template>
