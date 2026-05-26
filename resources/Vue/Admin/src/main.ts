import { createApp } from 'vue'
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

import '~/assets/css/app.css'

import App from './app.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia().use(piniaPluginPersistedstate))
app.use(router)
app.component('VueApexCharts', VueApexCharts)
app.component("MaskInput", MaskInput)
app.component('MasonryWall', MasonryWall)
app.component('QuillEditor', QuillEditor)
app.component('FlatPickr', flatPickr)
app.component('VueECharts', VueECharts)
app.component('PDF', PDF)
app.component('SimpleTypeahead', SimpleTypeahead)
app.component('Vidle', Vidle)
app.component('VueEasyLightbox', VueEasyLightbox)

app.mount('#app')
