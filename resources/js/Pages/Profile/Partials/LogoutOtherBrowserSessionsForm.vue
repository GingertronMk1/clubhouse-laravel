<script setup>
import ActionMessage from "@/Components/BuiltIn/ActionMessage.vue";
import ActionSection from "@/Components/BuiltIn/ActionSection.vue";
import DialogModal from "@/Components/BuiltIn/DialogModal.vue";
import InputError from "@/Components/BuiltIn/InputError.vue";
import PrimaryButton from "@/Components/BuiltIn/PrimaryButton.vue";
import SecondaryButton from "@/Components/BuiltIn/SecondaryButton.vue";
import TextInput from "@/Components/BuiltIn/TextInput.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

defineProps({
    sessions: {
        default: () => [],
        type: Array,
    },
});

const confirmingLogout = ref(false);
const passwordInput = ref(null);
const form = useForm({
    password: "",
});

const timeout = 250;
const confirmLogout = () => {
    confirmingLogout.value = true;

    setTimeout(() => passwordInput.value.focus(), timeout);
};
const closeModal = () => {
    confirmingLogout.value = false;

    form.reset();
};
const logoutOtherBrowserSessions = () => {
    form.delete(route("other-browser-sessions.destroy"), {
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
        onSuccess: () => closeModal(),
        preserveScroll: true,
    });
};
</script>

<template>
    <ActionSection>
        <template #title> Browser Sessions </template>

        <template #description>
            Manage and log out your active sessions on other browsers and
            devices.
        </template>

        <template #content>
            <div class="max-w-xl text-sm text-gray-600">
                If necessary, you may log out of all of your other browser
                sessions across all of your devices. Some of your recent
                sessions are listed below; however, this list may not be
                exhaustive. If you feel your account has been compromised, you
                should also update your password.
            </div>

            <!-- Other Browser Sessions -->
            <div v-if="sessions.length > 0" class="mt-5 space-y-6">
                <div
                    v-for="(session, i) in sessions"
                    :key="i"
                    class="flex items-center"
                >
                    <div>
                        <i
                            class="fa-solid fa-desktop"
                            :class="{
                                'fa-desktop': session.agent.is_desktop,
                                'fa-mobile-screen-button':
                                    !session.agent.is_desktop,
                            }"
                        />
                    </div>

                    <div class="ms-3">
                        <div class="text-sm text-gray-600">
                            {{
                                session.agent.platform
                                    ? session.agent.platform
                                    : "Unknown"
                            }}
                            -
                            {{
                                session.agent.browser
                                    ? session.agent.browser
                                    : "Unknown"
                            }}
                        </div>

                        <div>
                            <div class="text-xs text-gray-500">
                                {{ session.ip_address }},

                                <span
                                    v-if="session.is_current_device"
                                    class="text-green-500 font-semibold"
                                    >This device</span
                                >
                                <span v-else
                                    >Last active {{ session.last_active }}</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center mt-5">
                <button class="btn btn-danger" @click="confirmLogout">
                    Log Out Other Browser Sessions
                </button>

                <ActionMessage :on="form.recentlySuccessful" class="ms-3">
                    Done.
                </ActionMessage>
            </div>

            <!-- Log Out Other Devices Confirmation Modal -->
            <DialogModal :show="confirmingLogout" @close="closeModal">
                <template #title> Log Out Other Browser Sessions </template>

                <template #content>
                    Please enter your password to confirm you would like to log
                    out of your other browser sessions across all of your
                    devices.

                    <div class="mt-4">
                        <TextInput
                            ref="passwordInput"
                            v-model="form.password"
                            type="password"
                            class="mt-1 block w-3/4"
                            placeholder="Password"
                            autocomplete="current-password"
                            @keyup.enter="logoutOtherBrowserSessions"
                        />

                        <InputError
                            :message="form.errors.password"
                            class="mt-2"
                        />
                    </div>
                </template>

                <template #footer>
                    <SecondaryButton @click="closeModal">
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="logoutOtherBrowserSessions"
                    >
                        Log Out Other Browser Sessions
                    </PrimaryButton>
                </template>
            </DialogModal>
        </template>
    </ActionSection>
</template>
