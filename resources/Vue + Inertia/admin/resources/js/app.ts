import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createApp, h, type DefineComponent } from 'vue'
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import VueApexCharts from 'vue3-apexcharts'
import { MaskInput } from 'vue-mask-next'
import { MasonryWall } from '@yeger/vue-masonry-wall'
import { QuillEditor } from '@vueup/vue-quill'
import flatPickr from 'vue-flatpickr-component'
import VueECharts from 'vue-echarts'
import PDF from 'pdf-vue3'
import SimpleTypeahead from 'vue3-simple-typeahead'
import Vidle from 'v-idle'
import VueEasyLightbox from 'vue-easy-lightbox'

import { createBootstrap } from 'bootstrap-vue-next'

import { META_DATA } from './config/constants'
import MainLayout from './layouts/default.vue'

const appName = import.meta.env.VITE_APP_NAME || META_DATA.name
import '@/scss/app.scss';

createInertiaApp({
  title: (title) => (title ? `${title} - ${appName}` : appName),
  resolve: async (name) => {
    const page: any = await resolvePageComponent(
      `/resources/js/views/${name}.vue`,
      import.meta.glob<DefineComponent>('/resources/js/views/**/*.vue')
    )

    if (name.startsWith('admin/')) {
      page.default.layout ??= (h: any, page: any) => {
        return h(MainLayout, null, {
          default: () => page
        })
      }
    }

    return page
  },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(createPinia().use(piniaPluginPersistedstate))
            .use(createBootstrap())
            .component('VueApexCharts', VueApexCharts)
.component("MaskInput", MaskInput)
.component('MasonryWall', MasonryWall)
.component('QuillEditor', QuillEditor)
.component('FlatPickr', flatPickr)
.component('VueECharts', VueECharts)
.component('PDF', PDF)
.component('SimpleTypeahead', SimpleTypeahead)
.component('Vidle', Vidle)
.component('VueEasyLightbox', VueEasyLightbox)

            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
