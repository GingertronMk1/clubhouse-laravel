<script setup>
defineProps({
    positions: {
        required: true,
        type: Array,
    },
    showName: {
        default: false,
        type: Boolean,
    },
});

const emit = defineEmits(["update:modelValue"]);

const dragstart = (evt, tgt) => console.log(evt, tgt);
const dragend = (evt, tgt) => {
    console.log(tgt);
    if (evt.originalTarget) {
        const newX = evt.layerX / evt.originalTarget.clientWidth;
        const newY = evt.layerY / evt.originalTarget.clientHeight;
        console.table({ newX, newY });
        emit("update:modelValue", { newX, newY });
    }
};
</script>

<template>
    <div
        class="card bg-green p-5"
        style="min-height: 20rem; background-color: green; aspect-ratio: 16/9"
    >
        <div
            class="position-relative card-body"
            @dragover.prevent
            @drop="dragend"
        >
            <div
                v-for="position in positions"
                :key="position.id"
                class="position-absolute translate-middle text-center d-flex flex-column"
                :style="{
                    top: `${100 - position.preview_position_y}%`,
                    left: `${position.preview_position_x}%`,
                    'font-size': position.current ? '2rem' : null,
                }"
                :title="position.name"
                :draggable="position.current"
                @dragstart="dragstart"
            >
                <i
                    :class="
                        position.current
                            ? 'fa-solid fa-user-plus text-primary-emphasis'
                            : 'fa-solid fa-user'
                    "
                />
                <span
                    v-if="showName"
                    class="text-wrap"
                    style="max-width: 5rem"
                    v-text="position.name"
                />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
