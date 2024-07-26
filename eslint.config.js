import js from "@eslint/js";
import recommendedConfig from 'eslint-plugin-prettier/recommended';
import pluginVue from 'eslint-plugin-vue';

export default [
    js.configs.all,
    ...pluginVue.configs['flat/recommended'],
    recommendedConfig,
    {
        files: [
            '**/*.{js,vue}',
        ],
        ignores: [
            'vendor',
            'node_modules'
        ],
        languageOptions: {
            globals: {
                'route': 'readonly',
                'axios': 'readonly',
            }
        },
        rules: {
            'vue/multi-word-component-names': 'off',
            'no-useless-assignment': 'off',
            'camelcase': 'off',
            'no-ternary': 'off',
            'one-var': ['error', {
                'const': 'never',
                'let': 'never',
                'var': 'never',

            }]
        },
    },
];
