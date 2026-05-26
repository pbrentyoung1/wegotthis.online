<template>
  <div class="wrapper">
    <Topbar />

    <Sidenav v-if="isMobile || layout.sidenavSize === 'offcanvas'" />
    <HorizontalNav />

    <div class="page-content">
      <main>
        <div class="container-fluid">
          <slot />
        </div>
      </main>
      <Footer />
    </div>
  </div>
  
    <Customizer />
  
</template>

<script setup lang="ts">
import Customizer from '~/layouts/components/customizer/index.vue'
import Footer from '~/layouts/components/footer/index.vue'
import HorizontalNav from '~/layouts/components/horizontal-nav/index.vue'
import Sidenav from '~/layouts/components/sidenav/index.vue'
import Topbar from '~/layouts/components/topbar/index.vue'

import { storeToRefs } from 'pinia'
import { useMobile } from '~/composables/useMobile'
import { useLayout } from '~/stores/layout'

const { isMobile } = useMobile()
const layoutStore = useLayout()
const { layout } = storeToRefs(layoutStore)
</script>
