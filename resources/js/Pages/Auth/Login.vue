<script setup lang="ts">
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "@/Components/Input.vue";
import InputError from "@/Components/BuiltIn/InputError.vue";

defineProps({
    canResetPassword: Boolean,
    status: {
        default: null,
        type: [String, null],
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});
const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AppLayout>
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form class="my-3" @submit.prevent="submit">
            <div>
                <Input
                    v-model="form.email"
                    label="Email"
                    required
                    autofocus
                    autocomplete="username"
                />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <Input
                    v-model="form.password"
                    label="Password"
                    type="password"
                    required
                    autocomplete="current-password"
                />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <Input
                    v-model="form.remember"
                    type="checkbox"
                    label="Remember me"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Forgot your password?
                </Link>

                <button
                    class="btn btn-primary"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log In
                </button>
            </div>
        </form>
    </AppLayout>
</template>
