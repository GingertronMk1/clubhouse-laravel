<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Input from "@/Components/Input.vue";
import { useForm } from "@inertiajs/vue3";

defineProps({
    users: {
        default: () => [],
        type: Array,
    },
});

const form = useForm({
    bio: "",
    dob: "",
    name: "",
    user_id: "",
});

const submit = () => form.post(route("person.store"));
</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2>Create new Person</h2>
        </template>
        <form class="card mt-3" @submit.prevent="submit">
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
