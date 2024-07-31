<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    services: {
        required: true,
        type: Object,
    },
});
</script>

<template>
    <AppLayout>
        <template #header>
            <h2>Developer Services</h2>
        </template>

        <div class="card my-3">
            <div class="list-group list-group-flush">
                <a
                    v-for="(url, service) in services"
                    :key="service"
                    class="list-group-item list-group-item-action"
                    :href="url"
                    target="_blank"
                    v-text="service"
                />
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
