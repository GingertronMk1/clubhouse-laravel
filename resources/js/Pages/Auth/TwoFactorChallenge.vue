<script setup>
import { Head, useForm } from "@inertiajs/vue3";
import { nextTick, ref } from "vue";
import AuthenticationCard from "@/Components/BuiltIn/AuthenticationCard.vue";
import AuthenticationCardLogo from "@/Components/BuiltIn/AuthenticationCardLogo.vue";
import Input from "@/Components/Input.vue";

const recovery = ref(false);
const form = useForm({
    code: "",
    recovery_code: "",
});
const recoveryCodeInput = ref(null);
const codeInput = ref(null);
const toggleRecovery = async () => {
    recovery.value = !recovery.value;

    await nextTick();

    if (recovery.value) {
        recoveryCodeInput.value.focus();
        form.code = "";
    } else {
        codeInput.value.focus();
        form.recovery_code = "";
    }
};
const submit = () => {
    form.post(route("two-factor.login"));
};
</script>

<template>
    <Head title="Two-factor Confirmation" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="mb-4 text-sm text-gray-600">
            <template v-if="!recovery">
                Please confirm access to your account by entering the
                authentication code provided by your authenticator application.
            </template>
            <template v-else>
                Please confirm access to your account by entering one of your
                emergency recovery codes.
            </template>
        </div>

        <form @submit.prevent="submit">
            <Input
                v-if="!recovery"
                v-model="form.code"
                label="Code"
                autofocus
                autocomplete="one-time-code"
            />
            <Input
                v-else
                v-model="form.recovery_code"
                autocomplete="one-time-code"
                label="Recovery Code"
            />

            <div class="flex items-center justify-end mt-4">
                <button
                    class="btn btn-outline-primary"
                    @click.prevent="toggleRecovery"
                >
                    <template v-if="!recovery"> Use a recovery code </template>

                    <template v-else> Use an authentication code </template>
                </button>

                <button
                    class="btn btn-primary"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </button>
            </div>
        </form>
    </AuthenticationCard>
</template>
