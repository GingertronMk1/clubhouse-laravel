<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "@/Components/Input.vue";
import { ref } from "vue";

const form = useForm({
    password: "",
});
const passwordInput = ref(null);
const submit = () => {
    form.post(route("password.confirm"), {
        onFinish: () => {
            form.reset();

            passwordInput.value.focus();
        },
    });
};
</script>

<template>
    <Head title="Secure Area" />

    <AppLayout>
        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your
            password before continuing.
        </div>

        <form @submit.prevent="submit">
            <Input
                v-model="form.password"
                type="password"
                label="Password"
                required
                autocomplete="current-password"
                autofocus
            />
            <div class="flex justify-end mt-4">
                <button
                    class="btn btn-primary"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Confirm
                </button>
            </div>
        </form>
    </AppLayout>
</template>
