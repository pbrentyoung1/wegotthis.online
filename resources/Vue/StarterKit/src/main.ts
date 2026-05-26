import { createApp } from 'vue'
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import VueECharts from 'vue-echarts'

import '~/assets/css/app.css'

import App from './app.vue'
import router from './router'

const app = createApp(App)

app.use(createPinia().use(piniaPluginPersistedstate))
app.use(router)
app.component('VueECharts', VueECharts)

app.mount('#app')
