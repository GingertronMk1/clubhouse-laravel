<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import { InertiaForm } from "@inertiajs/vue3";
import type { Team } from "@/types/global";
import TeamForm from "@/Components/Forms/TeamForm.vue";

defineProps({
    sports: {
        required: true,
        type: Array,
    },
    team: {
        required: true,
        type: Object as () => Team,
    },
});

const submitForm = (argForm: InertiaForm<Team>): void =>
    argForm
        .transform(
            (data: Team): Team => ({
                ...data,
                sport_id: data.sport.id,
            }),
        )
        .post(route("team.update", { team: argForm.id }));
</script>

<template>
    <AppLayout>
        <template #header>
            <h2>Edit {{ team.name }}</h2>
        </template>
        <TeamForm :model="team" :submit-fn="submitForm" :sports="sports" />
    </AppLayout>
</template>
