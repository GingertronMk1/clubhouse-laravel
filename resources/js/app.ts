import "./bootstrap";
import "../css/app.css";
import "../scss/app.scss";

import type { DefineComponent } from "vue";
import type {InertiaApp, InertiaAppProps} from "@inertiajs/vue3/types/app";
import type { PluginOption } from "vite";

import {
    createApp,
    h
} from "vue";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    progress: {
        color: "#4B5563",
    },
    resolve: (name: string) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>("./Pages/**/*.vue"),
        ),
    setup: function (
        {
            el,
            App,
            props,
            plugin
        }:
            {
                el: Element,
                App: InertiaApp,
                props: InertiaAppProps,
                plugin: PluginOption
            }) {
        return createApp(
            {render: () => h(App, props)})
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    title: (title: string) => (
        title.length
            ? `${title} - ${appName}`
            : appName
    ),
});
