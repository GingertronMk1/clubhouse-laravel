import { PageProps as AppPageProps } from "./";
import { AxiosInstance } from "axios";
import { PageProps as InertiaPageProps } from "@inertiajs/core";
import type { route as ziggyRoute } from "ziggy-js";

declare global {
    const route: typeof ziggyRoute = ziggyRoute();
    interface Window {
        axios: AxiosInstance;
    }
}

declare module "vue" {
    interface ComponentCustomProperties {
        route: typeof ziggyRoute;
    }
}

declare module "@inertiajs/core" {
    interface PageProps extends InertiaPageProps, AppPageProps {}
}

interface User {
    id: string,
    name: string,
    email: string,
}

interface Person {
    id: string,
    name: string,
    bio: ?string,
    dob: ?string,
    user_id: ?string,
    user: ?User
}

interface Team {
    id: string,
    name: string,
    description: ?string,
    address: ?string,
    sport_id: string,
    sport: Sport,
    people: ?Array<Person>
}

interface Sport {
    id: string,
    name: string,
    description: ?string,
    colour: ?string,
    teams: ?Array<Team>
    positions: ?Array<Position>,
}

interface Position {
    id: string,
    name: string,
    description: ?string,
    sort_order: bigint,
    default_number: bigint,
    sport_id: string,
    sport: Sport,
    preview_position_x: bigint,
    preview_position_y: bigint,
}
