<script setup>
import Input from "@/Components/Input.vue";
import PositionsOnField from "@/Components/PositionsOnField.vue";
import { computed } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    model: {
        required: true,
        type: Object,
    },
    sport: {
        required: true,
        type: Object,
    },
    submitFn: {
        required: true,
        type: Function,
    },
});

const positions = (props.sport?.positions ?? [])
    .filter(({ id }) => id !== props.model.id)
    .map((position) => ({ ...position }));

const form = useForm({
    ...props.model,
    current: true,
});

const positionsPlusThisOne = computed({
    get() {
        return [...positions, form].sort(
            ({ sort_order: a_sort }, { sort_order: b_sort }) => a_sort - b_sort,
        );
    },
});
</script>
<template>
    <form @submit.prevent="submitFn(form)">
        <div class="grid">
            <div class="g-col-12">
                <div class="grid">
                    <div class="g-col-9">
                        <Input
                            v-model="form.name"
                            :error="form.errors.name"
                            label="Name"
                            required
                        />
                    </div>
                    <div class="g-col-3">
                        <Input
                            v-model="form.default_number"
                            :error="form.errors.default_number"
                            label="Default Number"
                            type="number"
                        />
                    </div>
                </div>
                <Input
                    v-model="form.description"
                    :error="form.errors.description"
                    type="textarea"
                    label="Description"
                />
            </div>
            <div class="g-col-6">
                <Input
                    v-model="form.sort_order"
                    type="range"
                    :error="form.errors.sort_order"
                    min="0"
                    max="100"
                    label="Sort Order"
                >
                    Sort Order: <span v-text="form.sort_order" />
                </Input>

                <ul class="list-group">
                    <li
                        v-for="position in positionsPlusThisOne"
                        :key="position.id"
                        class="list-group-item"
                        :class="{
                            active: position.current,
                        }"
                        v-text="`${position.sort_order} | ${position.name}`"
                    />
                </ul>
            </div>
            <div class="g-col-6">
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

                <PositionsOnField :positions="positionsPlusThisOne" />
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</template>
