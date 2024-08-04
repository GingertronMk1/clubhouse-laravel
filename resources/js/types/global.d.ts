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
