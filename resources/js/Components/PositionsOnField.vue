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

const dragStart = (event, item) => console.log(event, item);

const maxPercent = 100;

const dragOver = (event) => {
    console.log(event.clientX, event.clientY, event.layerX, event.layerY);
    console.log(event);
    console.table({
        dragX: parseInt(
            maxPercent * (event.layerX / event.target.offsetWidth),
            10,
        ),
        dragY: parseInt(
            maxPercent * (event.layerY / event.target.offsetHeight),
            10,
        ),
    });
};
</script>

<template>
    <div
        class="card bg-green p-5"
        style="min-height: 20rem; background-color: green; aspect-ratio: 16/9"
    >
        <div class="position-relative card-body" @dragover="dragOver">
            <div
                v-for="position in positions"
                :key="position.id"
                class="position-absolute translate-middle text-center d-flex flex-column"
                :style="{
                    top: `${100 - position.preview_position_y}%`,
                    left: `${position.preview_position_x}%`,
                }"
                :title="position.name"
                draggable="true"
                @dragstart="dragStart"
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
