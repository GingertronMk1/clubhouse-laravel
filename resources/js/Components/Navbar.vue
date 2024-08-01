<script setup>
import { Link, router } from "@inertiajs/vue3";
import { ref } from "vue";

const navLinks = [
    {
        href: route("index"),
        text: "Home",
    },
    {
        href: route("team.index"),
        text: "Teams",
    },
    {
        href: route("person.index"),
        text: "People",
    },
    {
        href: route("sport.index"),
        text: "Sports",
    },
];

const showProfile = ref(false);
const logout = () => router.post(route("logout"));
</script>

<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fa-solid fa-football fs-2" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li
                        v-for="navLink in navLinks"
                        :key="JSON.stringify(navLink)"
                        class="nav-item"
                    >
                        <Link class="nav-link" :href="navLink.href">
                            {{ navLink.text }}
                        </Link>
                    </li>
                </ul>
            </div>
            <div
                v-if="$page.props?.auth?.user"
                class="btn btn-outline-primary position-relative z-3"
                @click="showProfile = !showProfile"
            >
                {{ $page.props.auth.user.name }}
                <div
                    class="card position-absolute end-0 mt-3 text-nowrap"
                    :class="{ 'd-none': !showProfile }"
                >
                    <ul class="list-group list-group-flush">
                        <Link
                            class="list-group-item list-group-item-action"
                            :href="route('profile.show')"
                        >
                            Profile
                        </Link>
                        <Link
                            v-if="$page.props?.jetstream?.hasApiFeatures"
                            class="list-group-item list-group-item-action"
                            :href="route('api-tokens.index')"
                        >
                            Manage API Tokens
                        </Link>
                        <Link
                            v-if="route().has('dev-services')"
                            class="list-group-item list-group-item-action"
                            :href="route('dev-services')"
                        >
                            Developer Services
                        </Link>
                        <li
                            class="list-group-item list-group-item-action"
                            @click="logout"
                        >
                            Log Out
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</template>

<style scoped></style>
