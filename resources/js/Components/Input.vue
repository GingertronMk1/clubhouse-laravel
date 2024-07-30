<script setup>
import { computed, useSlots } from "vue";

defineOptions({
    inheritAttrs: false,
});

const slots = useSlots();
const hasSlot = (name) => {
    return Boolean(slots[name]);
};

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
        type: [String, Boolean],
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
const emit = defineEmits(["update:modelValue", "update:checked"]);

const proxyValue = computed({
    get() {
        switch (props.type) {
            case "date":
            case "datetime-local": {
                const parsedDate = Date.parse(props.modelValue);
                const dateObject = new Date(parsedDate);
                const [returnValue] = dateObject.toISOString().split("T");
                return returnValue;
            }
            default:
                return props.modelValue;
        }
    },
    set(val) {
        console.log(val);
        switch (props.type) {
            case "checkbox":
                emit("update:modelValue", val);
                break;
            default:
                emit("update:modelValue", val);
                break;
        }
    },
});
</script>

<template>
    <div class="mb-3" :class="{ 'form-check': type === 'checkbox' }">
        <label
            :for="inputId"
            :class="{
                'form-label': type !== 'checkbox',
                'form-check-label': type === 'checkbox',
            }"
        >
            <template v-if="label.length && !hasSlot('default')">
                {{ label }}
            </template>
            <template v-else><slot></slot></template>
        </label>
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
