<script setup lang="ts">
import { Head, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "@/Components/Input.vue";

defineProps({
    status: {
        default: "",
        type: String,
    },
});

const form = useForm({
    email: "",
});
const submit = () => {
    form.post(route("password.email"));
};
</script>

<template>
    <Head title="Forgot Password" />

    <AppLayout>
        <div class="mb-4 text-sm text-gray-600">
            Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will allow
            you to choose a new one.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <Input v-model="form.email" label="Email" type="email" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button
                    class="btn btn-primary"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Email Password Reset Link
                </button>
            </div>
        </form>
    </AppLayout>
</template>
