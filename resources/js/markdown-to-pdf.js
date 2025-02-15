import { createInertiaApp } from "@inertiajs/vue3"
import { createApp } from 'vue'
import PrimeVue from 'primevue/config'
import Aura from '@primevue/themes/aura'
import debounce from './utils/debounce.js'

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./inertia/pages/**/*.vue', { eager: true })
        const page = pages[`./inertia/pages/${name}.vue`] || {}

        return await page
    },
    setup: ({ el, App, plugin, props }) => {
        const app = createApp(App, props)
            .use(plugin)
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                },
            })
            .mixin({ methods: { btoa: (x) => btoa(x), debounce, route } })
            .mount(el)
    }
})
