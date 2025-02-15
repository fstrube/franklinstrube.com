<template>
    <Head :title="title" />
    <header><slot name="header" /></header>
    <main><slot/></main>
    <footer><slot name="footer" /></footer>
</template>

<script setup>
    import { Head } from '@inertiajs/vue3';

    defineProps({
        title: String,
    });
</script>

<style>
    html, body {
        margin: 0;
    }
</style>
