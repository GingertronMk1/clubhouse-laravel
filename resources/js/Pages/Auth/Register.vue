<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "@/Components/Input.vue";

const form = useForm({
    email: "",
    name: "",
    password: "",
    password_confirmation: "",
    terms: false,
});
const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};

const openInNewTab = (url) => window.open(url, "_blank").focus();
</script>

<template>
    <Head title="Register" />

    <AppLayout>
        <form class="my-3" @submit.prevent="submit">
            <Input v-model="form.name" label="Name" required autofocus />

            <Input
                v-model="form.email"
                type="email"
                required
                autocomplete="username"
                label="Email"
            />
            <Input
                v-model="form.password"
                label="Password"
                type="password"
                required
                autocomplete="new-password"
            />

            <Input
                v-model="form.password_confirmation"
                label="Confirm Password"
                type="password"
                required
                autocomplete="new-password"
            />

            <div
                v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
                class="mt-4"
            >
                <Input v-model="form.terms" type="checkbox">
                    I agree to the
                    <a
                        :href="route('terms.show')"
                        target="_blank"
                        @click.prevent="openInNewTab(route('terms.show'))"
                    >
                        Terms of Service
                    </a>
                    and
                    <a
                        :href="route('policy.show')"
                        target="_blank"
                        @click.prevent="openInNewTab(route('policy.show'))"
                    >
                        Privacy Policy
                    </a>
                    .
                </Input>
            </div>

            <Link :href="route('login')" class="btn btn-outline-info me-3">
                Already registered?
            </Link>

            <button
                class="btn btn-primary"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Register
            </button>
        </form>
    </AppLayout>
</template>
