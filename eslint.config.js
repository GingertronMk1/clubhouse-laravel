import globals from "globals";
import pluginJs from "@eslint/js";
import tseslint from "typescript-eslint";
import eslintPluginPrettier from "eslint-plugin-prettier/recommended";


export default [
    {
        languageOptions: {
            globals: globals.browser,
            parserOptions: {
                projectService: true,
                allowDefaultProject: true
            },
        }
    },
    pluginJs.configs.recommended,
    ...tseslint.configs.strictTypeChecked,
    ...tseslint.configs.stylisticTypeChecked,
    eslintPluginPrettier,
];
