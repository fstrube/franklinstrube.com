<template>
    <AppLayout title="Markdown to PDF Converter">
        <div class="container">
            <div class="editor">
                <Menubar class="editor-toolbar" :model="menuItems" />
                <AceEditor class="editor-view" ref="editor" v-model="markdown" @update:modelValue="debounce(() => convert(), 1000)()"/>
            </div>
            <div v-if="html" class="preview">
                <iframe v-if="html" ref="preview" :src="`data:text/html;charset=utf8;base64,${btoa(`<!DOCTYPE html><html>${head}<body ${printing ? 'onload=&quot;window.print()&quot;' : ''}>${html}${scripts}</body></html>`)}`" />
            </div>
            <template v-else>
                <div class="preview-empty--desktop">
                    <p>👈 Use the area on the left to craft your Markdown document.</p>
                    <p>A preview will be rendered here.</p>
                    <p>When you're done, click File › Print and save your document as a PDF.</p>
                </div>
                <div class="preview-empty--mobile">
                    <p>☝️ Use the area above to craft your Markdown document.</p>
                    <p>A preview will be rendered here.</p>
                    <p>When you're done, click File › Print and save your document as a PDF.</p>
                </div>
            </template>
        </div>
        <input v-show="false" accept=".md,.txt,text/plain,text/markdown" ref="file" type="file" @input="open()">
    </AppLayout>
    <Dialog v-model:visible="viewingAboutDialog" class="about-dialog" modal>
        <p>
            Markdown-to-PDF is a tool for converting easily-readable Markdown to beautiful PDFs. The tool runs entirely in the browser and doesn't send any of your text across the wire.
        </p>
        <p>
            <a href="https://marked.js.org/" target="_blank">Marked.js</a> - Markdown converter<br>
            <a href="https://ace.c9.io/" target="_blank">Ace</a> - Code editor<br>
            <a href="https://primevue.org/" target="_blank">PrimeVue</a> - UI kit<br>
            <a href="https://vuejs.org/" target="_blank">Vue.js</a> - Frontend framework<br>
            <a href="https://inertiajs.com/" target="_blank">Inertia</a> - Frontend routing<br>
            <a href="https://laravel.com/" target="_blank">Laravel</a> - Backend framework<br>
            <a href="https://vite.dev/" target="_blank">Vite</a> - Build tool
        </p>
        <p class="made-with-love">Made with ❤️ in Washington, D.C.</p>
        <p class="copyright">&copy; {{ (new Date()).getYear() + 1900 }} <a href="https://franklinstrube.com">franklinstrube.com</a></p>
    </Dialog>
</template>

<script setup>
    import AppLayout from '@/inertia/layouts/AppLayout.vue'
    import AceEditor from '@/components/AceEditor.vue'
    import Dialog from 'primevue/dialog';
    import { marked } from 'marked'
    import { onMounted, ref, useTemplateRef } from 'vue'
    import Menubar from 'primevue/menubar'

    const props = defineProps({
        markdown: String,
    })
    const settings = ref({
        margin: '0.5in',
    })
    const printing = ref(false)
    const viewingAboutDialog = ref(false)
    const markdown = ref(props.markdown)
    const html = ref('')
    const menuItems = [
        {
            label: 'File',
            items: [
                {
                    label: 'Open ...',
                    command() {
                        file.value.click()
                    }
                },
                {
                    label: 'Open repository ...',
                    command() {

                    }
                },
                {
                    label: 'Print',
                    command() {
                        printing.value = true

                        setTimeout(() => printing.value = false, 1000)
                    },
                    disabled: () => html.value.length === 0
                }
            ],
        },
        {
            label: 'Edit',
            items: [
                {
                    label: 'Settings',
                    command() {

                    },
                }
            ],
        },
        {
            label: 'Help',
            items: [
                {
                    label: 'Markdown Reference',
                    command() {
                        window.open('https://commonmark.org/help/')
                    }
                },
                {
                    label: 'About',
                    command() {
                        viewingAboutDialog.value = true
                    }
                },
            ],
        },
    ]
    const preview = useTemplateRef('preview')
    const file = useTemplateRef('file')
    const editor = useTemplateRef('editor')
    const head = `
<head>
    <title>document.pdf</title>
    <style>
        @page {
            margin: ${settings.value.margin};
        }

        @media screen {
            body {
                background: white;
                margin: ${settings.value.margin};
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></${'script'}>
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
`
    const scripts = `
<script>hljs.highlightAll();</${'script'}>
`

    async function open() {
        const value = await file.value.files.item(0)?.text() || ''

        editor.value.set(value)

        file.value.value = null
    }

    function convert() {
        const converted = marked.parse(markdown.value)

        html.value = converted
    }

    onMounted(() => convert())
</script>

<style scoped>
    .container {
        display: flex;
        height: 100vh;
    }

    .editor {
        border-right: solid 1px #cccccc;
        display: flex;
        flex-direction: column;
        height: 100vh;
        width: 50vw;
    }

    .editor-toolbar {
        border: none;
        border-bottom: solid 1px #cccccc;
        border-radius: 0;
        height: 2rem;
        padding: 1.5rem 0.5rem;
        z-index: 99;
    }

    .editor-view {
        flex-grow: 1;
    }

    .preview {
        background: #e0e0e0;
        border: none;
        height: 100vh;
        padding: 1rem;
        width: 50vw;
    }

    .preview iframe {
        background: #ffffff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
        height: 100%;
        width: 100%;
    }

    .preview-empty--desktop {
        padding: 30vh 1rem 1rem 1rem;
        text-align: center;
        width: 50vw;
    }
    .preview-empty--mobile {
        padding: 10vh 1rem 1rem 1rem;
        text-align: center;
        width: 100vw;
    }

    @media screen and (width >= 600px) {
        .preview-empty--mobile {
            display: none;
        }
    }

    @media screen and (width < 600px) {
        .container {
            flex-direction: column;
        }

        .editor {
            width: 100vw;
        }

        .preview {
            width: 100vw;
        }

        .preview-empty--desktop {
            display: none;
        }
    }
</style>

<style>
    .about-dialog {
        margin: 1rem;
        max-width: 500px;
    }

    .about-dialog p {
        margin-bottom: 1rem;
    }

    .about-dialog a {
        color: #3333c9;
    }

    .made-with-love {
        margin-top: 2rem;
        text-align: center;
    }

    .copyright {
        text-align: center;
    }
</style>
