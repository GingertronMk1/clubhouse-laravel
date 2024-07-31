<script setup>
/* eslint vue/no-v-html: 0 */
import { computed, ref, watch } from "vue";
import { router, useForm, usePage } from "@inertiajs/vue3";
import ActionSection from "@/Components/BuiltIn/ActionSection.vue";
import ConfirmsPassword from "@/Components/BuiltIn/ConfirmsPassword.vue";
import Input from "@/Components/Input.vue";

const props = defineProps({
    requiresConfirmation: Boolean,
});
const page = usePage();
const enabling = ref(false);
const confirming = ref(false);
const disabling = ref(false);
const qrCode = ref(null);
const setupKey = ref(null);
const recoveryCodes = ref([]);
const confirmationForm = useForm({
    code: "",
});
const twoFactorEnabled = computed(
    () => !enabling.value && page.props.auth.user?.two_factor_enabled,
);

watch(twoFactorEnabled, () => {
    if (!twoFactorEnabled.value) {
        confirmationForm.reset();
        confirmationForm.clearErrors();
    }
});

const showQrCode = () => {
    return axios.get(route("two-factor.qr-code")).then((response) => {
        qrCode.value = response.data.svg;
    });
};
const showSetupKey = () => {
    return axios.get(route("two-factor.secret-key")).then((response) => {
        setupKey.value = response.data.secretKey;
    });
};
const showRecoveryCodes = () => {
    return axios.get(route("two-factor.recovery-codes")).then((response) => {
        recoveryCodes.value = response.data;
    });
};

const enableTwoFactorAuthentication = () => {
    enabling.value = true;

    router.post(
        route("two-factor.enable"),
        {},
        {
            onFinish: () => {
                enabling.value = false;
                confirming.value = props.requiresConfirmation;
            },
            onSuccess: () =>
                Promise.all([
                    showQrCode(),
                    showSetupKey(),
                    showRecoveryCodes(),
                ]),
            preserveScroll: true,
        },
    );
};
const confirmTwoFactorAuthentication = () => {
    confirmationForm.post(route("two-factor.confirm"), {
        errorBag: "confirmTwoFactorAuthentication",
        onSuccess: () => {
            confirming.value = false;
            qrCode.value = null;
            setupKey.value = null;
        },
        preserveScroll: true,
        preserveState: true,
    });
};
const regenerateRecoveryCodes = () => {
    axios
        .post(route("two-factor.recovery-codes"))
        .then(() => showRecoveryCodes());
};
const disableTwoFactorAuthentication = () => {
    disabling.value = true;

    router.delete(route("two-factor.disable"), {
        onSuccess: () => {
            disabling.value = false;
            confirming.value = false;
        },
        preserveScroll: true,
    });
};
</script>

<template>
    <ActionSection>
        <template #title> Two Factor Authentication </template>

        <template #description>
            Add additional security to your account using two factor
            authentication.
        </template>

        <template #content>
            <h3
                v-if="twoFactorEnabled && !confirming"
                class="text-lg font-medium text-gray-900"
            >
                You have enabled two factor authentication.
            </h3>

            <h3
                v-else-if="twoFactorEnabled && confirming"
                class="text-lg font-medium text-gray-900"
            >
                Finish enabling two factor authentication.
            </h3>

            <h3 v-else class="text-lg font-medium text-gray-900">
                You have not enabled two factor authentication.
            </h3>

            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>
                    When two factor authentication is enabled, you will be
                    prompted for a secure, random token during authentication.
                    You may retrieve this token from your phone's Google
                    Authenticator application.
                </p>
            </div>

            <div v-if="twoFactorEnabled">
                <div v-if="qrCode">
                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                        <p v-if="confirming" class="font-semibold">
                            To finish enabling two factor authentication, scan
                            the following QR code using your phone's
                            authenticator application or enter the setup key and
                            provide the generated OTP code.
                        </p>

                        <p v-else>
                            Two factor authentication is now enabled. Scan the
                            following QR code using your phone's authenticator
                            application or enter the setup key.
                        </p>
                    </div>

                    <div
                        class="mt-4 p-2 inline-block bg-white"
                        v-html="qrCode"
                    />

                    <div
                        v-if="setupKey"
                        class="mt-4 max-w-xl text-sm text-gray-600"
                    >
                        <p class="font-semibold">
                            Setup Key: <span v-html="setupKey"></span>
                        </p>
                    </div>

                    <Input
                        v-if="confirming"
                        v-model="confirmationForm.code"
                        inputmode="numeric"
                        autofocus
                        autocomplete="one-time-code"
                        @keyup.enter="confirmTwoFactorAuthentication"
                    />
                </div>

                <div v-if="recoveryCodes.length > 0 && !confirming">
                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                        <p class="font-semibold">
                            Store these recovery codes in a secure password
                            manager. They can be used to recover access to your
                            account if your two factor authentication device is
                            lost.
                        </p>
                    </div>

                    <div
                        class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg"
                    >
                        <div v-for="code in recoveryCodes" :key="code">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div v-if="!twoFactorEnabled">
                    <ConfirmsPassword
                        @confirmed="enableTwoFactorAuthentication"
                    >
                        <button
                            class="btn btn-primary"
                            :class="{ 'opacity-25': enabling }"
                            :disabled="enabling"
                        >
                            Enable
                        </button>
                    </ConfirmsPassword>
                </div>

                <div v-else>
                    <ConfirmsPassword
                        @confirmed="confirmTwoFactorAuthentication"
                    >
                        <button
                            v-if="confirming"
                            type="button"
                            class="btn btn-primary"
                            :class="{ 'opacity-25': enabling }"
                            :disabled="enabling"
                        >
                            Confirm
                        </button>
                    </ConfirmsPassword>

                    <ConfirmsPassword @confirmed="regenerateRecoveryCodes">
                        <button
                            v-if="recoveryCodes.length > 0 && !confirming"
                            class="btn btn-secondary"
                        >
                            Regenerate Recovery Codes
                        </button>
                    </ConfirmsPassword>

                    <ConfirmsPassword @confirmed="showRecoveryCodes">
                        <button
                            v-if="recoveryCodes.length === 0 && !confirming"
                            class="btn btn-secondary"
                        >
                            Show Recovery Codes
                        </button>
                    </ConfirmsPassword>

                    <ConfirmsPassword
                        @confirmed="disableTwoFactorAuthentication"
                    >
                        <button
                            v-if="confirming"
                            class="btn btn-secondary"
                            :class="{ 'opacity-25': disabling }"
                            :disabled="disabling"
                        >
                            Cancel
                        </button>
                    </ConfirmsPassword>

                    <ConfirmsPassword
                        @confirmed="disableTwoFactorAuthentication"
                    >
                        <button
                            v-if="!confirming"
                            class="btn btn-danger"
                            :class="{ 'opacity-25': disabling }"
                            :disabled="disabling"
                        >
                            Disable
                        </button>
                    </ConfirmsPassword>
                </div>
            </div>
        </template>
    </ActionSection>
</template>
