<template>
  <div class="wrapper">
    <Topbar />

    <Sidenav />

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
import Sidenav from '~/layouts/components/sidenav/index.vue'
import Topbar from '~/layouts/components/topbar/index.vue'

import { storeToRefs } from 'pinia'
import { useLayout } from '~/stores/layout'

const layoutStore = useLayout()
const { layout } = storeToRefs(layoutStore)
</script>
