<script setup lang="ts">
import ActionMessage from "@/Components/BuiltIn/ActionMessage.vue";
import FormSection from "@/Components/BuiltIn/FormSection.vue";
import Input from "@/Components/Input.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);
const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});
const updatePassword = () => {
    form.put(route("user-password.update"), {
        errorBag: "updatePassword",
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset("current_password");
                currentPasswordInput.value.focus();
            }
        },
        onSuccess: () => form.reset(),
        preserveScroll: true,
    });
};
</script>

<template>
    <FormSection @submitted="updatePassword">
        <template #title> Update Password </template>

        <template #description>
            Ensure your account is using a long, random password to stay secure.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <Input
                    v-model="form.current_password"
                    label="Current Password"
                    type="password"
                />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <Input
                    v-model="form.password"
                    autocomplete="new-password"
                    type="password"
                />
            </div>

            <div class="col-span-6 sm:col-span-4">
                <Input
                    v-model="form.password_confirmation"
                    autocomplete="new-password"
                    type="password"
                />
            </div>
        </template>

        <template #actions>
            <ActionMessage :on="form.recentlySuccessful" class="me-3">
                Saved.
            </ActionMessage>

            <button
                class="btn btn-primary"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Save
            </button>
        </template>
    </FormSection>
</template>
