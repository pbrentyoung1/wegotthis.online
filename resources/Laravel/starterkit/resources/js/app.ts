import { createInertiaApp } from '@inertiajs/vue3'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createApp, h, type DefineComponent } from 'vue'
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
import VueECharts from 'vue-echarts'

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
            .component('VueECharts', VueECharts)

            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
