<script setup lang="ts">
import Modal from "./Modal.vue";

const emit = defineEmits(["close"]);

defineProps({
    closeable: {
        default: true,
        type: Boolean,
    },
    maxWidth: {
        default: "2xl",
        type: String,
    },
    show: {
        default: false,
        type: Boolean,
    },
});

const close = () => {
    emit("close");
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div class="px-6 py-4">
            <div class="text-lg font-medium text-gray-900">
                <slot name="title" />
            </div>

            <div class="mt-4 text-sm text-gray-600">
                <slot name="content" />
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-end">
            <slot name="footer" />
        </div>
    </Modal>
</template>
