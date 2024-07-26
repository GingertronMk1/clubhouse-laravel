<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
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
    user_id: () => null,
});

const submit = () => form.post(route("person.store"));
</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2>Create new Person</h2>
        </template>
        <form method="POST" class="card" @submit.prevent="submit">
            <input id="name" v-model="form.name" type="text" name="name" />
            <textarea
                id="bio"
                v-model="form.bio"
                name="bio"
                cols="30"
                rows="10"
            />
            <input id="dob" v-model="form.dob" type="date" name="dob" />
            <select id="user_id" v-model="form.user_id" name="user_id">
                <option
                    v-for="user in users"
                    :key="user.id"
                    :value="user.id"
                    v-text="user.name"
                />
            </select>
            <button type="submit">Submit</button>
        </form>
    </AppLayout>
</template>

<style scoped></style>
