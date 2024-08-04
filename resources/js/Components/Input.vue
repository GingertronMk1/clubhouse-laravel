<script setup lang="ts">
import { computed, useSlots } from "vue";
import { v7 as uuidv7 } from "uuid";

defineOptions({
    inheritAttrs: false,
});

const slots = useSlots();
const hasSlot = (name) => {
    return Boolean(slots[name]);
};

const props = defineProps({
    checked: {
        default: false,
        type: [Array, Boolean],
    },
    cols: {
        default: 30,
        type: Number,
    },
    error: {
        default: null,
        type: [String, null],
    },
    label: {
        default: "",
        type: String,
    },
    modelValue: {
        default: "",
        type: [Object, Array, Number, String, Boolean],
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

const inputId = uuidv7();
const emit = defineEmits(["update:modelValue", "update:checked"]);

const proxyValue = computed({
    get() {
        switch (props.type) {
            case "checkbox":
                return props.checked;
            case "date":
            case "datetime-local": {
                let dateObject = new Date();
                const intModelValue = parseInt(props.modelValue, 10);
                if (!isNaN(intModelValue)) {
                    const parsedDate = Date.parse(props.modelValue);
                    dateObject = new Date(parsedDate);
                }
                const [returnValue] = dateObject.toISOString().split("T");
                return returnValue;
            }
            default:
                return props.modelValue;
        }
    },
    set(val) {
        switch (props.type) {
            case "checkbox":
                emit("update:checked", val);
                break;
            case "number":
            case "range":
                emit("update:modelValue", parseInt(val, 10));
                break;
            default:
                emit("update:modelValue", val);
        }
    },
});
</script>

<template>
    <div class="mb-3" :class="{ 'form-check': type === 'checkbox' }">
        <label
            v-if="label.length || hasSlot('default')"
            :for="inputId"
            :class="{
                'form-label': type !== 'checkbox',
                'form-check-label': type === 'checkbox',
            }"
        >
            <template v-if="label.length && !hasSlot('default')">
                {{ label }}
            </template>
            <template v-else><slot /></template>
        </label>
        <div v-if="error" class="text-danger" v-text="error" />
        <textarea
            v-if="type === 'textarea'"
            :id="inputId"
            v-model="proxyValue"
            class="form-control"
            :cols="cols"
            :rows="rows"
            v-bind="$attrs"
        />
        <select
            v-else-if="type === 'select'"
            :id="inputId"
            v-model="proxyValue"
            class="form-select"
            v-bind="$attrs"
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
            v-else-if="type === 'checkbox'"
            v-bind="$attrs"
            :id="inputId"
            v-model="proxyValue"
            type="checkbox"
            class="form-check-input"
        />
        <input
            v-else-if="type === 'color'"
            v-bind="$attrs"
            :id="inputId"
            v-model="proxyValue"
            type="color"
            class="form-control form-control-color"
        />
        <input
            v-else-if="type === 'range'"
            v-bind="$attrs"
            :id="inputId"
            v-model="proxyValue"
            type="range"
            class="form-range"
        />
        <input
            v-else
            :id="inputId"
            v-model="proxyValue"
            :type="type"
            class="form-control"
            v-bind="$attrs"
        />
    </div>
</template>

<style scoped></style>
