<template>
    <iframe ref="iframe" :src="src" :style="{ zoom: zoom }" />
</template>

<script setup>
    import { computed, ref, useTemplateRef } from 'vue'

    const props = defineProps({
        html: String,
        printing: Boolean,
        preferences: Object,
        zoom: Number,
    })

    const html = computed(() => {
        const html = `
<!DOCTYPE html>
<html>
<head>
    <title>document.pdf</title>
    <style>
        @page {
            margin: ` +
                fallback(props.preferences.margin?.top, 0.5) + `in ` +
                fallback(props.preferences.margin?.right, 0.5) + `in ` +
                fallback(props.preferences.margin?.bottom, 0.5) + `in ` +
                fallback(props.preferences.margin?.left, 0.5) + `in ;
        }

        @media screen {
            body {
                background: white;
                margin: ` +
                    fallback(props.preferences.margin?.top, 1) + `in ` +
                    fallback(props.preferences.margin?.right, 1) + `in ` +
                    fallback(props.preferences.margin?.bottom, 1) + `in ` +
                    fallback(props.preferences.margin?.left, 1) + `in ;
                zoom: ` + props.zoom + `;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"><\/script>
    <style>
        .hljs {
            border-radius: 8px;
            border: solid 1px #cccccc;
            position: relative;

            &::before {
                background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NCIgaGVpZ2h0PSIxNCIgdmlld0JveD0iMCAwIDU0IDE0Ij48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDEgMSkiPjxjaXJjbGUgY3g9IjYiIGN5PSI2IiByPSI2IiBmaWxsPSIjRkY1RjU2IiBzdHJva2U9IiNFMDQ0M0UiIHN0cm9rZS13aWR0aD0iLjUiPjwvY2lyY2xlPjxjaXJjbGUgY3g9IjI2IiBjeT0iNiIgcj0iNiIgZmlsbD0iI0ZGQkQyRSIgc3Ryb2tlPSIjREVBMTIzIiBzdHJva2Utd2lkdGg9Ii41Ij48L2NpcmNsZT48Y2lyY2xlIGN4PSI0NiIgY3k9IjYiIHI9IjYiIGZpbGw9IiMyN0M5M0YiIHN0cm9rZT0iIzFBQUIyOSIgc3Ryb2tlLXdpZHRoPSIuNSI+PC9jaXJjbGU+PC9nPjwvc3ZnPg==');
                background-repeat: no-repeat;
                content: '';
                display: block;
                height: 2em;
            }

            &::after {
                content: attr(data-name);
                display: inline-block;
                font-size: 0.8em;
                position: absolute;
                left: 100px;
                right: 0;
                top: 0.75rem;
            }
        }
    </style>
</head>
<body ` + (props.printing ? 'onload="window.print()"' : '') + `>
    ` + props.html + `
    <script>hljs.highlightAll();<\/script>
</body>
</html>
`
        return html
    })

    const src = computed(() => `data:text/html;charset=utf8;base64,${btoa(html.value)}`)

    const iframe = useTemplateRef('iframe')

    defineExpose({
        getWidth() {
            return iframe.value.getBoundingClientRect().width
        },
    })

    function fallback(number, fallback) {
        const parsed = parseFloat(number)

        if (isNaN(parsed) || null === parsed) {
            return fallback
        }

        return parsed
    }
</script>

<style scoped>
    iframe {
        background: #ffffff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        min-height: 11in;
        width: 8.5in;
    }
</style>

