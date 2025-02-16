<template>
    <AppLayout title="Markdown to PDF Converter">
        <div class="container">
            <div class="editor">
                <Menubar class="editor-toolbar" :model="menuItems" />
                <AceEditor class="editor-view" ref="editor" v-model="markdown" @update:modelValue="debounce(() => convert(), 1000)()"/>
            </div>
            <div v-if="html" class="preview" ref="preview">
                <MarkdownPreview :html="html" :preferences="preferences" :printing="printing" :zoom="zoom" />
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
    <Dialog v-model:visible="showingAboutDialog" class="about-dialog" modal>
        <p>
            Markdown-to-PDF is a tool for converting easily-readable Markdown to beautiful PDFs. The tool runs entirely in the browser and doesn't send any of your content across the wire.
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
    <Dialog v-model:visible="showingPreferencesDialog" class="preferences-dialog" modal>
        <label>Page Margins</label>
        <div class="margin">
            <InputGroup class="margin-top">
                <InputText v-model="preferences.margin.top" type="text" placeholder="1" />
                <InputGroupAddOn>
                    in.
                </InputGroupAddOn>
            </InputGroup>
            <InputGroup class="margin-right">
                <InputText v-model="preferences.margin.right" type="text" placeholder="1" />
                <InputGroupAddOn>
                    in.
                </InputGroupAddOn>
            </InputGroup>
            <InputGroup class="margin-bottom">
                <InputText v-model="preferences.margin.bottom" type="text" placeholder="1" />
                <InputGroupAddOn>
                    in.
                </InputGroupAddOn>
            </InputGroup>
            <InputGroup class="margin-left">
                <InputText v-model="preferences.margin.left" type="text" placeholder="1" />
                <InputGroupAddOn>
                    in.
                </InputGroupAddOn>
            </InputGroup>
        </div>
    </Dialog>
</template>

<script setup>
    import AppLayout from '@/inertia/layouts/AppLayout.vue'
    import AceEditor from '@/components/AceEditor.vue'
    import MarkdownPreview from '@/components/MarkdownPreview.vue'
    import Dialog from 'primevue/dialog';
    import InputGroup from 'primevue/inputgroup';
    import InputGroupAddOn from 'primevue/inputgroupaddon';
    import InputText from 'primevue/inputtext';
    import { marked } from 'marked'
    import { onMounted, ref, useTemplateRef, watch } from 'vue'
    import Menubar from 'primevue/menubar'

    const props = defineProps({
        markdown: String,
    })
    const preferences = ref({
        margin: {
            top: '',
            right: '',
            bottom: '',
            left: '',
        }
    })
    const printing = ref(false)
    const showingAboutDialog = ref(false)
    const showingPreferencesDialog = ref(false)
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

                    },
                    disabled: true,
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
                    label: 'Preferences',
                    command() {
                        showingPreferencesDialog.value = true
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
                        showingAboutDialog.value = true
                    }
                },
            ],
        },
        {
            label: 'Buy Me a Coffee ☕',
            command() {
                window.open('https://buymeacoffee.com/strube')
            },
        },
    ]
    const preview = useTemplateRef('preview')
    const file = useTemplateRef('file')
    const editor = useTemplateRef('editor')
    const zoom = ref(1)

    async function open() {
        const value = await file.value.files.item(0)?.text() || ''

        editor.value.set(value)

        file.value.value = null
    }

    function convert() {
        const converted = marked.parse(markdown.value)

        html.value = converted
    }

    function calculateZoom() {
        const ruler = document.createElement('div')

        ruler.style.width = '8.5in'
        ruler.style.position = 'absolute'
        ruler.style.left = '-9999px'
        document.body.appendChild(ruler)

        const { width: pageWidthInPixels } = ruler.getBoundingClientRect()
        const { paddingLeft, paddingRight } = window.getComputedStyle(preview.value)
        const width = preview.value.getBoundingClientRect().width - (parseFloat(paddingLeft) || 0) - (parseFloat(paddingRight) || 0)

        ruler.remove()

        zoom.value = width / pageWidthInPixels
    }

    watch(html, (value) => setTimeout(() => value.length && calculateZoom(), 0))

    onMounted(() => {
        convert()

        window.addEventListener('resize', () => calculateZoom())
    })
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
        overflow-x: hidden;
        overflow-y: auto;
        padding: 1rem;
        width: 50vw;
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

    .preferences-dialog .margin {
        border: solid 1px #cccccc;
        height: calc(1.5 * 110px);
        margin: 1rem auto 2rem;
        position: relative;
        width: calc(1.5 * 85px);
    }

    .preferences-dialog .margin .margin-top,
    .preferences-dialog .margin .margin-right,
    .preferences-dialog .margin .margin-bottom,
    .preferences-dialog .margin .margin-left {
        --p-inputgroup-addon-padding: 0.125rem;
        --p-inputtext-padding-x: 0.375rem;
        --p-inputtext-padding-y: 0.125rem;
        --width: 6rem;
        background-color: #ffffff;
        padding: 0.375rem;
        position: absolute;
        width: var(--width);
    }

    .preferences-dialog .margin .margin-top {
        top: -1.25rem;
        left: 50%;
        transform: translateX(-50%);
    }

    .preferences-dialog .margin .margin-right {
        right: calc(-1 * var(--width) / 2);
        top: 50%;
        transform: translateY(-50%);
    }

    .preferences-dialog .margin .margin-bottom {
        bottom: -1.25rem;
        left: 50%;
        transform: translateX(-50%);
    }

    .preferences-dialog .margin .margin-left {
        left: calc(-1 * var(--width) / 2);
        top: 50%;
        transform: translateY(-50%);
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
            border-bottom: solid 1px #cccccc;
            border-right: none;
            height: 50vh;
            width: 100vw;
        }

        .preview {
            height: 50vh;
            width: 100vw;
        }

        .preview-empty--desktop {
            display: none;
        }
    }
</style>

<style>
    .preferences-dialog,
    .about-dialog {
        margin: 1rem;
        max-width: 500px;
        min-width: 300px;
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
