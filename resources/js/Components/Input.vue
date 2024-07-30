<script setup>
import { computed } from "vue";
const props = defineProps({
    cols: {
        default: 30,
        type: Number,
    },
    label: {
        default: "",
        type: String,
    },
    modelValue: {
        default: "",
        type: String,
    },
    nullable: {
        default: true,
        type: Boolean,
    },
    optionTextGetter: {
        default({ name }) {
            return name;
        },
        type: Function,
    },
    optionValueGetter: {
        default({ id }) {
            return id;
        },
        type: Function,
    },
    options: {
        default: () => [],
        type: Array,
    },
    rows: {
        default: 10,
        type: Number,
    },
    type: {
        default: "text",
        type: String,
    },
});

const inputId = crypto.randomUUID();
const emit = defineEmits(["update:modelValue"]);

const proxyValue = computed({
    get() {
        if (["date", "datetime-local"].includes(props.type)) {
            const parsedDate = Date.parse(props.modelValue);
            const dateObject = new Date(parsedDate);
            const [returnValue] = dateObject.toISOString().split("T");
            return returnValue;
        }
        return props.modelValue;
    },
    set(val) {
        emit("update:modelValue", val);
    },
});
</script>

<template>
    <div class="mb-3">
        <label :for="inputId" class="form-label" v-text="label" />
        <textarea
            v-if="type === 'textarea'"
            :id="inputId"
            v-model="proxyValue"
            class="form-control"
            :cols="cols"
            :rows="rows"
        />
        <select
            v-else-if="type === 'select'"
            :id="inputId"
            v-model="proxyValue"
            class="form-select"
        >
            <option v-if="nullable" :value="null" v-text="`---`" />
            <option
                v-for="option in options"
                :key="optionValueGetter(option)"
                :value="optionValueGetter(option)"
                v-text="optionTextGetter(option)"
            />
        </select>
        <input
            v-else
            :id="inputId"
            v-model="proxyValue"
            :type="type"
            class="form-control"
        />
    </div>
</template>

<style scoped></style>
