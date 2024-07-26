<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {ref} from "vue";
import {router, useForm} from '@inertiajs/vue3'

const props = defineProps({
    users: Array
});

const form = useForm({
    name: '',
        dob: '',
    bio: '',
    user_id: null
});

function submit() {
    form.post(route('person.store'));
}

</script>

<template>
    <AppLayout title="People">
        <template #header>
            <h2>Create new Person</h2>
        </template>
        <form @submit.prevent="submit" method="POST" class="card">
            <input type="text" name="name" id="name" v-model="form.name">
            <textarea name="bio" id="bio" cols="30" rows="10" v-model="form.bio" />
            <input type="date" name="dob" id="dob" v-model="form.dob" />
            <select name="user_id" id="user_id" v-model="form.user_id">
                <option v-for="user in users" :key="user.id" :value="user.id" v-text="user.name" />
            </select>
            <button type="submit">Submit</button>
        </form>
    </AppLayout>
</template>

<style scoped>

</style>
