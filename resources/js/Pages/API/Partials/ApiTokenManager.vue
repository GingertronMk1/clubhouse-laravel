<script setup>
import ActionMessage from "@/Components/BuiltIn/ActionMessage.vue";
import ActionSection from "@/Components/BuiltIn/ActionSection.vue";
import ConfirmationModal from "@/Components/BuiltIn/ConfirmationModal.vue";
import DialogModal from "@/Components/BuiltIn/DialogModal.vue";
import FormSection from "@/Components/BuiltIn/FormSection.vue";
import Input from "@/Components/Input.vue";
import InputLabel from "@/Components/BuiltIn/InputLabel.vue";
import SectionBorder from "@/Components/BuiltIn/SectionBorder.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    availablePermissions: {
        default: () => [],
        type: Array,
    },
    defaultPermissions: {
        default: () => [],
        type: Array,
    },
    tokens: {
        default: () => [],
        type: Array,
    },
});
const createApiTokenForm = useForm({
    name: "",
    permissions: props.defaultPermissions,
});
const updateApiTokenForm = useForm({
    permissions: [],
});
const deleteApiTokenForm = useForm({});
const displayingToken = ref(false);
const managingPermissionsFor = ref(null);
const apiTokenBeingDeleted = ref(null);
const createApiToken = () => {
    createApiTokenForm.post(route("api-tokens.store"), {
        onSuccess: () => {
            displayingToken.value = true;
            createApiTokenForm.reset();
        },
        preserveScroll: true,
    });
};
const manageApiTokenPermissions = (token) => {
    updateApiTokenForm.permissions = token.abilities;
    managingPermissionsFor.value = token;
};
const updateApiToken = () => {
    updateApiTokenForm.put(
        route("api-tokens.update", managingPermissionsFor.value),
        {
            onSuccess: () => (managingPermissionsFor.value = null),
            preserveScroll: true,
            preserveState: true,
        },
    );
};
const confirmApiTokenDeletion = (token) => {
    apiTokenBeingDeleted.value = token;
};
const deleteApiToken = () => {
    deleteApiTokenForm.delete(
        route("api-tokens.destroy", apiTokenBeingDeleted.value),
        {
            onSuccess: () => (apiTokenBeingDeleted.value = null),
            preserveScroll: true,
            preserveState: true,
        },
    );
};
</script>

<template>
    <div>
        <!-- Generate API Token -->
        <FormSection @submitted="createApiToken">
            <template #title> Create API Token </template>

            <template #description>
                API tokens allow third-party services to authenticate with our
                application on your behalf.
            </template>

            <template #form>
                <!-- Token Name -->
                <div class="col-span-6 sm:col-span-4">
                    <Input v-model="createApiTokenForm.name" autofocus />
                </div>

                <!-- Token Permissions -->
                <div v-if="availablePermissions.length > 0" class="col-span-6">
                    <InputLabel for="permissions" value="Permissions" />

                    <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div
                            v-for="permission in availablePermissions"
                            :key="permission"
                        >
                            <label class="flex items-center">
                                <Input
                                    v-model:checked="
                                        createApiTokenForm.permissions
                                    "
                                    :value="permission"
                                    type="checkbox"
                                />
                                <span
                                    class="ms-2 text-sm text-gray-600"
                                    v-text="permission"
                                />
                            </label>
                        </div>
                    </div>
                </div>
            </template>

            <template #actions>
                <ActionMessage
                    :on="createApiTokenForm.recentlySuccessful"
                    class="me-3"
                >
                    Created.
                </ActionMessage>

                <button
                    class="btn btn-primary"
                    :class="{ 'opacity-25': createApiTokenForm.processing }"
                    :disabled="createApiTokenForm.processing"
                >
                    Create
                </button>
            </template>
        </FormSection>

        <div v-if="tokens.length > 0">
            <SectionBorder />

            <!-- Manage API Tokens -->
            <div class="mt-10 sm:mt-0">
                <ActionSection>
                    <template #title> Manage API Tokens </template>

                    <template #description>
                        You may delete any of your existing tokens if they are
                        no longer needed.
                    </template>

                    <!-- API Token List -->
                    <template #content>
                        <div class="space-y-6">
                            <div
                                v-for="token in tokens"
                                :key="token.id"
                                class="flex items-center justify-between"
                            >
                                <div class="break-all">
                                    {{ token.name }}
                                </div>

                                <div class="flex items-center ms-2">
                                    <div
                                        v-if="token.last_used_ago"
                                        class="text-sm text-gray-400"
                                    >
                                        Last used {{ token.last_used_ago }}
                                    </div>

                                    <button
                                        v-if="availablePermissions.length > 0"
                                        class="cursor-pointer ms-6 text-sm text-gray-400 underline"
                                        @click="
                                            manageApiTokenPermissions(token)
                                        "
                                    >
                                        Permissions
                                    </button>

                                    <button
                                        class="cursor-pointer ms-6 text-sm text-red-500"
                                        @click="confirmApiTokenDeletion(token)"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </ActionSection>
            </div>
        </div>

        <!-- Token Value Modal -->
        <DialogModal :show="displayingToken" @close="displayingToken = false">
            <template #title> API Token </template>

            <template #content>
                <div>
                    Please copy your new API token. For your security, it won't
                    be shown again.
                </div>

                <div
                    v-if="$page.props.jetstream.flash.token"
                    class="mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm text-gray-500 break-all"
                >
                    {{ $page.props.jetstream.flash.token }}
                </div>
            </template>

            <template #footer>
                <button
                    class="btn btn-secondary"
                    @click="displayingToken = false"
                >
                    Close
                </button>
            </template>
        </DialogModal>

        <!-- API Token Permissions Modal -->
        <DialogModal
            :show="managingPermissionsFor != null"
            @close="managingPermissionsFor = null"
        >
            <template #title> API Token Permissions </template>

            <template #content>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div
                        v-for="permission in availablePermissions"
                        :key="permission"
                    >
                        <label class="flex items-center">
                            <Input
                                v-model:checked="updateApiTokenForm.permissions"
                                :value="permission"
                                type="checkbox"
                            />
                            <span
                                class="ms-2 text-sm text-gray-600"
                                v-text="permission"
                            />
                        </label>
                    </div>
                </div>
            </template>

            <template #footer>
                <button
                    class="btn btn-secondary"
                    @click="managingPermissionsFor = null"
                >
                    Cancel
                </button>

                <button
                    class="btn btn-primary"
                    :class="{ 'opacity-25': updateApiTokenForm.processing }"
                    :disabled="updateApiTokenForm.processing"
                    @click="updateApiToken"
                >
                    Save
                </button>
            </template>
        </DialogModal>

        <!-- Delete Token Confirmation Modal -->
        <ConfirmationModal
            :show="apiTokenBeingDeleted != null"
            @close="apiTokenBeingDeleted = null"
        >
            <template #title> Delete API Token </template>

            <template #content>
                Are you sure you would like to delete this API token?
            </template>

            <template #footer>
                <button
                    class="btn-secondary"
                    @click="apiTokenBeingDeleted = null"
                >
                    Cancel
                </button>

                <button
                    class="btn btn-danger"
                    :class="{ 'opacity-25': deleteApiTokenForm.processing }"
                    :disabled="deleteApiTokenForm.processing"
                    @click="deleteApiToken"
                >
                    Delete
                </button>
            </template>
        </ConfirmationModal>
    </div>
</template>
