<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { ref } from "vue";
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
