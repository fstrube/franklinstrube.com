import js from '@eslint/js';

export default [
    {
        ...js.configs.recommended,
        files: ['resources/js/**/*'],
    },
];
