<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "@/Components/Input.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    person: {
        required: true,
        type: Object,
    },
    users: {
        default: () => [],
        type: Array,
    },
});

const form = useForm(props.person);

const submit = () => form.put(route("person.update", { person: form.id }));
</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2 v-text="`Update ${person.name}`" />
        </template>
        <form method="POST" class="card mt-3" @submit.prevent="submit">
            <div class="card-body">
                <Input v-model="form.name" type="text" label="Name" />
                <Input v-model="form.bio" type="textarea" label="Bio" />
                <Input v-model="form.dob" type="date" label="Date of Birth" />
                <Input
                    v-model="form.user_id"
                    type="select"
                    :options="users"
                    label="User"
                />
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </AppLayout>
</template>

<style scoped></style>
