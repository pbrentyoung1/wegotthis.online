<template>
  <div class="topnav top-topbar-height fixed z-30 flex w-full items-center border-b border-default-300 bg-(--sidenav-bg)">
    <div class="container-fluid">
      <nav id="topnav-menu" class="hs-collapse hidden grow basis-full overflow-hidden transition-all duration-300 lg:block" aria-labelledby="topnav-menu-collapse">
        <AppMenu />
      </nav>
    </div>
  </div>
</template>

<script setup lang="ts">
import AppMenu from '~/layouts/components/horizontal-nav/components/AppMenu.vue'
</script>
