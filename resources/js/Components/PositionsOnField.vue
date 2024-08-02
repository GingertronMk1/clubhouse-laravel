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
</script>

<template>
    <div
        class="card bg-green p-5"
        style="min-height: 20rem; background-color: green; aspect-ratio: 16/9"
    >
        <div class="position-relative card-body">
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
