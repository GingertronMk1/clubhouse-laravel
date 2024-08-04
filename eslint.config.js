import js from "@eslint/js";
import pluginVue from "eslint-plugin-vue";
import recommendedConfig from "eslint-plugin-prettier/recommended";

import eslint from '@eslint/js';
import tseslint from 'typescript-eslint';

export default tseslint.config(
    eslint.configs.recommended,
    ...tseslint.configs.recommended,
    js.configs.all,
    ...pluginVue.configs["flat/recommended"],
    recommendedConfig,
    {
        files: ["**/*.{ts,js,vue}"],
        ignores: ["./vendor/", "./node_modules/", "./bootstrap/"],
        languageOptions: {
            globals: {
                axios: "readonly",
                route: "readonly",
            },
        },
        rules: {
            camelcase: "off",
            "max-lines": "off",
            "no-console": "off",
            "no-magic-numbers": "off",
            "no-ternary": "off",
            "no-useless-assignment": "off",
            "one-var": [
                "error",
                {
                    const: "never",
                    let: "never",
                    var: "never",
                },
            ],
            "vue/multi-word-component-names": "off",
        },
    },
);
