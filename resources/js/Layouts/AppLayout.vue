<script setup>
import Banner from "@/Components/BuiltIn/Banner.vue";
import { Head } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

defineProps({
    title: {
        default: "",
        type: String,
    },
});
</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />
        <div>
            <Navbar />

            <header v-if="$slots.header" class="bg-white shadow p-3">
                <slot name="header" />
            </header>

            <!-- Page Content -->
            <main class="container">
                <slot />
            </main>
        </div>
    </div>
</template>
