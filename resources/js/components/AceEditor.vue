<template>
    <div ref="editor"></div>
</template>

<script setup>
    import ace from 'ace-builds'
    import 'ace-builds/src-noconflict/mode-markdown'
    import { onMounted, ref, useTemplateRef } from 'vue'

    const $editor = useTemplateRef('editor')

    const model = defineModel()

    let aceEditor;

    defineExpose({
        set(value) {
            aceEditor.setValue(value || '')
        },
    })

    onMounted(() => {
        aceEditor = ace.edit($editor.value, {
            mode: 'ace/mode/markdown',
        })

        aceEditor.setValue(model.value || '')

        aceEditor.session.on('change', function(delta) {
            model.value = aceEditor.getValue()
        })
    })
</script>
