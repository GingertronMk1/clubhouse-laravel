<script setup>
import { nextTick, reactive, ref } from "vue";
import DialogModal from "./DialogModal.vue";
import InputError from "./InputError.vue";
import PrimaryButton from "./PrimaryButton.vue";
import SecondaryButton from "./SecondaryButton.vue";
import TextInput from "./TextInput.vue";

const emit = defineEmits(["confirmed"]);

defineProps({
    button: {
        default: "Confirm",
        type: String,
    },
    content: {
        default: "For your security, please confirm your password to continue.",
        type: String,
    },
    title: {
        default: "Confirm Password",
        type: String,
    },
});

const confirmingPassword = ref(false);
const form = reactive({
    error: "",
    password: "",
    processing: false,
});
const passwordInput = ref(null);
const startConfirmingPassword = () => {
    axios.get(route("password.confirmation")).then(({ data: confirmed }) => {
        if (confirmed) {
            emit("confirmed");
        } else {
            confirmingPassword.value = true;
            const timeout = 250;
            setTimeout(() => passwordInput.value.focus(), timeout);
        }
    });
};
const closeModal = () => {
    confirmingPassword.value = false;
    form.password = "";
    form.error = "";
};
const confirmPassword = () => {
    form.processing = true;

    axios
        .post(route("password.confirm"), {
            password: form.password,
        })
        .then(() => {
            form.processing = false;

            closeModal();
            nextTick().then(() => emit("confirmed"));
        })
        .catch(
            ({
                response: {
                    data: { errors: password },
                },
            }) => {
                form.processing = false;
                [form.error] = password;
                passwordInput.value.focus();
            },
        );
};
</script>

<template>
    <span>
        <span @click="startConfirmingPassword">
            <slot />
        </span>

        <DialogModal :show="confirmingPassword" @close="closeModal">
            <template #title>
                {{ title }}
            </template>

            <template #content>
                {{ content }}

                <div class="mt-4">
                    <TextInput
                        ref="passwordInput"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="Password"
                        autocomplete="current-password"
                        @keyup.enter="confirmPassword"
                    />

                    <InputError :message="form.error" class="mt-2" />
                </div>
            </template>

            <template #footer>
                <SecondaryButton @click="closeModal"> Cancel </SecondaryButton>

                <PrimaryButton
                    class="ms-3"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    @click="confirmPassword"
                >
                    {{ button }}
                </PrimaryButton>
            </template>
        </DialogModal>
    </span>
</template>
