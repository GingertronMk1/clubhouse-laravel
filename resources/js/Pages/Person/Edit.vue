<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    users: {
        default: () => [],
        type: Array,
    },
    person: {
        required: true,
        type: Object,
    }
});

const form = useForm(props.person);

const submit = () => form.put(route("person.update", {person: form.id}));
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
