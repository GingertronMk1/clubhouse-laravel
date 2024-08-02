<script setup>
import Input from "@/Components/Input.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    model: {
        required: true,
        type: Object,
    },
    sports: {
        required: true,
        type: Array,
    },
    submitFn: {
        required: true,
        type: Function,
    },
});

const form = useForm(props.model);
</script>
<template>
    <form @submit.prevent="submitFn(form)">
        <div class="grid">
            <div class="g-col-6">
                <div
                    class="card bg-green p-3"
                    style="height: 20rem; background-color: green"
                >
                    <div class="position-relative h-100 w-100">
                        <i
                            v-for="position in form.sport?.positions?.filter(
                                ({ id }) => id !== form.id,
                            ) ?? []"
                            :key="position.id"
                            class="fa-solid fa-user position-absolute translate-middle"
                            style="color: blue"
                            :style="{
                                top: `${100 - position.preview_position_y}%`,
                                left: `${position.preview_position_x}%`,
                            }"
                        />
                        <i
                            class="fa-solid fa-user-plus position-absolute translate-middle"
                            :style="{
                                top: `${100 - form.preview_position_y}%`,
                                left: `${form.preview_position_x}%`,
                            }"
                        />
                    </div>
                </div>
            </div>
            <div class="g-col-6">
                <Input
                    v-model="form.sport"
                    :error="form.errors.sport"
                    type="select"
                    :options="sports"
                    :option-value-getter="(sport) => sport"
                    :readonly="form.id ? 'readonly' : null"
                >
                    Sport
                    <i
                        class="fa-solid fa-circle"
                        :style="{
                            color: form.sport?.colour ?? 'rgba(0, 0, 0, 0)',
                        }"
                    />
                </Input>
                <Input
                    v-model="form.preview_position_x"
                    type="range"
                    :error="form.errors.preview_position_x"
                    min="0"
                    max="100"
                >
                    Preview X: <span v-text="`${form.preview_position_x}%`" />
                </Input>
                <Input
                    v-model="form.preview_position_y"
                    label="Y"
                    type="range"
                    :error="form.errors.preview_position_y"
                    min="0"
                    max="100"
                >
                    Preview Y: <span v-text="`${form.preview_position_y}%`" />
                </Input>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
