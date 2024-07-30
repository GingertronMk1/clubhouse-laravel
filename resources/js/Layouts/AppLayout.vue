<script setup>
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/BuiltIn/ApplicationMark.vue";
import Banner from "@/Components/BuiltIn/Banner.vue";
import Dropdown from "@/Components/BuiltIn/Dropdown.vue";
import DropdownLink from "@/Components/BuiltIn/DropdownLink.vue";
import NavLink from "@/Components/BuiltIn/NavLink.vue";
import ResponsiveNavLink from "@/Components/BuiltIn/ResponsiveNavLink.vue";
import { ref } from "vue";
import Navbar from "@/Components/BuiltIn/Navbar.vue";

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
